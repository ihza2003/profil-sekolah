@extends('layouts.app')
@section('title', 'Struktur Organisasi')

@push('styles')
<link href="{{ asset('CSS/profil.css') }}" rel="stylesheet">
@endpush

@section('content')

<x-Hero-Header
    title="Struktur Organisasi"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Struktur Organisasi', 'url' => route('profile.struktur')]
    ]" />
<x-profile.konten-struktur :struktur="$struktur" />
@endsection