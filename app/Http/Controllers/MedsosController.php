<?php

namespace App\Http\Controllers;

use App\Models\Medsos;
use Illuminate\Http\Request;

class MedsosController extends Controller
{
    public function showMedsos()
    {
        $medsos = Medsos::with('admin')->first();
        return view('medsos', compact('medsos'));
    }
}
