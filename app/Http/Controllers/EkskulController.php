<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function showEkskul()
    {
        $ekskul = Ekskul::with('admin')->latest()->paginate(6);
        return view('pages.Ekskul.ekskul', compact('ekskul'));
    }
    public function DetailEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('pages.Ekskul.detail-ekskul', compact('ekskul'));
    }
}
