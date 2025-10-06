<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{

    public function showTestimoni()
    {
        $testimoni = Testimoni::with('admin')->latest()->paginate(4);
        return view('pages.Testimoni.index', compact('testimoni'));
    }

    public function searchTestimoni(Request $request)
    {
        $search = $request->input('search');
        $testimoni = Testimoni::with('admin')
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            ->orWhere('posisi', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(4)
            ->withQueryString();
        return view('pages.Testimoni.index', compact('testimoni'));
    }

    public function DetailTestimoni($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('pages.Testimoni.detail-testimoni', compact('testimoni'));
    }
}
