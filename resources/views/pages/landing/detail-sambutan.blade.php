@extends('layouts.app')
@section('title', 'Detail Sambutan')

@push('styles')
<link href="{{ asset('CSS/beranda.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Sambutan Kepala Madrasah"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Sambutan Kepala Madrasah', 'url' => '#']
    ]" />
<div class="container py-5">
    <div class="sambutan-card row g-0">
        <!-- Foto Kepala Sekolah -->
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $sambutan->foto_kepala_sekolah) }}" alt="Kepala Madrasah" class="w-100 h-100">
        </div>

        <!-- Isi Sambutan -->
        <div class="col-md-8">
            <div class="sambutan-body">
                <span class="badge badge-role mb-3">Sambutan Kepala Madrasah</span>
                <h2>MTS Muhammadiyah Jayapura</h2>
                <h5 class="mb-4 text-muted">{{$sambutan->nama_kepala_sekolah }}</h5>

                <p>Assalamu’alaikum warahmatullahi wabarakatuh</p>

                <p class="isi-sambutan">
                    Segala puji hanya bagi Allah SWT, shalawat dan salam semoga tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh pengikutnya.

                </p>
                <div class="isi-sambutan"> {!!$sambutan->isi_sambutan!!}</div>

                <p>
                    Wassalamu’alaikum warahmatullahi wabarakatuh
                </p>
            </div>
        </div>
    </div>
</div>
@endsection