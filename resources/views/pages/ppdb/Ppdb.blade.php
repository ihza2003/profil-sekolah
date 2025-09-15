@extends('layouts.app')
@section('title', 'PPDB')

@push('styles')
<link href="{{ asset('CSS/ppdb.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="ppdb-header">
    <h2 class="fw-bold">Penerimaan Peserta Didik Baru (PPDB)</h2>
    @if ($informasi_ppdb && $informasi_ppdb->status_aktif)
    <h3 class="fw-light">Tahun Ajaran {{ $informasi_ppdb->tahun }}</h3>
    @endif
    <p class="lead">Bergabunglah bersama keluarga besar sekolah kami!</p>
</div>

<div class="container ppdb-section">
    @if ($informasi_ppdb && $informasi_ppdb->status_aktif)
    <div class="row g-4">
        <div class="col-md-12">
            <img src="{{ asset('storage/' . $informasi_ppdb->banner_ppdb) }}" alt="brosur ppdb" class="img-fluid banner-ppdb shadow mb-4 w-100 rounded-4" data-aos="fade-up">
        </div>

        <div class="col-md-6">
            <div class="ppdb-info-box shadow-sm" data-aos="fade-up">
                <h4 class="fw-bold mb-3">Syarat Pendaftaran</h4>
                <ol class="ps-3">
                    @foreach ($informasi_ppdb->syarat_pendaftaran as $syarat)
                    <li>{{ $syarat }}</li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="col-md-6">
            <div class="ppdb-info-box shadow-sm" data-aos="fade-up">
                <h4 class="fw-bold mb-3">Jadwal Pendaftaran</h4>
                <ul class="list-unstyled">
                    <li>
                        📅 Pendaftaran:
                        {{ (\Carbon\Carbon::parse($informasi_ppdb->tanggal_mulai))->translatedFormat("d F Y") }}
                        –
                        {{ (\Carbon\Carbon::parse($informasi_ppdb->tanggal_selesai))->translatedFormat("d F Y") }}
                    </li>

                    @if($informasi_ppdb->tanggal_pengumuman)
                    <li>
                        📢 Pengumuman:
                        {{ (\Carbon\Carbon::parse($informasi_ppdb->tanggal_pengumuman))->translatedFormat("d F Y") }}
                    </li>
                    @endif

                    @if($informasi_ppdb->tanggal_daftar_ulang_mulai && $informasi_ppdb->tanggal_daftar_ulang_selesai)
                    <li>
                        📌 Daftar Ulang:
                        {{ (\Carbon\Carbon::parse($informasi_ppdb->tanggal_daftar_ulang_mulai))->translatedFormat("d F Y") }}
                        –
                        {{ (\Carbon\Carbon::parse($informasi_ppdb->tanggal_daftar_ulang_selesai))->translatedFormat("d F Y") }}
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ppdb-info-box shadow-sm" data-aos="fade-up">
                <h4 class="fw-bold mb-3">Prosedur Pendaftaran</h4>
                <ol class="ps-3">
                    @foreach ($informasi_ppdb->prosedur_pendaftaran as $prosedur)
                    <li>{{ $prosedur }}</li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ppdb-info-box shadow-sm text-center" data-aos="fade-up">
                <h4 class="fw-bold mb-3">Informasi Kontak</h4>
                <p>Jika mengalami kendala, silakan hubungi kami atau datang langsung ke sekolah</p>
                <a href="https://wa.me/{{ $informasi_ppdb->kontak_wa }}" target="_blank" class="btn cta-btn-wa mt-3 px-4 py-2">
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ppdb-info-box shadow-sm text-center py-5" data-aos="fade-up">
                <h4 class="fw-bold mb-3 text-primary">Ayo Daftar Sekarang!</h4>
                <p class="mb-4">Jangan lewatkan kesempatan bergabung dengan sekolah kami. Segera isi formulir pendaftaran atau cek status pendaftaranmu.</p>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('ppdb.form') }}" class="btn btn-outline-success px-4 py-2">
                        📄 Isi Formulir Pendaftaran
                    </a>
                    <a href="{{ route('ppdb.cek.form') }}" class="btn btn-outline-primary px-4 py-2">
                        🔍 Cek Status Pendaftaran
                    </a>
                </div>
            </div>
        </div>

    </div>
    @else
    <div class="alert alert-warning text-center mt-5 rounded-4" role="alert" data-aos="fade-up">
        <h4 class="fw-bold">Belum Ada Jadwal PPDB</h4>
        <p>Silakan cek kembali nanti atau bisa hubungi kontak kami</p>
    </div>
    @endif
</div>
@endsection