<?php

namespace App\Http\Controllers;

use App\Models\Medsos;
use App\Models\Profil;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Menampilkan halaman kontak dari tabel profil dan media sosial 
    public function showkontak()
    {
        $kontak = Profil::with('admin')->first();
        $medsos = Medsos::with('admin')->first();
        return view('pages.Kontak.kontak', compact('kontak'));
    }
}
