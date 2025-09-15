<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedsosResource\Pages;
use App\Filament\Resources\MedsosResource\RelationManagers;
use App\Models\Medsos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedsosResource extends Resource
{
    protected static ?string $model = Medsos::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Media Sosial';

    protected static ?string $navigationGroup = 'Kelola Profil Sekolah';

    public static function getPluralModelLabel(): string
    {
        return 'Media Sosial Sekolah';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('youtube')
                    ->label('YouTube')
                    ->placeholder('https://www.youtube.com/channel/...')
                    ->maxLength(255)
                    ->nullable()
                    ->rules(['nullable', 'url', 'starts_with:https://www.youtube.com,https://youtube.com'])
                    ->validationMessages([
                        'starts_with' => 'Link tidak valid. Pastikan link YouTube dimulai dengan "https://www.youtube.com/" atau "https://youtube.com/".',
                    ]),

                Forms\Components\TextInput::make('facebook')
                    ->label('Facebook')
                    ->placeholder('https://www.facebook.com/...')
                    ->maxLength(255)
                    ->nullable()
                    ->rules(['nullable', 'url', 'starts_with:https://www.facebook.com,https://facebook.com'])
                    ->validationMessages([
                        'starts_with' => 'Link tidak valid. Pastikan link Facebook dimulai dengan "https://www.facebook.com/" atau "https://facebook.com/".',
                    ]),

                Forms\Components\TextInput::make('instagram')
                    ->label('Instagram')
                    ->placeholder('https://www.instagram.com/...')
                    ->maxLength(255)
                    ->nullable()
                    ->rules(['nullable', 'url', 'starts_with:https://www.instagram.com,https://instagram.com'])
                    ->validationMessages([
                        'starts_with' => 'Link tidak valid. Pastikan link Instagram dimulai dengan "https://www.instagram.com/" atau "https://instagram.com/".',
                    ]),

                Forms\Components\TextInput::make('twitter')
                    ->label('Twitter')
                    ->placeholder('https://twitter.com/...')
                    ->maxLength(255)
                    ->nullable()
                    ->rules(['nullable', 'url', 'starts_with:https://twitter.com,https://www.twitter.com'])
                    ->validationMessages([
                        'starts_with' => 'Link tidak valid. Pastikan link Twitter dimulai dengan "https://twitter.com/" atau "https://www.twitter.com/".',
                    ]),

                Forms\Components\TextInput::make('tiktok')
                    ->label('TikTok')
                    ->placeholder('https://www.tiktok.com/@...')
                    ->maxLength(255)
                    ->nullable()
                    ->rules(['nullable', 'url', 'starts_with:https://www.tiktok.com,https://tiktok.com'])
                    ->validationMessages([
                        'starts_with' => 'Link tidak valid. Pastikan link TikTok dimulai dengan "https://www.tiktok.com/" atau "https://tiktok.com/".',
                    ]),

                Forms\Components\Hidden::make('admin_id')
                    ->default(fn() => auth('admin')->id()),

                // Forms\Components\Select::make('admin_id')
                //     ->relationship('admin', 'name')
                //     ->label('Admin')
                //     ->nullable()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('youtube')
                    ->label('YouTube')
                    ->wrap()
                    ->url(fn($record) => $record->youtube)
                    ->limit(30),

                Tables\Columns\TextColumn::make('facebook')
                    ->label('Facebook')
                    ->wrap()
                    ->url(fn($record) => $record->facebook)
                    ->limit(30),

                Tables\Columns\TextColumn::make('instagram')
                    ->label('Instagram')
                    ->wrap()
                    ->url(fn($record) => $record->instagram)
                    ->limit(30),

                Tables\Columns\TextColumn::make('twitter')
                    ->label('Twitter')
                    ->wrap()
                    ->url(fn($record) => $record->twitter)
                    ->limit(30),

                Tables\Columns\TextColumn::make('tiktok')
                    ->label('TikTok')
                    ->wrap()
                    ->url(fn($record) => $record->tiktok)
                    ->limit(30),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Create')
                    ->dateTime('d M Y - H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
                    ->dateTime('d M Y - H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
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
            'index' => Pages\ListMedsos::route('/'),
            'create' => Pages\CreateMedsos::route('/create'),
            'edit' => Pages\EditMedsos::route('/{record}/edit'),
        ];
    }
}
