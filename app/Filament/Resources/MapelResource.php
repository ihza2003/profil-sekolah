<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MapelResource\Pages;
use App\Filament\Resources\MapelResource\RelationManagers;
use App\Models\Mapel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MapelResource extends Resource
{
    protected static ?string $model = Mapel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Manajemen Akademik';

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Mata Pelajaran';
    }

    protected static ?string $navigationLabel = 'Mata Pelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Mapel')
                    ->required()
                    ->unique(ignoreRecord: true, table: 'mapel', column: 'nama')
                    ->validationMessages([
                        'unique' => 'Mapel ini sudah pernah ditambahkan.',
                    ])
                    ->maxLength(255),

                Forms\Components\TextInput::make('type')
                    ->label('Tipe Mapel')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Mapel')
                    ->sortable()
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type Mapel')
                    ->sortable()
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Create')
                    ->toggleable()
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
                    ->toggleable()
                    ->dateTime('d M Y - H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('success'),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Berhasil menghapus Mata Pelajaran')
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
            'index' => Pages\ListMapels::route('/'),
            'create' => Pages\CreateMapel::route('/create'),
            'edit' => Pages\EditMapel::route('/{record}/edit'),
        ];
    }
}
