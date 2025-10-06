<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Program;
use App\Models\Prestasi;
use App\Models\Sambutan;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Models\StatistikSekolah;

class BerandaController extends Controller
{

    // Menampilkan halaman beranda dengan data sambutan, statistik, berita terbaru, dan testimoni
    public function index()
    {
        $sambutan = Sambutan::with('admin')->latest()->first();
        $statistik = StatistikSekolah::latest()->first();
        $beritaTerbaru = Berita::with('admin')->latest()->take(3)->get();
        $testimoni = Testimoni::with('admin')->latest()->take(6)->get();
        return view('pages.landing.beranda', compact('beritaTerbaru', 'testimoni', 'sambutan', 'statistik'));
    }

    // Pencarian global di berbagai model seperti Berita, Prestasi, Testimoni, Ekskul, dan Program
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

        return view(
            'pages.landing.Search-Global',
            compact('search', 'berita', 'prestasi', 'testimoni', 'ekskul', 'program')
        );
    }

    // Menampilkan detail sambutan berdasarkan ID
    public function showsambutan($id)
    {
        $sambutan = Sambutan::findOrFail($id);
        // dd($sambutan->id);
        return view('pages.landing.detail-sambutan', compact('sambutan'));
    }
}
