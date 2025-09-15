<?php

namespace App\Filament\Resources\FormPPDBResource\Pages;

use App\Filament\Resources\FormPPDBResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormPPDBS extends ListRecords
{
    protected static string $resource = FormPPDBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Siswa'),
        ];
    }
}
