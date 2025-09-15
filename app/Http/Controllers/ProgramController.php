<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function showProgram()
    {
        $program = Program::with('admin')->latest()->paginate(6);
        return view('pages.Program.index', compact('program'));
    }

    public function DetailProgram($id)
    {
        $program = Program::findOrFail($id);
        return view('pages.Program.detail', compact('program'));
    }
}
