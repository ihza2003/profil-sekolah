<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MedsosController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\AkreditasController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ProfilSekolahController;

// Route::get('/', function () {
//     return view('beranda');
// });

// route beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/detailSambutan/{id}', [BerandaController::class, 'showsambutan'])->name('beranda.detail-sambutan');
Route::get('/pencarian', [BerandaController::class, 'global'])->name('search.global');

// route profil madrasah
Route::get('/visi-misi', [VisiController::class, 'showVisi'])->name('profile.visi');
Route::get('/struktur', [StrukturController::class, 'showStruktur'])->name('profile.struktur');
Route::get('/akreditasi', [AkreditasController::class, 'showAkreditasi'])->name('profile.akreditasi');
Route::get('/download-akreditasi', [AkreditasController::class, 'downloadPDF'])->name('profile.download-akreditas');
Route::get('/fasilitas', [FasilitasController::class, 'showFasilitas'])->name('profile.fasilitas');

// Route Guru
Route::get('/guru', [GuruController::class, 'showGuru'])->name('profile.guru');
Route::get('/guru/pencarian', [GuruController::class, 'searchGuru'])->name('guru.search');

// route berita
Route::get('/berita', [BeritaController::class, 'showBerita'])->name('berita');
Route::get('/berita/pencarian', [BeritaController::class, 'searchBerita'])->name('berita.search');
Route::get('/berita/detail/{id}', [BeritaController::class, 'DetailBerita'])->name('berita.detail');


// Route Prestasi
Route::get('/prestasi', [PrestasiController::class, 'showPrestasi'])->name('prestasi');
Route::get('/prestasi/pencarian', [PrestasiController::class, 'searchPrestasi'])->name('prestasi.search');
Route::get('/prestasi/detail/{id}', [PrestasiController::class, 'DetailPrestasi'])->name('prestasi.detail');

// Route Ekstrakurikuler
Route::get('/ekstrakurikuler', [EkskulController::class, 'showEkskul'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/detail/{id}', [EkskulController::class, 'DetailEkskul'])->name('ekstrakurikuler.detail');

// Route Galeri
Route::get('/Galeri', [GaleriController::class, 'showGaleri'])->name('galeri');

// Route program unggulan
Route::get('/program-unggulan', [ProgramController::class, 'showProgram'])->name('programunggulan');
Route::get('/program-unggulan/detail/{id}', [ProgramController::class, 'DetailProgram'])->name('programunggulan.detail');

// Route Kontak
Route::get('/kontak', [KontakController::class, 'showkontak'])->name('kontak');

// Route Kurikulum
Route::get('/kurikulum', [KurikulumController::class, 'showKurikulum'])->name('kurikulum');

// Route ppdb
Route::get('/informasi-ppdb', [PpdbController::class, 'show_informasiPPDB'])->name('ppdb.informasi');
Route::get('/form-ppdb', [ppdbController::class, 'formPPDB'])->name('ppdb.form');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/download/{no_pendaftaran}', [PpdbController::class, 'downloadBukti'])->name('ppdb.download');
Route::get('/cek-status', [PpdbController::class, 'cekStatusForm'])->name('ppdb.cek.form');
Route::post('/cek-status', [PpdbController::class, 'cekStatusSubmit'])->name('ppdb.cek.submit');

// Route Testimoni
Route::get('/testimoni', [TestimoniController::class, 'showTestimoni'])->name('testimoni');
Route::get('/testimoni/pencarian', [TestimoniController::class, 'searchTestimoni'])->name('testimoni.search');
Route::get('/testimoni/detail/{id}', [TestimoniController::class, 'DetailTestimoni'])->name('testimoni.detail');

// Route Medsos
Route::get('/medsos', [MedsosController::class, 'showMedsos'])->name('medsos');
