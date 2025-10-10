<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Menampilkan halaman daftar program unggulan sekolah.
     *
     * Fungsi ini mengambil data program terbaru dari tabel `programs-unggulan`
     * yang berelasi dengan admin, lalu menampilkannya di halaman
     * `pages.Program.index` dengan sistem paginasi 6 item per halaman.
     *
     * @return \Illuminate\View\View
     */
    public function showProgram()
    {
        $program = Program::with('admin')->latest()->paginate(6);
        return view('pages.Program.index', compact('program'));
    }

    /**
     * Menampilkan detail program unggulan berdasarkan ID.
     *
     * Fungsi ini mencari satu data program berdasarkan ID yang dikirim
     * melalui parameter URL. Jika data tidak ditemukan, otomatis akan
     * menghasilkan error 404. Data yang ditemukan kemudian dikirim
     * ke view `pages.Program.detail-program` untuk ditampilkan.
     *
     * @param  int  $id  ID program yang ingin ditampilkan
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function DetailProgram($id)
    {
        $program = Program::findOrFail($id);
        return view('pages.Program.detail-program', compact('program'));
    }
}
