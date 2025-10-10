<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

/**
 * Class KurikulumController
 *
 * Controller ini bertanggung jawab untuk menampilkan data kurikulum,
 * termasuk relasi antara kelas dan mata pelajaran yang diurutkan
 * berdasarkan tingkat dan kategori tertentu.
 *
 * @package App\Http\Controllers
 */
class KurikulumController extends Controller
{
    /**
     * Menampilkan halaman kurikulum dengan data lengkap dari tabel Kurikulum,
     * termasuk relasi ke tabel kelas dan mapel yang telah diurutkan.
     *
     * @return \Illuminate\View\View 
     */
    public function showKurikulum()
    {
        $kurikulums = Kurikulum::with([
            'kelas' => function ($q) {
                // Mengurutkan kelas berdasarkan tingkat (misal: VII, VIII, IX)
                $q->orderBy('tingkat');
            },
            'mapel' => function ($q) {
                // Mengurutkan mapel berdasarkan kategori dan nama
                $q->orderByRaw("FIELD(type, 'Umum', 'Agama', 'Muatan Lokal')")
                    ->orderBy('nama');
            }
        ])->get();

        return view('pages.Kurikulum.kurikulum', compact('kurikulums'));
    }
}
