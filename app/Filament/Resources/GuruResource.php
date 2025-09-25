<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GuruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuruResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\GuruResource\RelationManagers\MapelRelationManager;


class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Guru')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nip')
                    ->label('NIP Guru')
                    ->placeholder('jika memiliki NIP (opsional)')
                    ->unique(ignoreRecord: true, table: 'guru', column: 'nip')
                    ->validationMessages([
                        'unique' => 'NIP Sudah terpakai.',
                    ])
                    ->numeric()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('riwayat_pendidikan')
                    ->required()
                    ->label('Riwayat Pendidikan Terakhir')
                    ->placeholder('S1 Pendidikan'),

                Forms\Components\TextInput::make('email')
                    ->label('Email Guru')
                    ->placeholder('jika memiliki email (opsional)'),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('guru')
                    ->required()
                    ->label('foto Guru')
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Foto Guru-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\Select::make('mapel')
                    ->label('Mata Pelajaran')
                    ->placeholder('Pilih Mata Pelajaran yang diajarkan')
                    ->multiple()
                    ->relationship('mapel', 'nama')
                    ->preload()
                    ->searchable(),

                Forms\Components\Hidden::make('admin_id')->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Guru')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP Guru')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('riwayat_pendidikan')
                    ->label('Riwayat Pendidikan Terakhir')
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email Guru')
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Guru')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('mapel.nama')
                    ->label('Mata Pelajaran')
                    ->listWithLineBreaks(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->wrap()
                    ->dateTime('d M Y - H:i')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->wrap()
                    ->dateTime('d M Y - H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('success'),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Berhasil menghapus Guru')
                    ->color('danger'),
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
            // MapelRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
