<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{

    // Menampilkan halaman prestasi dengan data prestasi terbaru, dipaginasi 6 per halaman
    public function showPrestasi()
    {
        $prestasi = Prestasi::with('admin')->latest()->paginate(6);
        return view('pages.Prestasi.prestasi', compact('prestasi'));
    }

    // Mencari prestasi berdasarkan judul atau isi
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

    // Menampilkan detail prestasi berdasarkan ID
    public function DetailPrestasi($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('pages.Prestasi.detail-prestasi', compact('prestasi'));
    }
}
