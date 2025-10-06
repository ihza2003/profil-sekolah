@extends('layouts.app')
@section('title', 'Hasil cek Status')

@push('styles')
<link href="{{ asset('CSS/ppdb.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-success text-white text-center">
            <h4 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Hasil Cek Status Pendaftaran</h4>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <h5 class="fw-bold">No. Pendaftaran: {{ $data->no_pendaftaran }}</h5>
                <p class="mb-1">Nama Lengkap: <strong>{{ $data->nama }}</strong></p>
                <p>NIK: <strong>{{ $data->nik }}</strong></p>
            </div>

            <div class="row g-3 text-center">
                @if($data->status_verifikasi == 'diterima' && $data->status_kelulusan == 'lulus')
                <h5 class="text-success mb-2"><i class="bi bi-award-fill me-2"></i>Selamat! Anda Diterima</h5>
                <p class="mb-3">Silakan Hubungi pihak sekolah untuk melanjutkan ke tahap daftar ulang.</p>
                @elseif($data->status_verifikasi == 'ditolak')
                <h5 class="text-danger mb-2"><i class="bi bi-x-octagon-fill me-2"></i>Maaf, Pendaftaran Anda Ditolak</h5>
                <p class="mb-3">Silakan hubungi pihak sekolah untuk informasi lebih lanjut.</p>
                @endif
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="alert alert-{{ $data->status_verifikasi == 'diterima' ? 'success' : 
                         ($data->status_verifikasi == 'ditolak' ? 'danger' : 
                        ($data->status_verifikasi == 'proses_verifikasi' ? 'warning' : 'secondary'))}} mb-0">
                        <strong>
                            <i class="
                            {{ $data->status_verifikasi == 'diterima' ? 'bi bi-check-circle-fill' : 
                            ($data->status_verifikasi == 'ditolak' ? 'bi bi-x-circle-fill' : 
                            ($data->status_verifikasi == 'proses_verifikasi' ? 'bi bi-hourglass-split' : 'bi bi-info-circle-fill'))}} me-1"></i>
                            Status Verifikasi:
                        </strong>
                        {{ ucwords(str_replace('_', ' ', $data->status_verifikasi ?? 'Belum Diverifikasi')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="alert alert-{{ 
                        $data->status_kelulusan == 'lulus' ? 'success' : 
                        ($data->status_kelulusan == 'tidak_lulus' ? 'danger' : 
                        ($data->status_kelulusan == 'proses_seleksi' ? 'warning' : 'secondary'))}} mb-0">
                        <strong>
                            <i class="
                            {{ $data->status_kelulusan == 'lulus' ? 'bi bi-check-circle-fill' : 
                            ($data->status_kelulusan == 'tidak_lulus' ? 'bi bi-x-circle-fill' : 
                            ($data->status_kelulusan == 'proses_seleksi' ? 'bi bi-hourglass-split' : 'bi bi-info-circle-fill'))}} me-1"></i>
                            Status Kelulusan:
                        </strong>
                        {{ ucwords(str_replace('_', ' ', $data->status_kelulusan ?? 'Belum Diseleksi')) }}
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3"><i class="bi bi-person-badge me-1"></i>Data Calon Siswa</h6>
                    <p><strong>Email:</strong> {{ $data->email }}</p>
                    <p><strong>Tempat, Tgl Lahir:</strong> {{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ ucfirst($data->jenis_kelamin) }}</p>
                    <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                    <p><strong>No HP:</strong> {{ $data->hp_siswa }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3"><i class="bi bi-building me-1"></i>Asal Sekolah</h6>
                    <p><strong>Nama Sekolah:</strong> {{ $data->asal_sekolah }}</p>
                    <p><strong>Alamat:</strong> {{ $data->alamat_asal_sekolah }}</p>
                    <p><strong>Tahun Lulus:</strong> {{ $data->tahun_kelulusan }}</p>
                    <p><strong>Nilai Ujian Sekolah:</strong> {{ $data->nilai_ujian_sekolah }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection