<?php

namespace App\Filament\Resources\StatistikSekolahResource\Pages;

use App\Filament\Resources\StatistikSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatistikSekolah extends EditRecord
{
    protected static string $resource = StatistikSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
