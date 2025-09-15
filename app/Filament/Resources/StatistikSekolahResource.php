<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikSekolahResource\Pages;
use App\Filament\Resources\StatistikSekolahResource\RelationManagers;
use App\Models\StatistikSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatistikSekolahResource extends Resource
{
    protected static ?string $model = StatistikSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Manajemen Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_guru')
                    ->label('Jumlah Guru')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
                Forms\Components\TextInput::make('jumlah_kelas')
                    ->label('Jumlah Kelas')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
                Forms\Components\TextInput::make('jumlah_siswa')
                    ->label('Jumlah Siswa')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_ajaran')->label('Tahun Ajaran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah_guru')->label('Jumlah Guru')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah_kelas')->label('Jumlah Kelas')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah_siswa')->label('Jumlah Siswa')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Data berhasil Di update')
                    ->color('success'),

                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Berhasil menghapus Data Statistik Sekolah')
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
            'index' => Pages\ListStatistikSekolahs::route('/'),
            'create' => Pages\CreateStatistikSekolah::route('/create'),
            'edit' => Pages\EditStatistikSekolah::route('/{record}/edit'),
        ];
    }
}
