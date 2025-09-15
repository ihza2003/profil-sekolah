<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function showBerita()
    {
        $berita = Berita::with('admin')->latest()->paginate(6);
        return view('pages.Berita.berita', compact('berita'));
    }

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

    public function DetailBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.Berita.Detail-Berita', compact('berita'));
    }
}
