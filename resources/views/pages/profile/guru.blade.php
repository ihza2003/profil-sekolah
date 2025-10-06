@extends('layouts.app')
@section('title', 'Tenaga Pendidik')

@push('styles')
<link href="{{ asset('CSS/profil.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Tenaga Pendidik"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Tenaga Pendidik', 'url' => route('profile.guru')]
    ]" />
<x-Search-ui route="{{ route('guru.search') }}" />
<x-profile.Konten-guru :gurus="$gurus" />

@endsection