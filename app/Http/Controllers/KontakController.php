<?php

namespace App\Http\Controllers;

use App\Models\Medsos;
use App\Models\Profil;
use Illuminate\Http\Request;

/**
 * Class KontakController
 *
 * Controller ini bertanggung jawab untuk menampilkan halaman kontak sekolah
 * yang memuat informasi profil serta media sosial dari database.
 *
 * @package App\Http\Controllers
 */
class KontakController extends Controller
{
    /**
     * Menampilkan halaman kontak berdasarkan data dari tabel profil dan media sosial.
     *
     * Method ini mengambil data profil dan media sosial terbaru (relasi dengan admin)
     * untuk ditampilkan pada halaman kontak. Hanya data pertama yang diambil dari masing-masing tabel.
     *
     * @return \Illuminate\View\View 
     */
    public function showkontak()
    {
        $kontak = Profil::with('admin')->first();
        $medsos = Medsos::with('admin')->first();
        return view('pages.Kontak.kontak', compact('kontak'));
    }
}
