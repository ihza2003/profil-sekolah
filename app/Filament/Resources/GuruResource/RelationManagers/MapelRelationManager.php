<?php

namespace App\Filament\Resources\GuruResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MapelRelationManager extends RelationManager
{
    protected static string $relationship = 'mapel';



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mapel_id')
                    ->label('Pilih Mapel')
                    ->relationship('mapel', 'nama') // ini ambil nama dari model Mapel
                    ->searchable()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
            ])
            ->filters([
                //
            ])
            ->headerActions([

                Tables\Actions\AttachAction::make()
                    ->label('Tambah Mapel')
                    ->color('success')
                    ->modalHeading('Pilih Mapel yang Diampu')
                    ->successNotificationTitle('mapel Berhasil Ditambahkan')
                    ->modalSubmitActionLabel('Simpan'),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make()
                    ->label('Hapus Mapel')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->successNotificationTitle('Berhasil menghapus mapel dari guru')
                    ->modalHeading('Yakin ingin menghapus mapel ini dari guru?'),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
