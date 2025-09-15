@extends('layouts.app')

@section('title', 'Kontak')

@push('styles')
<link href="{{ asset('CSS/kontak.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Kontak Kami"
    image="{{ asset('IMG/landing2.jpeg') }} "
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Konta Kami', 'url' => route('kontak')]
    ]" />
<div class="kontak-section py-5 bg-light">
    <div class="container">
        <!-- <div class="text-center judul mb-5">
            <h2 class="fw-bold fs-2 single-underline">Hubungi Kami</h2>
        </div> -->
        <div class="row g-4 justify-content-center">
            <!-- Denah Lokasi -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="kontak-card p-4 shadow-sm bg-white h-100 rounded-4">
                    <h3 class="fs-4 fw-bold mb-3 text-primary">Denah Lokasi</h3>
                    @if($profil?->embed_maps)
                    <div class="maps rounded-4 overflow-hidden">
                        {!! $profil->embed_maps !!}
                    </div>
                    <!-- <iframe src="{{ $profil->embed_maps }}"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    @endif
                </div>
            </div>

            <!-- Kontak -->
            <div class="col-lg-6" data-aos="fade-down">
                <div class="kontak-card p-4 shadow-sm bg-white h-100 rounded-4">
                    <h3 class="fs-4 fw-bold mb-4 text-primary">Kontak Kami</h3>
                    @if($profil)
                    <ul class="list-unstyled fs-5 mb-4">
                        @if($profil?->alamat)
                        <li class="mb-3"><i class="bi bi-geo-alt-fill text-danger me-2"></i>{{$profil->alamat}}</li>
                        @endif
                        @if($profil?->telepon)
                        <li class="mb-3"><i class="bi bi-telephone-fill text-success me-2"></i>{{$profil->telepon}}</li>
                        @endif
                        @if($profil?->email)
                        <li>📧 {{$profil->email}}</li>
                        @endif
                    </ul>
                    @endif

                    @if($medsos)
                    <h4 class="fs-5 fw-bold text-primary mt-5">Media Sosial</h4>
                    <div class="d-flex gap-3 mt-3">
                        @if($medsos?->twitter)
                        <a href="{{ $medsos->twitter }}" target="_blank" class="sosmed-icon bg-twitter"><i class="bi bi-twitter"></i></a>
                        @endif
                        @if($medsos?->instagram)
                        <a href="{{$medsos->instagram}}" target="_blank" class="sosmed-icon bg-instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if($medsos?->youtube)
                        <a href="{{$medsos->youtube}}" target="_blank" class="sosmed-icon bg-youtube"><i class="bi bi-youtube"></i></a>
                        @endif
                        @if($medsos?->facebook)
                        <a href="{{ $medsos->facebook }}" target="_blank" class="sosmed-icon bg-facebook"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if($medsos?->tiktok)
                        <a href="{{ $medsos->tiktok }}" target="_blank" class="sosmed-icon bg-tiktok"><i class="bi bi-tiktok"></i></a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection