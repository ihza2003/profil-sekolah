<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{

    /**
     * Menampilkan halaman daftar testimoni.
     *
     * Fungsi ini mengambil data testimoni terbaru dari database
     * beserta relasi admin yang menambahkannya. Data kemudian dipaginasi
     * sebanyak 4 item per halaman dan dikirimkan ke view
     * `pages.Testimoni.index` untuk ditampilkan.
     *
     * @return \Illuminate\View\View
     */
    public function showTestimoni()
    {
        $testimoni = Testimoni::with('admin')->latest()->paginate(4);
        return view('pages.Testimoni.index', compact('testimoni'));
    }

    /**
     * Mencari testimoni berdasarkan nama, status, atau posisi.
     *
     * Fungsi ini mengambil input pencarian dari pengguna, lalu mencari
     * data testimoni yang sesuai dengan nama, status, atau posisi yang
     * mengandung kata kunci tersebut. Hasil pencarian dipaginasi sebanyak
     * 4 item per halaman dan dikembalikan ke view yang sama dengan hasil pencarian.
     *
     * @param  \Illuminate\Http\Request  $request  Objek request yang berisi parameter pencarian
     * @return \Illuminate\View\View
     */
    public function searchTestimoni(Request $request)
    {
        $search = $request->input('search');
        $testimoni = Testimoni::with('admin')
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            ->orWhere('posisi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(4)
            ->withQueryString();
        return view('pages.Testimoni.index', compact('testimoni'));
    }

    /**
     * Menampilkan detail dari satu testimoni.
     *
     * Fungsi ini mencari data testimoni berdasarkan ID yang diberikan.
     * Jika tidak ditemukan, akan menampilkan error 404.
     * Data kemudian dikirimkan ke view `pages.Testimoni.detail-testimoni`
     * untuk ditampilkan secara detail.
     *
     * @param  int  $id  ID dari testimoni yang ingin ditampilkan
     * @return \Illuminate\View\View
     */
    public function DetailTestimoni($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('pages.Testimoni.detail-testimoni', compact('testimoni'));
    }
}
