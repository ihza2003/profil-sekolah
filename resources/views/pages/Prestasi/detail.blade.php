@extends('layouts.app')

@section('title', $prestasi->judul . ' - Prestasi')

@push('styles')
<link href="{{ asset('CSS/prestasi.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="{{$prestasi->judul}}"
    image="{{ asset('IMG/Hero-prestasi.jpg')}}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Prestasi', 'url' => route('prestasi')],
        ['label' => $prestasi->judul, 'url' => '#']
    ]" />

<div class="container py-5">
    <!-- Judul -->
    <div class="text-center mb-4">
        <h1 class="section-title">{{ $prestasi->judul }}</h1>
        <p class="meta-info">
            <i class="bi bi-calendar-event"></i>
            {{ \Carbon\Carbon::parse($prestasi->created_at)->translatedFormat('d F Y') }}
            | <i class="bi bi-person-circle"></i> Admin
        </p>
    </div>

    <!-- Gambar -->
    <!-- <div class="row justify-content-center mb-5">
        <div class="col-md-10 col-lg-8 text-center " style="overflow: hidden;">
            <img src="{{ asset('storage/' . $prestasi->gambar) }}" class="img-fluid hero-image shadow rounded" alt="prestasi Image">
        </div>
    </div> -->

    <!-- Gambar Utama -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $prestasi->gambar) }}"
                    class="img-fluid w-100 hero-image"
                    alt="Image-prestasi">
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <div class="content-paragraph">
                {!! $prestasi->isi !!}
            </div>

            <!-- Tombol Share -->
            <div class="d-flex align-items-center gap-2 mt-4 share-buttons">
                <span class="fw-semibold me-2">Bagikan:</span>

                <!-- WhatsApp -->
                <a href="https://wa.me/?text={{ urlencode($prestasi->judul . ' ' . route('prestasi.detail', $prestasi->id)) }}"
                    target="_blank" class="btn btn-success btn-sm">
                    <i class="bi bi-whatsapp"></i>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('prestasi.detail', $prestasi->id)) }}"
                    target="_blank" class="btn btn-primary btn-sm">
                    <i class="bi bi-facebook"></i>
                </a>

                <!-- Twitter / X -->
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('prestasi.detail', $prestasi->id)) }}&text={{ urlencode($prestasi->judul) }}"
                    target="_blank" class="btn btn-dark btn-sm">
                    <i class="bi bi-twitter-x"></i>
                </a>

                <!-- Copy Link -->
                <a href="javascript:void(0);" onclick="navigator.clipboard.writeText('{{ route('prestasi.detail', $prestasi->id) }}'); alert('Link disalin!');"
                    class="btn btn-secondary btn-sm">
                    <i class="bi bi-link-45deg"></i>
                </a>
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
        <a href="{{ route('prestasi') }}" class="btn btn-outline-primary rounded-pill btn-back px-4 py-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div> -->
</div>
@endsection