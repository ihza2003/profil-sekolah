<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiResource\Pages;
use App\Filament\Resources\VisiResource\RelationManagers;
use App\Models\Visi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisiResource extends Resource
{
    protected static ?string $model = Visi::class;

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-rays';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function getNavigationLabel(): string
    {
        return 'Visi, Misi, & Tujuan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Visi, Misi, & Tujuan';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('sejarah')
                    ->label('Sejarah')
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
                    ]),
                Forms\Components\Textarea::make('visi')
                    ->label('Visi')
                    ->rows(5)
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\Repeater::make('misi')
                    ->label('Misi')
                    ->schema([
                        Forms\Components\TextInput::make('misi')
                            ->label('Misi')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->dehydrated()
                    ->mutateDehydratedStateUsing(function ($state) {
                        return collect($state)->pluck('misi')->toArray();
                    })
                    ->afterStateHydrated(function ($state, callable $set) {
                        if (is_array($state) && isset($state[0]) && is_string($state[0])) {
                            $set('misi', collect($state)->map(fn($item) => ['misi' => $item])->toArray());
                        }
                    })

                    ->addActionLabel('Tambah Misi'),


                Forms\Components\Repeater::make('tujuan')
                    ->label('tujuan')
                    ->schema([
                        Forms\Components\TextInput::make('tujuan')
                            ->label('tujuan')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->reorderableWithButtons()
                    ->dehydrated()
                    ->mutateDehydratedStateUsing(function ($state) {
                        return collect($state)->pluck('tujuan')->toArray();
                    })
                    ->afterStateHydrated(function ($state, callable $set) {
                        if (is_array($state) && isset($state[0]) && is_string($state[0])) {
                            $set('tujuan', collect($state)->map(fn($item) => ['tujuan' => $item])->toArray());
                        }
                    })

                    ->addActionLabel('Tambah Tujuan'),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sejarah')
                    ->label('Sejarah')
                    ->limit(50)
                    ->html()
                    ->wrap(),

                Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('misi')
                    ->label('Misi')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode(', ', $state) : $state;
                    })
                    ->wrap(),

                Tables\Columns\TextColumn::make('tujuan')
                    ->label('Tujuan')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode('< br >', $state) : $state;
                    })
                    ->wrap(),
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
            'index' => Pages\ListVisis::route('/'),
            'create' => Pages\CreateVisi::route('/create'),
            'edit' => Pages\EditVisi::route('/{record}/edit'),
        ];
    }
}
