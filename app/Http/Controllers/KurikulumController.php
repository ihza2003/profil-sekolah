<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function showKurikulum()
    {
        // $kurikulums = Kurikulum::with('mapel')->latest()->get();
        // return view('pages.kurikulum.index');
        $kurikulums = Kurikulum::with([
            'kelas' => function ($q) {
                $q->orderBy('tingkat');
            },
            'mapel' => function ($q) {
                $q->orderByRaw("FIELD(type, 'Umum', 'Agama', 'Muatan Lokal')")
                    ->orderBy('nama'); // setelah kategori, baru urutkan nama
            }
        ])->get();
        return view('pages.kurikulum.kurikulum', compact('kurikulums'));
    }
}
