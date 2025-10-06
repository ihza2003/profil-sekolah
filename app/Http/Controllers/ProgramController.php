<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Menampilkan halaman program dengan data program terbaru, dipaginasi 6 per halaman
    public function showProgram()
    {
        $program = Program::with('admin')->latest()->paginate(6);
        return view('pages.Program.index', compact('program'));
    }

    // menampilkan detail program berdasarkan ID
    public function DetailProgram($id)
    {
        $program = Program::findOrFail($id);
        return view('pages.Program.detail-program', compact('program'));
    }
}
