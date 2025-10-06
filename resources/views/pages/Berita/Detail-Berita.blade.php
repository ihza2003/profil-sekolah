@extends('layouts.app')

@section('title', $berita->judul . ' - Berita')

@push('styles')
<link href="{{ asset('CSS/berita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="{{$berita->judul}}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Berita', 'url' => route('informasi.berita')],
        ['label' => $berita->judul, 'url' => '#']
    ]" />

<section class="container py-5">
    <!-- Gambar Utama -->
    <div class="row justify-content-center mb-4">
        <div class=" col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                    class="img-fluid w-100 hero-image "
                    alt="Image">
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

                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . route('informasi.berita.detail', $berita->id)) }}"
                        target="_blank" class="btn btn-success btn-sm">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('informasi.berita.detail', $berita->id)) }}"
                        target="_blank" class="btn btn-primary btn-sm">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('informasi.berita.detail', $berita->id)) }}&text={{ urlencode($berita->judul) }}"
                        target="_blank" class="btn btn-dark btn-sm">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="javascript:void(0);"
                        onclick="navigator.clipboard.writeText('{{ route('informasi.berita.detail', $berita->id) }}'); alert('Link disalin!');"
                        class="btn btn-secondary btn-sm">
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>

                <!-- Tanggal Post -->
                <div class="meta-info text-muted small">
                    <i class="bi bi-clock"></i>
                    @if($berita->created_at >= now()->subDays(1))
                    {{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}
                    @else
                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="row justify-content-center ">
        <div class="col-lg-8">
            <div class="content-paragraph">
                {!! $berita->isi !!}
            </div>
        </div>
    </div>

    <!-- Foto tambahan -->
    @if($berita->gambar_tambahan)
    <div class="row justify-content-center g-4 mb-2 mt-4">
        <div class="col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $berita->gambar_tambahan) }}"
                    class="img-fluid hero-image w-100"
                    alt="Gambar Tambahan">
            </div>
        </div>
    </div>
    @endif
</section>
@endsection