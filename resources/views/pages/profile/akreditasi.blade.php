@extends('layouts.app')
@section('title', 'Sertifikat Akreditasi')

@push('styles')
<link href="{{ asset('CSS/profil.css') }}" rel="stylesheet">
@endpush

@section('content')

<x-Hero-Header
    title="Sertifikat Akreditasi"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Sertifikat Akreditasi', 'url' => route('profile.akreditasi')]
    ]" />
<x-profile.Konten-Akreditasi :akreditasi="$akreditasi" />
@endsection