<?php

namespace App\Filament\Resources\AkreditasiResource\Pages;

use Filament\Actions;
use App\Models\Akreditasi;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AkreditasiResource;

class ListAkreditasis extends ListRecords
{
    protected static string $resource = AkreditasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => Akreditasi::count() < 1),
        ];
    }
}
