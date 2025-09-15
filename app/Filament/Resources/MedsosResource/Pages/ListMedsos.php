<?php

namespace App\Filament\Resources\MedsosResource\Pages;

use Filament\Actions;
use App\Models\Medsos;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MedsosResource;

class ListMedsos extends ListRecords
{
    protected static string $resource = MedsosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => Medsos::count() < 1),
        ];
    }
}
