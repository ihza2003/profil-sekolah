<?php

namespace App\Filament\Resources\PengaturanWebsiteResource\Pages;

use App\Filament\Resources\PengaturanWebsiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengaturanWebsites extends ListRecords
{
    protected static string $resource = PengaturanWebsiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
