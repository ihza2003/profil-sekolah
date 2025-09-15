@extends('layouts.app')
@section('title', 'Cek Status pendaftaran')

@push('styles')
<link href="{{ asset('CSS/ppdb.css') }}" rel="stylesheet">


@endpush

@section('content')
<div class="ppdb-header">
    <h2>Pengumuman Hasil Seleksi</h2>
    @if ($informasi_ppdb && $informasi_ppdb->status_aktif)
    <h3>Peserta Didik Baru (PPDB) Tahun Ajaran {{ $informasi_ppdb->tahun }}</h3>
    @endif
</div>

<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-lg ppdb-card rounded-4 col-md-6 col-lg-8">
        <div class="card-header text-white text-center">
            <h4>Cek Status Pendaftaran PPDB</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('ppdb.cek.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="no_pendaftaran" class="form-label fw-semibold">Nomor Pendaftaran</label>
                    <input type="text" name="no_pendaftaran"
                        class="form-control form-control-lg @error('no_pendaftaran') is-invalid @enderror"
                        placeholder="Masukkan nomor pendaftaran Anda">
                    @error('no_pendaftaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-check-status px-4 py-2">
                        <i class="bi bi-search"></i> Cek Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection