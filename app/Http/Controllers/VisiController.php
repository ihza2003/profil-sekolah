<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    /**
     * Menampilkan halaman visi, misi, dan tujuan sekolah.
     *
     * Fungsi ini mengambil satu data visi dari tabel `visi` yang berelasi
     * dengan admin yang menambahkannya. Data tersebut dikirim ke view
     * `pages.profile.visi` untuk ditampilkan di bagian profil sekolah.
     *
     * @return \Illuminate\View\View
     */
    public function showVisi()
    {
        $visi = Visi::with('admin')->first();
        return view('pages.profile.visi', compact('visi'));
    }
}
