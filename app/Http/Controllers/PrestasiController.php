<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

/**
 * Controller yang mengelola tampilan dan pencarian data prestasi sekolah.
 *
 * Controller ini bertanggung jawab untuk menampilkan daftar prestasi,
 * melakukan pencarian berdasarkan judul atau isi, serta menampilkan
 * detail dari masing-masing prestasi.
 *
 * @package App\Http\Controllers
 */
class PrestasiController extends Controller
{

    /**
     * Menampilkan halaman daftar prestasi sekolah.
     *
     * Fungsi ini mengambil data prestasi terbaru dari database beserta
     * relasi admin yang menambahkannya. Data akan ditampilkan dengan
     * paginasi sebanyak 6 item per halaman.
     *
     * @return \Illuminate\View\View
     */
    public function showPrestasi()
    {
        $prestasi = Prestasi::with('admin')->latest()->paginate(6);
        return view('pages.Prestasi.prestasi', compact('prestasi'));
    }

    /**
     * Mencari data prestasi berdasarkan judul atau isi.
     *
     * Fungsi ini menerima input pencarian dari pengguna, lalu mencari
     * data pada kolom `judul` atau `isi` menggunakan query LIKE.
     * Hasil pencarian akan ditampilkan dalam view yang sama dengan
     * daftar prestasi utama, disertai paginasi dan query string agar
     * hasil tetap terbawa saat berpindah halaman.
     *
     * @param  \Illuminate\Http\Request  $request  Permintaan HTTP yang berisi kata kunci pencarian.
     * @return \Illuminate\View\View
     */
    public function searchPrestasi(Request $request)
    {
        $search = $request->input('search');
        $prestasi = Prestasi::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->orWhere('isi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6)
            ->withQueryString();
        return view('pages.Prestasi.prestasi', compact('prestasi'));
    }

    /**
     * Menampilkan detail dari satu data prestasi berdasarkan ID.
     *
     * Fungsi ini mengambil data prestasi berdasarkan ID yang diterima
     * dari parameter route, kemudian menampilkannya di halaman detail.
     * Jika data tidak ditemukan, fungsi akan melempar error 404.
     *
     * @param  int  $id  ID dari data prestasi yang ingin ditampilkan.
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function DetailPrestasi($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('pages.Prestasi.detail-prestasi', compact('prestasi'));
    }
}
