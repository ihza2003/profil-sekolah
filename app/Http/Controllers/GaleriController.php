<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function showGaleri()
    {
        $galeri = Galeri::with('admin')->latest()->paginate(8);
        return view('pages.Galeri.galeri', compact('galeri'));
    }
}
