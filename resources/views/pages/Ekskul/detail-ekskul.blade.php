@extends('layouts.app')

@section('title', $ekskul->judul . ' - Ekstrakulikuler')

@push('styles')
<link href="{{ asset('CSS/ekskul.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="{{$ekskul->judul}}"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Ekstrakulikuler', 'url' => route('ekstrakurikuler')],
        ['label' => $ekskul->judul, 'url' => '#']
    ]" />

<div class="container py-5">
    <!-- Gambar -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $ekskul->gambar) }}" class="img-fluid w-100 hero-image shadow" alt="IPM Image">
            </div>
        </div>
    </div>

    <!-- Konten Deskripsi -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="content-paragraph">
                {!!$ekskul->isi !!}
            </div>
        </div>
    </div>

    <!-- foto tambahan -->
    <div class="row justify-content-center mb-5">
        @if($ekskul->gambar_tambahan)
        <div class="col-lg-4 text-center mt-3">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $ekskul->gambar_tambahan) }}" class="img-fluid hero-image  w-100" alt="Gambar Tambahan">
            </div>
        </div>
        @endif
        @if($ekskul->gambar_cadangan)
        <div class="col-lg-4 text-center mt-3">
            <div class="card media-card shadow rounded-4">
                <img src="{{ asset('storage/' . $ekskul->gambar_cadangan) }}" class="img-fluid hero-image w-100" alt="Gambar Tambahan">
            </div>
        </div>
        @endif
    </div>

    <!-- Tombol Kembali -->
    <!-- <div class="text-center mt-5">
        <a href="{{ route('ekstrakurikuler') }}" class="btn btn-outline-primary rounded-pill btn-back px-4 py-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div> -->
</div>
@endsection