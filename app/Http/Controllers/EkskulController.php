<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

/**
 * Class EkskulController
 *
 * Controller ini mengatur logika untuk menampilkan data ekstrakurikuler sekolah,
 * termasuk daftar seluruh ekskul dan detail dari setiap ekskul.
 *
 * @package App\Http\Controllers
 */

class EkskulController extends Controller
{

    /**
     * Menampilkan halaman daftar ekstrakurikuler.
     *
     * Fungsi ini mengambil data ekskul terbaru dari database beserta relasi admin
     * yang menambahkannya. Data kemudian dipaginasi sebanyak 6 item per halaman
     * dan dikirimkan ke view `pages.Ekskul.ekskul` untuk ditampilkan.
     *
     * @return \Illuminate\View\View
     */
    public function showEkskul()
    {
        $ekskul = Ekskul::with('admin')->latest()->paginate(6);
        return view('pages.Ekskul.ekskul', compact('ekskul'));
    }

    /**
     * Menampilkan detail dari ekstrakurikuler tertentu.
     *
     * Fungsi ini mencari data ekskul berdasarkan ID yang diberikan.
     * Jika data tidak ditemukan, akan otomatis menampilkan error 404.
     * Data yang ditemukan kemudian dikirim ke view `pages.Ekskul.detail-ekskul`
     * untuk ditampilkan secara detail.
     *
     * @param  int  $id  ID dari ekstrakurikuler yang ingin ditampilkan
     * @return \Illuminate\View\View
     */
    public function DetailEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('pages.Ekskul.detail-ekskul', compact('ekskul'));
    }
}
