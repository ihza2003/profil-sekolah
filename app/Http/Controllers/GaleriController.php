<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Menampilkan halaman galeri sekolah.
     *
     * Fungsi ini mengambil data galeri terbaru dari database
     * beserta relasi admin yang menambahkannya. Data kemudian
     * dipaginasi sebanyak 8 item per halaman dan dikirim ke view
     * `pages.Galeri.galeri` untuk ditampilkan di bagian frontend.
     *
     * @return \Illuminate\View\View
     */
    public function showGaleri()
    {
        $galeri = Galeri::with('admin')->latest()->paginate(8);
        return view('pages.Galeri.galeri', compact('galeri'));
    }
}
