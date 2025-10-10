<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class AkreditasController
 *
 * Controller ini menangani tampilan dan pengunduhan sertifikat akreditasi sekolah.
 * Termasuk menampilkan data akreditasi dari database serta menghasilkan file PDF 
 * dari sertifikat akreditasi menggunakan pustaka DomPDF.
 *
 * @package App\Http\Controllers
 */
class AkreditasController extends Controller
{
    /**
     * Menampilkan halaman akreditasi sekolah.
     *
     * Fungsi ini mengambil data akreditasi beserta relasi admin yang menambahkannya,
     * kemudian mengirimkan data tersebut ke view `pages.profile.akreditasi`.
     *
     * @return \Illuminate\View\View
     */
    public function showAkreditasi()
    {
        $akreditasi = Akreditasi::with('admin')->first();
        return view('pages.profile.akreditasi', compact('akreditasi'));
    }

    /**
     * Mengunduh sertifikat akreditasi dalam format PDF.
     *
     * Fungsi ini mengambil data akreditasi dari database, memuat gambar sertifikat
     * dari storage, lalu merendernya menjadi file PDF menggunakan DomPDF. 
     * File PDF diatur dalam orientasi landscape dan diberi nama `sertifikat-akreditasi.pdf`.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadPDF()
    {
        $akreditasi = Akreditasi::with('admin')->first();
        $imagePath = 'storage/' . $akreditasi->gambar;

        $pdf = Pdf::loadView('pages.profile.download-akreditas', compact('imagePath'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('sertifikat-akreditasi.pdf');
    }
}
