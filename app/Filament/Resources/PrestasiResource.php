<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiResource\Pages;
use App\Filament\Resources\PrestasiResource\RelationManagers;
use App\Models\Prestasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function getNavigationLabel(): string
    {
        return 'Prestasi';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Prestasi';
    }

    protected static ?string $navigationGroup = 'Kelola Informasi';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100),

                Forms\Components\RichEditor::make('isi')
                    ->label('Deskripsi')
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
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->disk('public')
                    ->directory('prestasi')
                    ->image()
                    ->imagePreviewHeight('150'),
                Forms\Components\FileUpload::make('gambar_tambahan')
                    ->disk('public')
                    ->directory('prestasi')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->nullable(),
                // Forms\Components\FileUpload::make('video')
                //     ->label('Video (mp4)')
                //     ->disk('public')
                //     ->directory('prestasi')
                //     ->acceptedFileTypes(['video/mp4'])
                //     ->maxSize(10240) // maksimal 10 MB
                //     ->previewable(false)
                //     ->nullable(),
                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('isi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap()
                    ->html()
                    ->toggleable(),

                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar Utama')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),

                Tables\Columns\ImageColumn::make('gambar_tambahan')
                    ->label('Gambar Tambahan')
                    ->disk('public')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->toggleable(),

                // Tables\Columns\ImageColumn::make('video')
                //     ->label('Video')
                //     ->url(fn($record) =>  asset('storage/berita/' . $record->video))
                //     ->wrap()
                //     ->openUrlInNewTab()
                //     ->toggleable(isToggledHiddenByDefault: true)
                //     ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Create')
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
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
            'index' => Pages\ListPrestasis::route('/'),
            'create' => Pages\CreatePrestasi::route('/create'),
            'edit' => Pages\EditPrestasi::route('/{record}/edit'),
        ];
    }
}
