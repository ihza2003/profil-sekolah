<?php

namespace App\Filament\Resources\InformasippdbResource\Pages;

use App\Filament\Resources\InformasippdbResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInformasippdb extends CreateRecord
{
    protected static string $resource = InformasippdbResource::class;

    public function getTitle(): string
    {
        return 'Tambahkan Informasi PPDB';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
