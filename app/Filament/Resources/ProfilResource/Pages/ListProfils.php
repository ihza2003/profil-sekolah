<?php

namespace App\Filament\Resources\ProfilResource\Pages;

use Filament\Actions;
use App\Models\Profil;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProfilResource;

class ListProfils extends ListRecords
{
    protected static string $resource = ProfilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => Profil::count() < 1),
        ];
    }
}
