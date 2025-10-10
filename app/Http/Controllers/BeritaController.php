<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman daftar berita.
     *
     * Controller ini akan mengambil data berita dari database
     * dengan relasi ke admin, kemudian menampilkannya secara
     * terurut dari yang terbaru. Data ditampilkan dengan
     * paginasi berjumlah 6 data per halaman.
     *
     * @return \Illuminate\View\View
     */
    public function showBerita()
    {
        $berita = Berita::with('admin')->latest()->paginate(6);
        return view('pages.Berita.berita', compact('berita'));
    }

    /**
     * Melakukan pencarian berita berdasarkan kata kunci.
     *
     * Fungsi ini digunakan untuk menampilkan hasil pencarian
     * berita berdasarkan judul atau isi yang mengandung kata kunci.
     * Hasil pencarian juga ditampilkan dengan paginasi 6 data per halaman.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function searchBerita(Request $request)
    {
        $search = $request->input('search');
        $berita = Berita::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->orWhere('isi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('pages.Berita.berita', compact('berita'));
    }

    /**
     * Menampilkan detail berita berdasarkan ID.
     *
     * Fungsi ini akan mencari berita berdasarkan ID yang diberikan.
     * Jika berita tidak ditemukan, akan memunculkan berita tidak ditemukan.
     * Jika ditemukan, data berita akan diteruskan ke view detail.
     *
     * @param  int  $id  ID berita yang ingin ditampilkan.
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function DetailBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.Berita.detail-berita', compact('berita'));
    }
}
