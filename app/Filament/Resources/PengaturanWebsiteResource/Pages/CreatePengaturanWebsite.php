<?php

namespace App\Filament\Resources\PengaturanWebsiteResource\Pages;

use App\Filament\Resources\PengaturanWebsiteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengaturanWebsite extends CreateRecord
{
    protected static string $resource = PengaturanWebsiteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
