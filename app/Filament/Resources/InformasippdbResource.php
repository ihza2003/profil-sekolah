<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasippdbResource\Pages;
use App\Filament\Resources\InformasippdbResource\RelationManagers;
use App\Models\Informasippdb;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasippdbResource extends Resource
{
    protected static ?string $model = Informasippdb::class;

    // protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationGroup = 'Kelola PPDB';

    public static function getNavigationLabel(): string
    {
        return 'Informasi PPDB';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Informasi PPDB';
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('banner_ppdb')
                    ->required()
                    ->placeholder('Contoh: uploads/banner.jpg (Maks: 2MB, Format: JPG, PNG)')
                    ->disk('public')
                    ->directory('informasi_ppdb')
                    ->image()
                    ->imagePreviewHeight('150'),

                Forms\Components\DatePicker::make('tanggal_mulai')->required()->label('Tanggal Mulai'),
                Forms\Components\DatePicker::make('tanggal_selesai')->required()->label('Tanggal Selesai'),

                Forms\Components\DatePicker::make('tanggal_pengumuman')->label('Tanggal Pengumuman'),
                Forms\Components\DatePicker::make('tanggal_daftar_ulang_mulai')->label('Daftar Ulang Mulai'),
                Forms\Components\DatePicker::make('tanggal_daftar_ulang_selesai')->label('Daftar Ulang Selesai'),

                Forms\Components\Repeater::make('syarat_pendaftaran')
                    ->schema([
                        Forms\Components\TextInput::make('syarat_pendaftaran')
                            ->label('Syarat Pendaftaran')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->dehydrated()
                    ->mutateDehydratedStateUsing(function ($state) {
                        return collect($state)->pluck('syarat_pendaftaran')->toArray();
                    })
                    ->afterStateHydrated(function ($state, callable $set) {
                        if (is_array($state) && isset($state[0]) && is_string($state[0])) {
                            $set('syarat_pendaftaran', collect($state)->map(fn($item) => ['syarat_pendaftaran' => $item])->toArray());
                        }
                    })

                    ->addActionLabel('Tambah Syarat'),

                Forms\Components\Repeater::make('prosedur_pendaftaran')
                    ->schema([
                        Forms\Components\TextInput::make('prosedur_pendaftaran')
                            ->label('Prosedur Pendaftaran')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->dehydrated()
                    ->mutateDehydratedStateUsing(function ($state) {
                        return collect($state)->pluck('prosedur_pendaftaran')->toArray();
                    })
                    ->afterStateHydrated(function ($state, callable $set) {
                        if (is_array($state) && isset($state[0]) && is_string($state[0])) {
                            $set('prosedur_pendaftaran', collect($state)->map(fn($item) => ['prosedur_pendaftaran' => $item])->toArray());
                        }
                    })

                    ->addActionLabel('Tambah Prosedur'),

                Forms\Components\TextInput::make('kontak_wa')
                    ->required()
                    ->placeholder('Contoh: 62xxxx')
                    ->label('Kontak WhatsApp')
                    ->tel(),

                Forms\Components\TextInput::make('gelombang')
                    ->label('Gelombang')
                    ->placeholder('Contoh: Gelombang 1'),

                Forms\Components\TextInput::make('tahun')
                    ->label('Tahun')
                    ->placeholder('Contoh: 2023/2024')
                    ->required(),

                Forms\Components\TextInput::make('jam_operasional_hari')
                    ->label('Hari Operasional')
                    ->placeholder('Contoh: Senin - Jumat'),

                Forms\Components\TextInput::make('jam_operasional_jam')
                    ->label('Jam Operasional')
                    ->placeholder('Contoh: 08.00 - 13.00'),

                Forms\Components\Toggle::make('status_aktif')
                    ->label('Aktifkan PPDB')
                    ->default(true),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_ppdb')
                    ->label('Banner PPDB')
                    ->disk('public')
                    ->wrap()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')->date(),
                Tables\Columns\TextColumn::make('tanggal_selesai')->date(),
                Tables\Columns\TextColumn::make('tanggal_pengumuman')->date(),
                Tables\Columns\BooleanColumn::make('status_aktif')->label('Status Aktif'),
                Tables\Columns\TextColumn::make('kontak_wa')->label('Kontak WA'),
                Tables\Columns\TextColumn::make('syarat_pendaftaran')
                    ->label('Syarat Pendaftaran')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode(', ', $state) : $state;
                    })
                    ->wrap(),
                Tables\Columns\TextColumn::make('prosedur_pendaftaran')
                    ->label('Prosedur Pendaftaran')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode(', ', $state) : $state;
                    })
                    ->wrap(),
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
                    ->successNotificationTitle('Data berhasil Di update')
                    ->color('success'),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListInformasippdbs::route('/'),
            'create' => Pages\CreateInformasippdb::route('/create'),
            'edit' => Pages\EditInformasippdb::route('/{record}/edit'),
        ];
    }
}
