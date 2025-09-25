<?php

namespace App\Filament\Resources\FormPPDBResource\Pages;

use Filament\Actions;
use App\Models\InformasiPpdb;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\FormPPDBResource;

class CreateFormPPDB extends CreateRecord
{
    protected static string $resource = FormPPDBResource::class;

    public function getTitle(): string
    {
        return 'Tambahkan Siswa Baru';
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['informasi_ppdb_id'] = InformasiPpdb::where('status_aktif', true)->value('id');

    //     return $data;
    // }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Berhasil Menambahkan Data Siswa Baru';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $infoAktif = InformasiPpdb::where('status_aktif', true)->first();

        if (! $infoAktif) {
            Notification::make()
                ->title('Gagal Menyimpan')
                ->body('Belum ada informasi PPDB yang aktif. Silakan aktifkan terlebih dahulu.')
                ->danger()
                ->send();

            // hentikan proses create
            $this->halt();
        }

        $data['informasi_ppdb_id'] = $infoAktif->id;

        return $data;
    }
}
