<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ekskul;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EkskulResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EkskulResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EkskulResource extends Resource
{
    protected static ?string $model = Ekskul::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Kelola Program & Ekstrakurikuler';


    public static function getNavigationLabel(): string
    {
        return 'Organisasi & Ekstrakurikuler';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Organisasi & Ekstrakurikuler';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('Masukkan Judul Ekskul maksimal 100 karakter'),
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->label('Kategori')
                    ->maxLength(100)
                    ->placeholder('Masukkan Kategori Ekskul maksimal 100 karakter'),
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
                    ])
                    ->required()
                    ->placeholder('Masukkan Deskripsi Ekskul Setidaknya 20 karakter')
                    ->rules(['min:20'])
                    ->validationMessages([
                        'min' => 'Deskripsi Ekskul harus terdiri dari setidaknya 20 karakter.',
                    ]),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->disk('public')
                    ->directory('ekskul')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Ekskul-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),
                Forms\Components\FileUpload::make('gambar_tambahan')
                    ->disk('public')
                    ->directory('ekskul')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->nullable()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Ekskul-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\FileUpload::make('gambar_cadangan')
                    ->disk('public')
                    ->directory('ekskul')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->nullable()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Ekskul-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
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
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('gambar_cadangan')
                    ->label('Gambar Tambahan')
                    ->disk('public')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->wrap()
                    ->toggleable()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->wrap()
                    ->toggleable()
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
                    ->successNotificationTitle('Berhasil menghapus ekstrakurikuler')
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
