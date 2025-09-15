<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AkreditasController extends Controller
{
    public function showAkreditasi()
    {
        $akreditasi = Akreditasi::with('admin')->first();
        // if (!$akreditasi) {
        //     return redirect()->back()->with('error', 'Data akreditasi tidak ditemukan.');
        // }
        return view('pages.profile.akreditasi', compact('akreditasi'));
    }


    public function downloadPDF()
    {
        $akreditasi = Akreditasi::with('admin')->first();
        $imagePath = 'storage/' . $akreditasi->gambar;

        $pdf = Pdf::loadView('pages.profile.download-akreditas', compact('imagePath'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('sertifikat-akreditasi.pdf');
    }
}
