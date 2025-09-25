@extends('layouts.app')
@section('title', 'Berita')

@push('styles')
<link href="{{ asset('CSS/berita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Berita"
    image="{{ asset('IMG/header-fitur.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Berita', 'url' => route('berita')]
    ]" />
<x-Search-ui route="{{ route('berita.search') }}" />
<x-berita.Konten-berita :berita="$berita" />

@endsection