@extends('layouts.app')

@section('title', $prestasi->judul . ' - Prestasi')

@push('styles')
<link href="{{ asset('CSS/prestasi.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="{{$prestasi->judul}}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Prestasi', 'url' => route('informasi.prestasi')],
        ['label' => $prestasi->judul, 'url' => '#']
    ]" />

<div class="container py-5">

    <!-- Gambar Utama -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $prestasi->gambar) }}"
                    class="img-fluid w-100 hero-image"
                    alt="Image-prestasi">
            </div>
        </div>
    </div>

    <!-- Baris: Bagikan + Tanggal -->
    <div class="row justify-content-center mb-3">
        <div class="col-lg-8">
            <div class="info-detail d-flex justify-content-between align-items-center flex-wrap gap-2">
                <!-- Bagikan -->
                <div class="d-flex align-items-center gap-2 share-buttons">
                    <span class="fw-semibold me-2">Bagikan:</span>

                    <a href="https://wa.me/?text={{ urlencode($prestasi->judul . ' ' . route('informasi.prestasi.detail', $prestasi->id)) }}"
                        target="_blank" class="btn btn-success btn-sm">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('informasi.prestasi.detail', $prestasi->id)) }}"
                        target="_blank" class="btn btn-primary btn-sm">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('informasi.prestasi.detail', $prestasi->id)) }}&text={{ urlencode($prestasi->judul) }}"
                        target="_blank" class="btn btn-dark btn-sm">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="javascript:void(0);"
                        onclick="navigator.clipboard.writeText('{{ route('informasi.prestasi.detail', $prestasi->id) }}'); alert('Link disalin!');"
                        class="btn btn-secondary btn-sm">
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>

                <!-- Tanggal Post -->
                <div class="meta-info text-muted small">
                    <i class="bi bi-clock"></i>
                    @if($prestasi->created_at >= now()->subDays(1))
                    {{ \Carbon\Carbon::parse($prestasi->created_at)->diffForHumans() }}
                    @else
                    {{ \Carbon\Carbon::parse($prestasi->created_at)->translatedFormat('d F Y') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <div class="content-paragraph">
                {!! $prestasi->isi !!}
            </div>
        </div>
    </div>

    <!-- Foto tambahan -->
    <div class="row justify-content-center mt-3 g-4 mb-3">
        @if($prestasi->gambar_tambahan)
        <div class="col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $prestasi->gambar_tambahan) }}"
                    class="card-img-top img-fluid hero-image "
                    alt="Gambar Tambahan">
            </div>
        </div>
        @endif
    </div>

    <!-- Tombol Kembali -->
    <!-- <div class="text-center mt-5">
        <a href="{{ route('informasi.prestasi') }}" class="btn btn-outline-primary rounded-pill btn-back px-4 py-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div> -->
</div>
@endsection