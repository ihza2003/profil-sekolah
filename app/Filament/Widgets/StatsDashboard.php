<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Program;
use App\Models\FormPPDB;
use App\Models\Prestasi;
use App\Models\Fasilitas;
use App\Models\Testimoni;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $jumalahberita = Berita::count();
        $jumlahprestasi = Prestasi::count();
        $jumlahekskul = Ekskul::count();
        $jumlahprogram = Program::count();
        $jumlahguru = Guru::count();
        $jumlahfasilitas = Fasilitas::count();
        $jumlahpendaftar = FormPPDB::count();
        $jumlahtestimoni = Testimoni::count();

        return [
            Stat::make('Berita', $jumalahberita)
                ->url(route('filament.admin.resources.beritas.index'))
                ->description('Kelola berita')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('success'),

            Stat::make('Prestasi', $jumlahprestasi)
                ->url(route('filament.admin.resources.prestasis.index'))
                ->description('Kelola prestasi')
                ->descriptionIcon('heroicon-o-trophy')
                ->color('success'),

            Stat::make('Ekstrakurikuler', $jumlahekskul)
                ->url(route('filament.admin.resources.ekskuls.index'))
                ->description('Kelola ekskul')
                ->descriptionIcon('heroicon-o-flag')
                ->color('success'),

            Stat::make('Program Unggulan', $jumlahprogram)
                ->url(route('filament.admin.resources.programs.index'))
                ->description('Kelola program')
                ->descriptionIcon('heroicon-o-light-bulb')
                ->color('success'),

            Stat::make('Guru', $jumlahguru)
                ->url(route('filament.admin.resources.gurus.index'))
                ->description('Kelola guru')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('success'),

            Stat::make('Fasilitas', $jumlahfasilitas)
                ->url(route('filament.admin.resources.fasilitas.index'))
                ->description('Kelola fasilitas')
                ->descriptionIcon('heroicon-o-building-library')
                ->color('success'),

            Stat::make('Testimoni', $jumlahtestimoni)
                ->url(route('filament.admin.resources.testimonis.index'))
                ->description('Kelola testimoni')
                ->descriptionIcon('heroicon-o-chat-bubble-left-right')
                ->color('success'),

            // Stat::make('Pendaftar PPDB', $jumlahpendaftar)
            //     ->url(route('filament.admin.resources.form-p-p-d-bs.index'))
            //     ->description('Kelola pendaftar')
            //     ->descriptionIcon('heroicon-o-users')
            //     ->color('success'),
        ];
    }
}
