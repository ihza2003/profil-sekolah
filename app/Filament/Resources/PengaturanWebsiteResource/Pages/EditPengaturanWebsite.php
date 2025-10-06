<?php

namespace App\Filament\Resources\PengaturanWebsiteResource\Pages;

use App\Filament\Resources\PengaturanWebsiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengaturanWebsite extends EditRecord
{
    protected static string $resource = PengaturanWebsiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
