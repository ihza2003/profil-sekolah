<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Galeri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GaleriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GaleriResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri';

    protected static ?string $navigationGroup = 'Kelola Informasi';

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Galeri';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100)
                    ->label('Judul Galeri')
                    ->placeholder('Masukkan Judul Galeri, Maks: 100 Karakter'),

                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->label('Upload Gambar')
                    ->disk('public')
                    ->directory('galeri')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->placeholder('Maks: 5MB, Format: JPG, JPEG, PNG')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Galeri-' . Str::uuid() . '.' . $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Galeri')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->toggleable()
                    ->sortable()
                    ->wrap()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->toggleable()
                    ->sortable()
                    ->wrap()
                    ->dateTime('d M Y - H:i'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Data berhasil Di update')
                    ->color('success'),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Berhasil menghapus Galeri')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
