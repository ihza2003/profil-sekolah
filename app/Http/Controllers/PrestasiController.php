<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function showPrestasi()
    {
        $prestasi = Prestasi::with('admin')->latest()->paginate(6);
        return view('pages.Prestasi.prestasi', compact('prestasi'));
    }

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

    public function DetailPrestasi($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('pages.Prestasi.detail', compact('prestasi'));
    }
}
