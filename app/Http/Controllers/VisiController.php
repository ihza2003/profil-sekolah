<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    public function showVisi()
    {
        $visi = Visi::with('admin')->first();
        return view('pages.profile.visi', compact('visi'));
    }
}
