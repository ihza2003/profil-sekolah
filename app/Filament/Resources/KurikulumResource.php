<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kurikulum;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KurikulumResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KurikulumResource\RelationManagers;
use App\Filament\Resources\KurikulumResource\RelationManagers\MapelRelationManager;

class KurikulumResource extends Resource
{
    protected static ?string $model = Kurikulum::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Manajemen Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kurikulum')
                    ->label('Nama Kurikulum')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('mapel')
                    ->label('Mata Pelajaran')
                    ->placeholder('Pilih Mata Pelajaran yang diajarkan')
                    ->multiple()
                    ->relationship('mapel', 'nama')
                    ->preload()
                    ->searchable(),

                // Forms\Components\TextInput::make('kelas')
                //     ->label('Kelas')
                //     ->placeholder('Masukan Kelas untuk kurikulum')
                //     ->numeric()
                //     ->unique(ignoreRecord: true, table: 'kurikulum', column: 'kelas')
                //     ->validationMessages([
                //         'unique' => 'Kelas Sudah Pernah Ditambahkan.',
                //     ]),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kurikulum')
                    ->label('Nama Kurikulum')
                    ->sortable()
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\TextColumn::make('mapel.nama')
                    ->label('Mapel')
                    ->listWithLineBreaks(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y - H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d M Y - H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotificationTitle('Kurikulum berhasil Di update')
                    ->color('success'),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Berhasil menghapus Kurikulum')
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
            // MapelRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKurikulums::route('/'),
            'create' => Pages\CreateKurikulum::route('/create'),
            'edit' => Pages\EditKurikulum::route('/{record}/edit'),
        ];
    }
}
