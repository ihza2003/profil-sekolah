<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilResource\Pages;
use App\Filament\Resources\ProfilResource\RelationManagers;
use App\Models\Profil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilResource extends Resource
{
    protected static ?string $model = Profil::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function getPluralModelLabel(): string
    {
        return 'Profil Sekolah';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Sekolah')
                    ->required()
                    ->placeholder('Masukkan nama sekolah')
                    ->maxLength(255),

                Forms\Components\TextInput::make('telepon')
                    ->label('Telepon Sekolah')
                    ->numeric()
                    ->placeholder('08xxxx')
                    ->required()
                    ->maxLength(20),

                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat Sekolah')
                    ->required()
                    ->rows(3)
                    ->placeholder('Masukkan alamat lengkap sekolah')
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email Sekolah')
                    ->email()
                    ->placeholder('xxxx@gmail.com')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('embed_maps')
                    ->label('Maps Sekolah')
                    ->rows(3)
                    ->placeholder('<iframe src="https://www.google.com/maps/embed?..."></iframe>')
                    ->helperText('klik "Bagikan" → "Sematkan peta", Salin kode <iframe> dari Google Maps -> lalu tempel di sini.')
                    ->maxLength(1000),

                Forms\Components\FileUpload::make('logo')
                    ->label('Logo Sekolah')
                    ->image()
                    ->required()
                    ->placeholder('Unggah logo sekolah')
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('logo')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->placeholder('Maks: 10MB, Format: JPG, JPEG, PNG')
                    ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                        return 'Logo' . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                    })
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Sekolah')
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('telepon')
                    ->label('Telepon')
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->toggleable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('embed_maps')
                    ->label('Maps Sekolah')
                    ->wrap()
                    ->limit(30)
                    ->toggleable(),

                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->wrap()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->toggleable()
                    ->wrap()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Data berhasil diperbarui')
                    ->color('success'),
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
            'index' => Pages\ListProfils::route('/'),
            'create' => Pages\CreateProfil::route('/create'),
            'edit' => Pages\EditProfil::route('/{record}/edit'),
        ];
    }
}
