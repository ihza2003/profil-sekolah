<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PengaturanWebsite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengaturanWebsiteResource\Pages;
use App\Filament\Resources\PengaturanWebsiteResource\RelationManagers;

class PengaturanWebsiteResource extends Resource
{
    protected static ?string $model = PengaturanWebsite::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'Pengaturan Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_landing')
                    ->required()
                    ->label('Upload Gambar Landing Website')
                    ->columnSpanFull()
                    ->disk('public')
                    ->directory('landing')
                    ->placeholder('Maks: 5MB, Format: JPG, JPEG, PNG')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                        return 'FotoLanding' . '-' . now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                    })
                    ->deleteUploadedFileUsing(fn($file) => $file && Storage::disk('public')->delete($file)),

                Forms\Components\TextInput::make('tahun_footer')
                    ->label('Tahun Footer')
                    ->numeric()
                    ->placeholder('Tulis tahun footer…')
                    ->minLength(4)
                    ->maxLength(4)
                    ->required(),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_landing')
                    ->label('Foto landing')
                    ->disk('public')
                    ->wrap()
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tahun_footer')
                    ->label('Tahun Footer')
                    ->searchable()
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
            'index' => Pages\ListPengaturanWebsites::route('/'),
            'create' => Pages\CreatePengaturanWebsite::route('/create'),
            'edit' => Pages\EditPengaturanWebsite::route('/{record}/edit'),
        ];
    }
}
