@extends('layouts.app')
@section('title', 'Berita')

@push('styles')
<link href="{{ asset('CSS/berita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Berita"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Berita', 'url' => route('informasi.berita')]
    ]" />
<x-Search-ui route="{{ route('informasi.berita.search') }}" />
<x-berita.Konten-berita :berita="$berita" />

@endsection