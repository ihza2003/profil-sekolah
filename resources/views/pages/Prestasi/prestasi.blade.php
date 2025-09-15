@extends('layouts.app')
@section('title', 'Prestasi')

@push('styles')
<link href="{{ asset('CSS/prestasi.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Prestasi Kami"
    image="{{ asset('IMG/Hero-prestasi.jpg')}}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Prestasi', 'url' => route('prestasi')]
    ]" />
<x-Search-ui route="{{ route('prestasi.search') }}" />
<x-prestasi.Konten-prestasi :prestasi="$prestasi" />
@endsection