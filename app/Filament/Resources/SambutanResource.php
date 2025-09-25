<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sambutan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SambutanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SambutanResource\RelationManagers;

class SambutanResource extends Resource
{
    protected static ?string $model = Sambutan::class;

    protected static ?string $navigationIcon = 'heroicon-o-speaker-wave';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kepala_sekolah')
                    ->label('Nama Kepala Sekolah')
                    ->required()
                    ->placeholder('Masukkan Nama Kepala Sekolah')
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto_kepala_sekolah')
                    ->image()
                    ->disk('public')
                    ->directory('sambutan')
                    ->required()
                    ->label('foto kepala sekolah')
                    ->placeholder('Maks: 5MB, Format: JPG, JPEG, PNG')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                        $namaKepala = $livewire->record->nama_kepala_sekolah ?? 'sambutan';
                        return 'fotoSambutan-' . Str::slug($namaKepala) . '-' . now()->format('YmdHis')
                            . '.' . $file->getClientOriginalExtension();
                    })
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

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
                    ])
                    ->required()
                    ->placeholder('Masukkan Isi Sambutan Setidaknya 20 karakter')
                    ->rules(['min:20'])
                    ->validationMessages([
                        'min' => 'Isi Sambutan harus terdiri dari setidaknya 20 karakter.',
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
                    ->toggleable()
                    ->wrap(),
                Tables\Columns\ImageColumn::make('foto_kepala_sekolah')
                    ->label('Foto Kepala Sekolah')
                    ->disk('public')
                    ->toggleable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('isi_sambutan')
                    ->label('Isi Sambutan')
                    ->limit(100)
                    ->wrap()
                    ->html()
                    ->columnSpanFull()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->wrap()
                    ->dateTime('d M Y - H:i')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
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
