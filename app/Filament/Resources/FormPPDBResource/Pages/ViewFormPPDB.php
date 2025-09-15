<?php

namespace App\Filament\Resources\FormPPDBResource\Pages;

use App\Filament\Resources\FormPPDBResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use Filament\Forms\Form;

class ViewFormPPDB extends ViewRecord
{
    protected static string $resource = FormPPDBResource::class;

    public function getTitle(): string
    {
        return 'Detail Data ' . $this->record->nama;
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Diri')
                ->schema([
                    Forms\Components\TextInput::make('no_pendaftaran')->label('No Pendaftaran')->disabled(),
                    Forms\Components\TextInput::make('nama')->label('Nama')->disabled(),
                    Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                    Forms\Components\TextInput::make('nik')->label('NIK')->disabled(),
                    Forms\Components\TextInput::make('nisn')->label('NISN')->disabled(),
                    Forms\Components\TextInput::make('tempat_lahir')->label('Tempat Lahir')->disabled(),
                    Forms\Components\DatePicker::make('tanggal_lahir')->label('Tanggal Lahir')->disabled(),
                    Forms\Components\TextInput::make('jenis_kelamin')->label('Jenis Kelamin')->disabled(),
                    Forms\Components\TextInput::make('jenis_tinggal')->label('Jenis Tinggal')->disabled(),
                    Forms\Components\Textarea::make('alamat')->label('Alamat')->disabled(),
                ])->columns(2),

            Forms\Components\Section::make('Data Periodik')
                ->schema([
                    Forms\Components\TextInput::make('hobby')->label('Hobi')->disabled(),
                    Forms\Components\TextInput::make('cita')->label('Cita-cita')->disabled(),
                    Forms\Components\TextInput::make('anak_keberapa')->label('Anak keberapa')->disabled(),
                    Forms\Components\TextInput::make('berapa_saudara')->label('Jumlah Saudara')->disabled(),
                    Forms\Components\TextInput::make('tinggi_badan')->label('Tinggi Badan')->disabled(),
                    Forms\Components\TextInput::make('berat_badan')->label('Berat Badan')->disabled(),
                    Forms\Components\TextInput::make('kebutuhan_khusus')->label('Kebutuhan Khusus')->disabled(),
                    Forms\Components\TextInput::make('jarak_sekolah')->label('Jarak ke Sekolah')->disabled(),
                ])->columns(2),

            Forms\Components\Section::make('Asal Sekolah')
                ->schema([
                    Forms\Components\TextInput::make('asal_sekolah')->label('Asal Sekolah')->disabled(),
                    Forms\Components\TextInput::make('NPSN_AsalSekolah')->label('NPSN Asal Sekolah')->disabled(),
                    Forms\Components\TextInput::make('SKHUN')->label('SKHUN')->disabled(),
                    Forms\Components\TextInput::make('no_un')->label('No UN')->disabled(),
                    Forms\Components\TextInput::make('tahun_kelulusan')->label('Tahun Kelulusan')->disabled(),
                    Forms\Components\TextInput::make('hp_siswa')->label('No HP Siswa')->disabled(),
                    Forms\Components\Textarea::make('alamat_asal_sekolah')->label('Alamat Asal Sekolah')->disabled(),
                ])->columns(2),

            Forms\Components\Section::make('Dokumen')
                ->schema([
                    Forms\Components\Section::make('Pas Foto 3x4')
                        ->schema([
                            Forms\Components\FileUpload::make('foto_3x4')->label('Foto 3x4')->image()->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->label('Pas Foto 3x4 (Download)')
                                ->viewData(['field' => 'foto_3x4']),
                        ]),
                    Forms\Components\Section::make('Dokumen Surat Keterangan Lulus (SKL)')
                        ->schema([
                            Forms\Components\FileUpload::make('skl')->label('surat keterangan lulus')->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->viewData(['field' => 'skl']),
                        ]),
                    Forms\Components\Section::make('Dokumen Ijazah SD/MI')
                        ->schema([
                            Forms\Components\FileUpload::make('ijazah')->label('Ijazah')->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->viewData(['field' => 'skl']),
                        ]),

                    Forms\Components\Section::make('Dokumen Kartu Keluarga')
                        ->schema([
                            Forms\Components\FileUpload::make('kk')->label('Kartu Keluarga')->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->viewData(['field' => 'kk']),
                        ]),
                    Forms\Components\Section::make('Dokumen Kartu Identitas Anak (KIA)')
                        ->schema([
                            Forms\Components\FileUpload::make('kia')->label('kartu identittas anak')->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->viewData(['field' => 'kia']),
                        ]),
                    Forms\Components\Section::make('Dokumen Kartu Indonesia Pintar (KIP)')
                        ->schema([
                            Forms\Components\FileUpload::make('kip')->label('kartu indonesia pintar')->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->viewData(['field' => 'kip']),
                        ]),
                    Forms\Components\Section::make('Dokumen Kartu Indonesia Sehat (KIS)')
                        ->schema([
                            Forms\Components\FileUpload::make('kis')->label('kartu indonesia sehat')->disabled(),
                            Forms\Components\View::make('components.filament.download-field')
                                ->viewData(['field' => 'kis']),
                        ]),
                ]),

            Forms\Components\Section::make('Status Pendaftaran')
                ->schema([
                    Forms\Components\TextInput::make('status_verifikasi')->label('Status Verifikasi')->disabled(),
                    Forms\Components\TextInput::make('status_kelulusan')->label('Status Kelulusan')->disabled(),
                ])->columns(2),
        ]);
    }
}
