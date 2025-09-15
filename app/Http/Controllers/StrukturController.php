<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturController extends Controller
{
    public function showStruktur()
    {
        $struktur = StrukturOrganisasi::with('admin')->first();
        return view('pages.profile.struktur', compact('struktur'));
    }
}
