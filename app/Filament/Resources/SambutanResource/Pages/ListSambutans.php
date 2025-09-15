<?php

namespace App\Filament\Resources\SambutanResource\Pages;

use Filament\Actions;
use App\Models\Sambutan;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SambutanResource;

class ListSambutans extends ListRecords
{
    protected static string $resource = SambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => Sambutan::count() < 1),
        ];
    }
}
