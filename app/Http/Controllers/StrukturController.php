<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturController extends Controller
{
    /**
     * Menampilkan halaman struktur organisasi sekolah.
     *
     * Fungsi ini mengambil satu data struktur organisasi terbaru dari database,
     * termasuk relasi admin yang menambahkannya. Data kemudian dikirim ke view
     * `pages.profile.struktur` untuk ditampilkan di bagian profil sekolah.
     *
     * @return \Illuminate\View\View
     */
    public function showStruktur()
    {
        $struktur = StrukturOrganisasi::with('admin')->first();
        return view('pages.profile.struktur', compact('struktur'));
    }
}
