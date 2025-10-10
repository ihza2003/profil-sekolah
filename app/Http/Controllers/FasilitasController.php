<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Menampilkan halaman daftar fasilitas sekolah.
     *
     * Fungsi ini mengambil data fasilitas dari database
     * dengan relasi ke admin yang menambahkan data.
     * Data akan ditampilkan secara terurut dari yang terbaru
     * dan dipaginasi sebanyak 8 item per halaman.
     *
     * Hasilnya dikirim ke view `pages.profile.fasilitas`
     * untuk ditampilkan di bagian profil sekolah.
     *
     * @return \Illuminate\View\View
     */
    public function showFasilitas()
    {
        $fasilitas = Fasilitas::with('admin')->latest()->paginate(8);
        return view('pages.profile.fasilitas', compact('fasilitas'));
    }
}
