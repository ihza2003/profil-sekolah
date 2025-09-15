<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SambutanResource\Pages;
use App\Filament\Resources\SambutanResource\RelationManagers;
use App\Models\Sambutan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SambutanResource extends Resource
{
    protected static ?string $model = Sambutan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kepala_sekolah')
                    ->label('Nama Kepala Sekolah')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto_kepala_sekolah')
                    ->image()
                    ->disk('public')
                    ->directory('sambutan')
                    ->required()
                    ->label('foto kepala sekolah')
                    ->placeholder('Maks: 5MB, Format: JPG, JPEG, PNG')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png']),
                // Forms\Components\Textarea::make('isi_sambutan')
                //     ->label('Isi Sambutan')
                //     ->required()
                //     ->rows(5)
                //     ->columnSpanFull(),

                Forms\Components\RichEditor::make('isi_sambutan')
                    ->label('Isi Sambutan')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'link',
                        'h2',
                        'h3',
                        'codeBlock',
                    ]),
                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kepala_sekolah')
                    ->label('Nama Kepala Sekolah')
                    ->wrap(),
                Tables\Columns\ImageColumn::make('foto_kepala_sekolah')
                    ->label('Foto Kepala Sekolah')
                    ->disk('public')
                    ->wrap(),

                Tables\Columns\TextColumn::make('isi_sambutan')
                    ->label('Isi Sambutan')
                    ->limit(100)
                    ->wrap()
                    ->html()
                    ->columnSpanFull()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Create')
                    ->wrap()
                    ->dateTime('d M Y - H:i')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
                    ->wrap()
                    ->dateTime('d M Y - H:i')
                    ->toggleable(),
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
            'index' => Pages\ListSambutans::route('/'),
            'create' => Pages\CreateSambutan::route('/create'),
            'edit' => Pages\EditSambutan::route('/{record}/edit'),
        ];
    }
}
