<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function showFasilitas()
    {
        $fasilitas = Fasilitas::with('admin')->latest()->paginate(8);
        return view('pages.profile.fasilitas', compact('fasilitas'));
    }
}
