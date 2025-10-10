<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Galeri;
use App\Models\Program;
use App\Models\Prestasi;
use App\Models\Testimoni;
use Illuminate\Http\Request;

/**
 * Class SearchGlobalController
 *
 * Controller ini menangani fitur pencarian global pada berbagai entitas dalam website,
 * seperti Berita, Prestasi, Testimoni, Ekskul, Program, Guru, dan Galeri.
 *
 * Setiap model akan dipanggil dengan pencarian berbasis kata kunci (`LIKE`)
 * dan hasilnya akan ditampilkan dalam halaman hasil pencarian global.
 *
 * @package App\Http\Controllers
 */

class SearchGlobalController extends Controller
{
    /**
     * Melakukan pencarian global berdasarkan kata kunci yang dimasukkan pengguna.
     *
     * Pencarian dilakukan pada beberapa model sekaligus:
     * - Berita (judul, isi)
     * - Prestasi (judul, isi)
     * - Testimoni (nama, status, posisi)
     * - Ekskul (judul, isi, kategori)
     * - Program (judul, isi, kategori)
     * - Guru (nama, nip, nama mapel)
     * - Galeri (judul)
     *
     * @param  \Illuminate\Http\Request  $request  Request dari pengguna yang berisi input pencarian.
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     *
     * @example
     * GET /search?search=matematika
     * Akan mencari semua entitas yang mengandung kata "matematika" di kolom relevan.
     */
    public function global(Request $request)
    {
        $search = $request->input('search');

        // Jika tidak ada kata kunci pencarian, redirect kembali ke beranda
        if (!$search) {
            return redirect()->route('beranda');
        }

        $berita = Berita::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->orWhere('isi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6, ['*'], 'berita_page')
            ->withQueryString();

        $prestasi = Prestasi::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->orWhere('isi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6, ['*'], 'prestasi_page')
            ->withQueryString();

        $testimoni = Testimoni::with('admin')
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            ->orWhere('posisi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6, ['*'], 'testimoni_page')
            ->withQueryString();

        $ekskul = Ekskul::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->orWhere('isi', 'LIKE', "%{$search}%")
            ->orwhere('kategori', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6, ['*'], 'ekskul_page')
            ->withQueryString();

        $program = Program::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->orWhere('isi', 'LIKE', "%{$search}%")
            ->orwhere('kategori', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6, ['*'], 'program_page')
            ->withQueryString();

        $guru = Guru::with('mapel', 'admin')
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('nip', 'LIKE', "%{$search}%")
            ->orWhereHas('mapel', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(6, ['*'], 'guru_page')
            ->withQueryString();

        $galeri = Galeri::with('admin')
            ->where('judul', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(8, ['*'], 'galeri_page')
            ->withQueryString();

        return view(
            'pages.landing.search-global',
            compact('search', 'berita', 'prestasi', 'testimoni', 'ekskul', 'program', 'guru', 'galeri')
        );
    }
}
