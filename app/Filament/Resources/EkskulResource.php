<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EkskulResource\Pages;
use App\Filament\Resources\EkskulResource\RelationManagers;
use App\Models\Ekskul;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EkskulResource extends Resource
{
    protected static ?string $model = Ekskul::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationLabel(): string
    {
        return 'Organisasi & Ekskul';
    }

    // public static function getModelLabel(): string
    // {
    //     return 'berita';
    // }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Organisasi & Ekstrakurikuler';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Kelola Program & Ekskul';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->label('Kategori')
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
                    ->directory('ekskul')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.'),
                Forms\Components\FileUpload::make('gambar_tambahan')
                    ->disk('public')
                    ->directory('ekskul')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->nullable(),
                Forms\Components\FileUpload::make('gambar_cadangan')
                    ->disk('public')
                    ->directory('ekskul')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->nullable(),
                // Forms\Components\FileUpload::make('video')
                //     ->label('Video (mp4)')
                //     ->disk('public')
                //     ->directory('ekskul')
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
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('isi')
                    ->label('Deskripsi')
                    ->limit(100)
                    ->html()
                    ->wrap()
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
                Tables\Columns\ImageColumn::make('gambar_cadangan')
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
                    ->wrap()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
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
                    ->successNotificationTitle('Berhasil menghapus ekskul')
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
            'index' => Pages\ListEkskuls::route('/'),
            'create' => Pages\CreateEkskul::route('/create'),
            'edit' => Pages\EditEkskul::route('/{record}/edit'),
        ];
    }
}
