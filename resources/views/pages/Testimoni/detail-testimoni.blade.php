@extends('layouts.app')

@section('title', $testimoni->nama . ' - Testimoni')

@push('styles')
<link href="{{ asset('CSS/cerita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="{{$testimoni->nama}}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Testimoni', 'url' => route('beranda.testimoni')],
        ['label' => $testimoni->nama, 'url' => '#']
    ]" />

<div class="container detail-section">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card detail-card rounded-4">
                <div class="row g-0">
                    <!-- Foto Alumni -->
                    <div class="col-md-4">
                        <div class="media-card rounded-4 h-100">
                            <img src="{{ asset('storage/'.$testimoni->foto) }}"
                                alt="{{ $testimoni->nama }}"
                                class="detail-image">
                        </div>
                    </div>
                    <!-- Isi Testimoni -->
                    <div class="col-md-8">
                        <div class="card-body detail-body p-4">
                            <h3>{{ $testimoni->nama }}</h3>
                            <p class="mb-1">{{ $testimoni->posisi }}</p>
                            <span class="status">{{ $testimoni->status }}</span>
                            <div class="text">{!!$testimoni->isi!!}</div>
                            <!-- Jika ada video -->
                            @if($testimoni->video)
                            <div class="mt-4">
                                <video class="w-50 rounded-4 shadow video-testimoni" controls>
                                    <source src="{{ asset('storage/' . $testimoni->video) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutaran video.
                                </video>
                            </div>
                            @endif
                            <div class="d-flex justify-content-end align-items-end">
                                <i class="bi bi-quote fs-3 text-secondary opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center">
                <a href="{{ route('beranda.testimoni') }}" class="btn btn-outline-primary rounded-pill btn-back px-4 py-2">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection