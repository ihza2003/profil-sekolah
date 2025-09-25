<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Testimoni;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TestimoniResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestimoniResource\RelationManagers;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;
    protected static ?string $pluralModelLabel = 'Testimoni';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';
    protected static ?string $navigationLabel = 'Testimoni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama'),


                Forms\Components\Select::make('status')
                    ->placeholder('Pilih Status')
                    ->options([
                        'Alumni MTs' => 'Alumni MTs',
                        'Wali Murid' => 'Wali Murid',
                    ])
                    ->required()
                    ->reactive()
                    ->label('Status'),

                Forms\Components\TextInput::make('posisi')
                    ->maxLength(255)
                    ->label('Posisi')
                    ->placeholder('Masukan Posisi wali murid / Kegiatan Alumni Saat ini (opsional)'),

                Forms\Components\RichEditor::make('isi')
                    ->label('Isi Testimoni')
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
                    ->placeholder('Masukkan Isi Testimoni Setidaknya 20 karakter')
                    ->rules(['min:20'])
                    ->validationMessages([
                        'min' => 'Isi Testimoni harus terdiri dari setidaknya 20 karakter.',
                    ]),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('testimoni')
                    ->imagePreviewHeight('150')
                    ->required()
                    ->label('Foto')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->placeholder('Format gambar: jpg, jpeg, png. Ukuran maksimal: 5MB.')
                    ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                        $nama = $livewire->record->nama ?? 'nama-testimoni';
                        return 'foto testimoni-' . Str::slug($nama) . '-' . now()->format('YmdHis')
                            . '.' . $file->getClientOriginalExtension();
                    })
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\FileUpload::make('video')
                    ->nullable()
                    ->label('Video (mp4)')
                    ->disk('public')
                    ->directory('testimoni')
                    ->acceptedFileTypes(['video/mp4'])

                    ->maxSize(10240) // maksimal 10 MB
                    ->previewable(false)
                    ->placeholder('Format video: mp4. Ukuran maksimal: 10MB.')
                    ->nullable()
                    ->getUploadedFileNameForStorageUsing(function ($file, $livewire) {
                        $nama = $livewire->record->nama ?? 'nama-testimoni';
                        return 'video testimoni-' . Str::slug($nama) . '-' . now()->format('YmdHis')
                            . '.' . $file->getClientOriginalExtension();
                    })
                    ->deleteUploadedFileUsing(fn($file) => $file && \Storage::disk('public')->delete($file)),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('posisi')
                    ->label('Posisi')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\ImageColumn::make('foto')
                    ->label('foto')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('isi')
                    ->label('Isi Testimoni')
                    ->limit(80)
                    ->wrap()
                    ->html()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('video')
                    ->label('Video')
                    ->boolean()
                    ->trueIcon('heroicon-o-video-camera')
                    ->falseIcon('heroicon-o-x-mark'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->toggleable()
                    ->wrap()
                    ->sortable()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->wrap()
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
                    ->successNotificationTitle('Berhasil menghapus Testimoni')
                    ->label('Hapus')
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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}
