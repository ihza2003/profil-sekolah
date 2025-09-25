<?php

namespace App\Filament\Resources\FormPPDBResource\Pages;

use App\Filament\Resources\FormPPDBResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormPPDB extends EditRecord
{
    protected static string $resource = FormPPDBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotificationTitle('Berhasil menghapus data siswa baru')
                ->color('danger'),
        ];
    }

    public function getTitle(): string
    {
        return 'Edit Data Siswa Baru';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
