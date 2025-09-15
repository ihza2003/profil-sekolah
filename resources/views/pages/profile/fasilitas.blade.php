@extends('layouts.app')
@section('title', 'Fasilitas')

@push('styles')
<link href="{{ asset('CSS/profil.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Fasilitas"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Fasilitas', 'url' => route('profile.fasilitas')]
    ]" />
<x-profile.Konten-fasilitas :fasilitas="$fasilitas" />

@endsection