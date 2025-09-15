<?php

namespace App\Filament\Resources\StatistikSekolahResource\Pages;

use App\Filament\Resources\StatistikSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStatistikSekolah extends CreateRecord
{
    protected static string $resource = StatistikSekolahResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
