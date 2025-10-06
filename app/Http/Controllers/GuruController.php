<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;




class GuruController extends Controller
{
    // Menampilkan daftar guru dengan relasi mapel dan admin,
    //  diurutkan berdasarkan yang terbaru, dan dipaginasi 4 per halaman
    public function showGuru()
    {
        $gurus = Guru::with('mapel')->latest()->paginate(4);
        return view('pages.profile.guru', compact('gurus'));
    }

    // Mencari guru berdasarkan nama, nip, atau nama mata pelajaran
    public function searchGuru(Request $request)
    {
        $search = $request->input('search');
        $gurus = Guru::with('mapel', 'admin')
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('nip', 'LIKE', "%{$search}%")
            ->orWhereHas('mapel', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();
        return view('pages.profile.guru', compact('gurus'));
    }
}
