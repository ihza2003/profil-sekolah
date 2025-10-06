<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{

    // Menampilkan halaman ekskul dengan data ekskul terbaru, dipaginasi 6 per halaman
    public function showEkskul()
    {
        $ekskul = Ekskul::with('admin')->latest()->paginate(6);
        return view('pages.Ekskul.ekskul', compact('ekskul'));
    }

    // menampilkan detail ekskul berdasarkan ID
    public function DetailEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('pages.Ekskul.detail-ekskul', compact('ekskul'));
    }
}
