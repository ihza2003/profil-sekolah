@extends('layouts.app')
@section('title', 'pencarian')

@push('styles')
<link href="{{ asset('CSS/berita.css') }}" rel="stylesheet">
<link href="{{ asset('CSS/prestasi.css') }}" rel="stylesheet">
<link href="{{ asset('CSS/cerita.css') }}" rel="stylesheet">
<link href="{{ asset('CSS/ekskul.css') }}" rel="stylesheet">
<link href="{{ asset('CSS/program.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    :title="'Hasil pencarian: ' . $search"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Pencarian', 'url' => route('search.global')],
    ]" />
<x-landing.Search-Global
    :search='$search'
    :berita="$berita"
    :prestasi='$prestasi'
    :testimoni='$testimoni'
    :ekskul="$ekskul"
    :program="$program" />
@endsection