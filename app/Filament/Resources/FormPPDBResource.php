<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\FormPPDB;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\InformasiPpdb;
use Illuminate\Validation\Rule;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Route;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FormPPDBResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FormPPDBResource\RelationManagers;

class FormPPDBResource extends Resource
{
    protected static ?string $model = FormPPDB::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    protected static ?string $navigationGroup = 'Kelola PPDB';

    public static function getNavigationLabel(): string
    {
        return 'Pendaftaran PPDB';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Calon Siswa';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Diri')
                    ->schema([
                        Forms\Components\TextInput::make('no_pendaftaran')
                            ->label('No Pendaftaran')
                            ->disabled(true)
                            ->dehydrated(true)
                            ->default(fn() => 'PPDB-MASAMUJAYA-' . now()->format('YmdHis') . '-' . Str::random(5)),
                        TextInput::make('email')
                            ->email()
                            ->required(),
                        TextInput::make('nama')
                            ->required()
                            ->label('Nama Lengkap')
                            ->maxLength(255),
                        TextInput::make('nik')
                            ->required()
                            ->label('NIK')
                            ->maxLength(16)
                            ->minLength(16)
                            ->numeric()
                            ->rules(function ($record) {
                                $infoAktif = InformasiPpdb::where('status_aktif', true)->first();

                                return [
                                    Rule::unique('form_ppdb', 'nik')
                                        ->where(fn($query) => $query->where('informasi_ppdb_id', $infoAktif?->id))
                                        ->ignore($record?->id),
                                ];
                            })
                            ->validationMessages([
                                'unique' => 'NIK ini sudah pernah didaftarkan pada tahun ajaran aktif.',
                            ]),
                        TextInput::make('nisn')
                            ->required()
                            ->label('NISN')
                            ->numeric()
                            ->unique(ignoreRecord: true, table: 'form_ppdb', column: 'nisn')
                            ->validationMessages([
                                'unique' => 'NISN ini sudah pernah di daftarkan.'
                            ]),
                        TextInput::make('tempat_lahir')
                            ->required()
                            ->label('Tempat Lahir'),
                        DatePicker::make('tanggal_lahir')
                            ->required()
                            ->label('Tanggal Lahir'),
                        Select::make('jenis_kelamin')
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan',
                            ])
                            ->required()
                            ->placeholder('Pilih Jenis Kelamin')
                            ->label('Jenis Kelamin'),

                        TextInput::make('jenis_tinggal')
                            ->required()
                            ->label('Jenis Tinggal')
                            ->placeholder('Contoh: Tinggal Bersama Orang Tua, Asrama, Kost, dll'),
                        Textarea::make('alamat')
                            ->rows(3)
                            ->required()
                            ->label('Alamat')
                            ->placeholder('alamat lengkap rumah anda, meliputi: Nama Jalan, Nama Kelurahan, Nama Kecamatan, Nama Kabupaten, dan Nama Provinsi'),
                    ])->columns(2),

                Section::make('Data Periodik')
                    ->schema([
                        TextInput::make('hobby')
                            ->label('Hobi')
                            ->required(),
                        TextInput::make('cita')
                            ->label('Cita-cita')
                            ->required(),
                        TextInput::make('anak_keberapa')
                            ->label('Anak keberapa dalam keluarga')
                            ->required()
                            ->numeric()
                            ->placeholder('Contoh: 1, 2, 3, dst.'),
                        TextInput::make('berapa_saudara')
                            ->label('Jumlah Saudara Kandung')
                            ->required()
                            ->numeric()
                            ->placeholder('Contoh: 1, 2, dst.'),
                        TextInput::make('tinggi_badan')
                            ->label('Tinggi Badan (cm)')
                            ->required()
                            ->numeric(),
                        TextInput::make('berat_badan')
                            ->label('Berat Badan (kg)')
                            ->required()
                            ->numeric(),
                        Select::make('kebutuhan_khusus')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->placeholder('Apakah Anda Memiliki Kebutuhan Khusus?')
                            ->required()
                            ->label('Kebutuhan Khusus'),
                        TextInput::make('jarak_sekolah')
                            ->label('Jarak ke Sekolah (KM)')
                            ->required(),
                    ])->columns(2),

                Section::make('Asal Sekolah')
                    ->schema([
                        TextInput::make('asal_sekolah')
                            ->label('Asal Sekolah')
                            ->required(),
                        TextInput::make('NPSN_AsalSekolah')
                            ->label('NPSN Asal Sekolah')
                            ->required()
                            ->numeric(),
                        TextInput::make('SKHUN')
                            ->label('SKHUN (*jika ada)'),
                        TextInput::make('no_un')
                            ->label('No. UN (*jika ada)'),
                        TextInput::make('tahun_kelulusan')
                            ->label('Tahun Kelulusan')
                            ->required()
                            ->numeric()
                            ->placeholder('Contoh: 2023'),
                        TextInput::make('hp_siswa ')
                            ->label('No HP Siswa (*jika ada)')
                            ->numeric()
                            ->placeholder('Contoh: 08123456789'),

                        Textarea::make('alamat_asal_sekolah')
                            ->label('Alamat Asal Sekolah')
                            ->rows(3)
                            ->required()
                            ->placeholder('alamat lengkap sekolah anda, meliputi: Nama Jalan, Nama Kelurahan, Nama Kecamatan, Nama Kabupaten, dan Nama Provinsi'),

                    ])->columns(2),

                Section::make('Data Ayah')
                    ->schema([
                        TextInput::make('no_kk (jika ada)')
                            ->label('No KK'),
                        TextInput::make('nik_ayah')
                            ->label('NIK Ayah')
                            ->required()
                            ->maxLength(16)
                            ->minLength(16)
                            ->numeric(),
                        TextInput::make('nama_ayah')
                            ->label('Nama Lengkap Ayah')
                            ->required(),
                        TextInput::make('tempat_lahir_ayah')
                            ->label('Tempat Lahir Ayah')
                            ->required(),
                        DatePicker::make('tgl_lahir_ayah')
                            ->label('Tanggal Lahir Ayah')
                            ->required(),
                        TextInput::make('pendidikan_ayah')
                            ->label('Pendidikan Terakhir Ayah')
                            ->required()
                            ->placeholder('Contoh: SD, SMP, SMA, S1, S2, S3, dll'),
                        TextInput::make('pekerjaan_ayah')
                            ->label('Pekerjaan Ayah')
                            ->required()
                            ->placeholder('Contoh: PNS, TNI, Polri, Wiraswasta, Petani, Buruh, dll'),
                        TextInput::make('penghasilan_ayah')
                            ->label('Penghasilan Ayah (jika ada)')
                            ->numeric()
                            ->placeholder('Contoh: 1000000, 2000000, dst.'),
                        TextInput::make('hp_ayah')
                            ->label('No. Telp / HP Ayah')
                            ->numeric()
                            ->required()
                            ->placeholder('Contoh: 08123456789'),
                    ])->columns(2),

                Section::make('Data Ibu')
                    ->schema([
                        TextInput::make('nik_ibu')
                            ->label('NIK Ibu')
                            ->required()
                            ->maxLength(16)
                            ->minLength(16)
                            ->numeric(),
                        TextInput::make('nama_ibu')
                            ->label('Nama Lengkap Ibu')
                            ->required(),
                        TextInput::make('tempat_lahir_ibu')
                            ->label('Tempat Lahir Ibu')
                            ->required(),
                        DatePicker::make('tgl_lahir_ibu')
                            ->label('Tanggal Lahir Ibu')
                            ->required(),
                        TextInput::make('pendidikan_ibu')
                            ->label('Pendidikan Terakhir Ibu')
                            ->required()
                            ->placeholder('Contoh: SD, SMP, SMA, S1, S2, S3, dll'),
                        TextInput::make('pekerjaan_ibu')
                            ->label('Pekerjaan Ibu')
                            ->required()
                            ->placeholder('Contoh: Ibu Rumah Tangga, PNS, Polri, Wiraswasta, Petani, Buruh, dll'),
                        TextInput::make('penghasilan_ibu')
                            ->label('Penghasilan Ibu (jika ada)')
                            ->numeric()
                            ->placeholder('Contoh: 1000000, 2000000, dst.'),
                        TextInput::make('hp_ibu')
                            ->label('No HP Ibu')
                            ->numeric()
                            ->required()
                            ->placeholder('Contoh: 08123456789'),
                    ])->columns(2),

                Section::make('Alamat & Status Keluarga')
                    ->schema([
                        Textarea::make('alamat_ortu')
                            ->label('Alamat Orang Tua')
                            ->rows(3)
                            ->required()
                            ->placeholder('alamat lengkap rumah orang tua anda, meliputi: Nama Jalan, Nama Kelurahan, Nama Kecamatan, Nama Kabupaten, dan Nama Provinsi'),
                        Select::make('status_keluarga')
                            ->options([
                                'Orang_tua' => 'Orang Tua',
                                'Wali' => 'Wali',
                            ])
                            ->required()
                            ->label('Status Keluarga'),
                    ])->columns(2),

                Section::make('Nilai Raport & Ujian')
                    ->schema([
                        TextInput::make('nilai_kls4_smt1')
                            ->numeric()
                            ->label('Nilai Kelas 4 Semester 1')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                        TextInput::make('nilai_kls4_smt2')
                            ->numeric()
                            ->label('Nilai Kelas 4 Semester 2')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                        TextInput::make('nilai_kls5_smt1')
                            ->numeric()
                            ->label('Nilai Kelas 5 Semester 1')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                        TextInput::make('nilai_kls5_smt2')
                            ->numeric()
                            ->label('Nilai Kelas 5 Semester 2')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                        TextInput::make('nilai_kls6_smt1')
                            ->numeric()
                            ->label('Nilai Kelas 6 Semester 1')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                        TextInput::make('nilai_kls6_smt2')
                            ->numeric()
                            ->label('Nilai Kelas 6 Semester 2')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                        TextInput::make('nilai_ujian_sekolah')
                            ->numeric()
                            ->label('Nilai Ujian Sekolah')
                            ->placeholder('Contoh: 80, 85, 90, dst.')
                            ->required(),
                    ])->columns(2),

                Section::make('Unggah Dokumen')
                    ->schema([
                        FileUpload::make('foto_3x4')
                            ->image()
                            ->label('Pas Foto Ukuran 3x4')
                            ->required()
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->imagePreviewHeight('150')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'foto3x4-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->placeholder('Unggah foto ukuran 3x4 dengan background biru, kemeja putih, kerudung putih (untuk putri), peci hitam (untuk putra). Format: JPG/PNG, maks 10 MB.'),

                        FileUpload::make('skl')
                            ->label('Scan Surat Keterangan Lulus (SKL) (jika ada)')
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'SKL-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpg', 'image/jpeg'])
                            ->placeholder('Maks 10 MB. Format: PDF/JPG/PNG.'),

                        FileUpload::make('ijazah')
                            ->label('Scan Ijazah SD/MI (jika ada)')
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'Ijazah-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpg', 'image/jpeg'])
                            ->placeholder('Maks 10 MB. Format: PDF/JPG/PNG.'),

                        FileUpload::make('kk')
                            ->label('Scan Kartu Keluarga')
                            ->required()
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'KK-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpg', 'image/jpeg'])
                            ->placeholder('Maks 10 MB. Format: PDF/JPG/PNG.'),

                        FileUpload::make('kia')
                            ->label('Scan Kartu Identitas Anak (KIA) (jika ada)')
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'KIA-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpg', 'image/jpeg'])
                            ->placeholder('Maks 10 MB. Format: PDF/JPG/PNG.'),

                        FileUpload::make('kip')
                            ->label('Scan Kartu Indonesia Pintar (KIP) (jika ada)')
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'KIP-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpg', 'image/jpeg'])
                            ->placeholder('Maks 10 MB. Format: PDF/JPG/PNG.'),

                        FileUpload::make('kis')
                            ->label('Scan Kartu Indonesia Sehat (KIS) (jika ada)')
                            ->maxSize(10240)
                            ->disk('public')
                            ->directory('dokumenppdb')
                            ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                                $namaSiswa = $livewire->record->nama ?? 'siswa';
                                return 'KIS-' . Str::slug($namaSiswa) . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                            ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpg', 'image/jpeg'])
                            ->placeholder('Maks 10 MB. Format: PDF/JPG/PNG.'),
                    ])->columns(2),

                Section::make('Status Pendaftaran')
                    ->schema([
                        Select::make('status_verifikasi')
                            ->options([
                                'belum_diverifikasi' => 'Belum Diverifikasi',
                                'proses_verifikasi' => 'Proses Verifikasi',
                                'diterima' => 'diterima',
                                'ditolak' => 'ditolak',
                            ])
                            ->required()
                            ->label('Status Verifikasi'),
                        Select::make('status_kelulusan')
                            ->options([
                                'belum_diseleksi' => 'belum Diseleksi',
                                'proses_seleksi' => 'Proses Seleksi',
                                'lulus' => 'Lulus',
                                'tidak_lulus' => 'Tidak Lulus',
                            ])
                            ->required()
                            ->label('Status Kelulusan'),
                    ])->columns(2),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),

                Forms\Components\Hidden::make('informasi_ppdb_id')
                    ->label('Informasi PPDB Aktif')
                    ->default(function () {
                        return InformasiPpdb::where('status_aktif', true)->value('id');
                    })
                    ->dehydrated() // agar tetap disimpan
                    ->hidden(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_pendaftaran')
                    ->label('No. Pendaftaran')
                    ->searchable()
                    ->copyable()
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status_verifikasi')
                    ->label('Status Verivikasi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'proses_verifikasi' => 'warning',
                        'diterima' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    })
                    ->extraAttributes(['class' => 'text-xl font-bold']),

                Tables\Columns\TextColumn::make('status_kelulusan')
                    ->label('Status Kelulusan')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'proses_seleksi' => 'warning',
                        'lulus' => 'success',
                        'tidak_lulus' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('informasiPpdb.tahun')
                    ->label('Tahun Ajar')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d-m-Y H:i'),
            ])
            ->filters([
                SelectFilter::make('informasi_ppdb_id')
                    ->label('Tahun Ajar')
                    ->relationship('informasiPpdb', 'tahun')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Data berhasil Di update')
                    ->color('success'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormPPDBS::route('/'),
            'create' => Pages\CreateFormPPDB::route('/create'),
            'edit' => Pages\EditFormPPDB::route('/{record}/edit'),
            'view' => Pages\ViewFormPPDB::route('/{record}'),
        ];
    }
}
