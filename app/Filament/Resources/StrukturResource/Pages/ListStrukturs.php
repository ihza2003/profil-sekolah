<?php

namespace App\Filament\Resources\StrukturResource\Pages;

use Filament\Actions;
use App\Models\StrukturOrganisasi;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\StrukturResource;

class ListStrukturs extends ListRecords
{
    protected static string $resource = StrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => StrukturOrganisasi::count() < 1),
        ];
    }
}
