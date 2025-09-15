<?php

namespace App\Filament\Resources\KurikulumResource\RelationManagers;

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
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
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
                // Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->label('Tambah Mapel')
                    ->color('primary')
                    ->modalHeading('Pilih Mapel yang termasuk dalam kurikulum')
                    ->successNotificationTitle('mapel Berhasil Ditambahkan')
                    ->modalSubmitActionLabel('Simpan'),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make()
                    ->label('Hapus Mapel')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->successNotificationTitle('Berhasil menghapus mapel dari kurikulum')
                    ->modalHeading('Yakin ingin menghapus mapel?'),
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
