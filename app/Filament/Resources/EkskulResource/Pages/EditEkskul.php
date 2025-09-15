<?php

namespace App\Filament\Resources\EkskulResource\Pages;

use App\Filament\Resources\EkskulResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEkskul extends EditRecord
{
    protected static string $resource = EkskulResource::class;

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
