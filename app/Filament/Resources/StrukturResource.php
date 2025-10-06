<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\StrukturOrganisasi;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StrukturResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StrukturResource\RelationManagers;

class StrukturResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Struktur Organisasi';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function getPluralModelLabel(): string
    {
        return 'Struktur Organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->label('Upload Gambar')
                    ->columnSpanFull()
                    ->disk('public')
                    ->directory('struktur')
                    ->placeholder('Maks: 5MB, Format: JPG, JPEG, PNG')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file))
                    ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                        return 'Struktur' . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                    }),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar Struktur')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d M Y - H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Data berhasil Di update')
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
            'index' => Pages\ListStrukturs::route('/'),
            'create' => Pages\CreateStruktur::route('/create'),
            'edit' => Pages\EditStruktur::route('/{record}/edit'),
        ];
    }
}
