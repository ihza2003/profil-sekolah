<?php

namespace App\Filament\Resources\InformasippdbResource\Pages;

use App\Filament\Resources\InformasippdbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasippdb extends EditRecord
{
    protected static string $resource = InformasippdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotificationTitle('Berhasil menghapus informasi PPDB')
                ->color('danger'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Edit Informasi PPDB';
    }
}
