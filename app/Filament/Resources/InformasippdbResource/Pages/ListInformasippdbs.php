<?php

namespace App\Filament\Resources\InformasippdbResource\Pages;

use App\Filament\Resources\InformasippdbResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasippdbs extends ListRecords
{
    protected static string $resource = InformasippdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Informasi PPDB'),
        ];
    }
}
