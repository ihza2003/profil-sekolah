<?php

namespace App\Http\Controllers;

use App\Models\Medsos;
use App\Models\Profil;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function showkontak()
    {
        $kontak = Profil::with('admin')->first();
        $medsos = Medsos::with('admin')->first();
        return view('pages.Kontak.kontak', compact('kontak'));
    }
}
