@extends('layouts.app')
@section('title', 'Hasil cek Status')

@push('styles')
<link href="{{ asset('CSS/ppdb.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white text-center">
            <h4>Hasil Cek Status Pendaftaran</h4>
        </div>
        <div class="card-body">
            <div class="mb-4 text-center">
                <h5 class="fw-bold">No. Pendaftaran: {{ $data->no_pendaftaran }}</h5>
                <p class="mb-1">Nama Lengkap: <strong>{{ $data->nama }}</strong></p>
                <p>NIK: <strong>{{ $data->nik }}</strong></p>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="alert alert-{{ 
                                 $data->status_verifikasi == 'diterima' ? 'success' : 
                                 ($data->status_verifikasi == 'ditolak' ? 'danger' : 
                                ($data->status_verifikasi == 'proses_verifikasi' ? 'warning' : 'secondary'))}}">
                        <strong>Status Verifikasi:</strong>
                        {{ ucwords(str_replace('_', ' ', $data->status_verifikasi ?? 'Belum Diverifikasi')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="alert alert-{{ 
                                $data->status_kelulusan == 'lulus' ? 'success' : 
                                ($data->status_kelulusan == 'tidak_lulus' ? 'danger' : 
                                ($data->status_kelulusan == 'proses_seleksi' ? 'warning' : 'secondary'))}}">
                        <strong>Status Kelulusan:</strong>
                        {{ ucwords(str_replace('_', ' ', $data->status_kelulusan ?? 'Belum Diseleksi')) }}
                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6 class="fw-bold">Data Calon Siswa</h6>
                    <p><strong>Email:</strong> {{ $data->email }}</p>
                    <p><strong>Tempat, Tgl Lahir:</strong> {{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ ucfirst($data->jenis_kelamin) }}</p>
                    <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                    <p><strong>No HP:</strong> {{ $data->hp_siswa }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold">Asal Sekolah</h6>
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