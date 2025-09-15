@extends('layouts.app')

@section('title', $berita->judul . ' - Berita')

@push('styles')
<link href="{{ asset('CSS/berita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="{{$berita->judul}}"
    image="{{ asset('IMG/landing2.jpeg') }} "
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Berita', 'url' => route('berita')],
        ['label' => $berita->judul, 'url' => '#']
    ]" />

<section class="container py-5">
    <!-- Judul & tgl_post -->
    <div class="text-center mb-4">
        <h1 class="section-title">{{ $berita->judul }}</h1>
        <p class="meta-info">
            <i class="bi bi-calendar-event"></i>
            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}

        </p>
    </div>

    <!-- Gambar Utama -->
    <div class="row justify-content-center mb-5">
        <div class=" col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                    class="img-fluid w-100 hero-image "
                    alt="Image">
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

    <!-- media share -->
    <div class="row konten-share justify-content-center">
        <div class="col-lg-8">
            <!-- Tombol Share -->
            <div class="d-flex align-items-center gap-2 mt-3 share-buttons">
                <span class="fw-semibold me-2">Bagikan:</span>

                <!-- WhatsApp -->
                <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . route('berita.detail', $berita->id)) }}"
                    target="_blank" class="btn btn-success btn-sm">
                    <i class="bi bi-whatsapp"></i>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.detail', $berita->id)) }}"
                    target="_blank" class="btn btn-primary btn-sm">
                    <i class="bi bi-facebook"></i>
                </a>

                <!-- Twitter / X -->
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.detail', $berita->id)) }}&text={{ urlencode($berita->judul) }}"
                    target="_blank" class="btn btn-dark btn-sm">
                    <i class="bi bi-twitter-x"></i>
                </a>

                <!-- Copy Link -->
                <a href="javascript:void(0);" onclick="navigator.clipboard.writeText('{{ route('berita.detail', $berita->id) }}'); alert('Link disalin!');"
                    class="btn btn-secondary btn-sm">
                    <i class="bi bi-link-45deg"></i>
                </a>
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
    <!-- Tombol Kembali -->
    <!-- <div class="mt-4 text-center">
        <a href="{{ route('berita', ['page' => request('page')]) }}"
            class="btn btn-outline-primary rounded-pill px-4 py-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div> -->
</section>
@endsection