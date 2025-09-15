<?php

namespace App\Filament\Resources\EkskulResource\Pages;

use App\Filament\Resources\EkskulResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEkskul extends CreateRecord
{
    protected static string $resource = EkskulResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
