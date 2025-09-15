<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    // menampilkan data misi ke publik
    public function showVisi()
    {
        return view('pages.profile.visi');
    }

    public function showStruktur()
    {
        return view('pages.profile.struktur');
    }
}
