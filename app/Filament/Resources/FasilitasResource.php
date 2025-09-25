<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Fasilitas;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FasilitasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FasilitasResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(100)
                    ->label('Judul Fasilitas')
                    ->placeholder('Masukkan Judul Fasilitas maksimal 100 karakter'),

                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->label('Upload Gambar')
                    ->disk('public')
                    ->directory('fasilitas')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->placeholder('Maks: 5MB, Format: JPG, JPEG, PNG')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string =>
                        'Fasilitas-' .
                            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' .
                            Str::uuid() . '.' .
                            $file->getClientOriginalExtension(),
                    )
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\TextInput::make('kuantitas')
                    ->label('Kuantitas')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->minValue(0)
                    ->placeholder('Masukkan kuantitas fasilitas'),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Fasilitas')
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

                Tables\Columns\TextColumn::make('kuantitas')
                    ->label('Kuantitas')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Create')
                    ->wrap()
                    ->toggleable()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
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
                    ->successNotificationTitle('Fasilitas berhasil Dihapus')
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
