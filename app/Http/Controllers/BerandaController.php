<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Sambutan;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Models\StatistikSekolah;


class BerandaController extends Controller
{

    /**
     * Menampilkan halaman beranda utama website.
     *
     * Fungsi ini mengambil data dari beberapa model:
     * - Sambutan terbaru dari kepala sekolah atau admin.
     * - Statistik sekolah (jumlah guru, siswa, dll).
     * - Tiga berita terbaru.
     * - Enam testimoni terbaru.
     *
     * Semua data tersebut kemudian diteruskan ke tampilan `pages.landing.beranda`.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sambutan = Sambutan::with('admin')->latest()->first();
        $statistik = StatistikSekolah::latest()->first();
        $beritaTerbaru = Berita::with('admin')->latest()->take(3)->get();
        $testimoni = Testimoni::with('admin')->latest()->take(6)->get();
        return view('pages.landing.beranda', compact('beritaTerbaru', 'testimoni', 'sambutan', 'statistik'));
    }

    /**
     * Menampilkan detail sambutan berdasarkan ID.
     *
     * Fungsi ini digunakan untuk menampilkan satu sambutan tertentu
     * berdasarkan ID yang diberikan pada parameter. Jika ID tidak ditemukan,
     * maka akan menampilkan error 404 (ModelNotFoundException).
     *
     * @param  int  $id  ID dari sambutan yang ingin ditampilkan.
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function showsambutan($id)
    {
        $sambutan = Sambutan::findOrFail($id);
        // dd($sambutan->id);
        return view('pages.landing.detail-sambutan', compact('sambutan'));
    }
}
