<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Berita;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BeritaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BeritaResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getNavigationLabel(): string
    {
        return 'Berita';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Daftar berita';
    }

    protected static ?string $navigationGroup = 'Kelola Informasi';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('Masukkan Judul Berita maksimal 100 karakter'),

                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->disk('public')
                    ->directory('berita')
                    ->image()
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->imagePreviewHeight('150')
                    // ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                    //     $judulBerita = $livewire->record->judul ?? 'judul-berita';
                    //     return 'berita' . Str::slug($judulBerita) . '-' . now()->format('YmdHis')
                    //         . '.' . $file->getClientOriginalExtension();
                    // })
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Berita-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),
                Forms\Components\FileUpload::make('gambar_tambahan')
                    ->disk('public')
                    ->directory('berita')
                    ->image()
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->imagePreviewHeight('150')
                    ->nullable()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Berita-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

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
                    ->placeholder('Masukkan Deskripsi Berita Setidaknya 20 karakter')
                    ->rules(['min:20'])
                    ->validationMessages([
                        'min' => 'Deskripsi berita harus terdiri dari setidaknya 20 karakter.',
                    ]),
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
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('isi')
                    ->label('Deskripsi')
                    ->limit(100)
                    ->wrap()
                    ->html()
                    ->columnSpanFull()
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

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->toggleable()
                    ->sortable()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->toggleable()
                    ->sortable()
                    ->dateTime('d M Y - H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Berita berhasil Di update')
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
