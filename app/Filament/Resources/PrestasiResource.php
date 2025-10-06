<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Prestasi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PrestasiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrestasiResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                    ->maxLength(100)
                    ->placeholder('Masukkan Judul Prestasi maksimal 100 karakter'),

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
                    ->placeholder('Masukkan Deskripsi Prestasi Setidaknya 20 karakter')
                    ->rules(['min:20'])
                    ->validationMessages([
                        'min' => 'Deskripsi Prestasi harus terdiri dari setidaknya 20 karakter.',
                    ]),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->disk('public')
                    ->directory('prestasi')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Prestasi-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\FileUpload::make('gambar_tambahan')
                    ->disk('public')
                    ->directory('prestasi')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->nullable()
                    ->maxSize(5120) // max 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Prestasi-' .
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
