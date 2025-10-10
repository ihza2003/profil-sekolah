<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

/**
 * Class GuruController
 *
 * Controller ini bertanggung jawab untuk menampilkan dan melakukan pencarian data guru.
 * Data guru diambil beserta relasi mata pelajaran dan admin.
 *
 * @package App\Http\Controllers
 */

class GuruController extends Controller
{
    /**
     * Menampilkan daftar guru dengan relasi mata pelajaran dan admin.
     *
     * Method ini mengambil data guru yang memiliki relasi dengan tabel mata pelajaran (`mapel`)
     * dan admin. Data diurutkan berdasarkan entri terbaru dan ditampilkan secara paginasi
     * sebanyak 4 item per halaman.
     *
     * @return \Illuminate\View\View 
     */
    public function showGuru()
    {
        $guru = Guru::with('mapel')->latest()->paginate(4);
        return view('pages.profile.guru', compact('guru'));
    }

    /**
     * Melakukan pencarian guru berdasarkan nama, NIP, atau nama mata pelajaran.
     *
     * Method ini menerima input pencarian dari pengguna, lalu mencari data guru
     * yang cocok berdasarkan nama, NIP, atau nama mata pelajaran yang diajarkan.
     * Pencarian dilakukan menggunakan query `LIKE`, dan hasilnya ditampilkan secara
     * paginasi sebanyak 12 item per halaman.
     *
     * @param \Illuminate\Http\Request $request Objek request yang berisi parameter pencarian.
     * @return \Illuminate\View\View 
     */
    public function searchGuru(Request $request)
    {
        $search = $request->input('search');
        $guru = Guru::with('mapel', 'admin')
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('nip', 'LIKE', "%{$search}%")
            ->orWhereHas('mapel', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(4)
            ->withQueryString();
        return view('pages.profile.guru', compact('guru'));
    }
}
