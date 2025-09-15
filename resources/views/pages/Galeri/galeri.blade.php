@extends('layouts.app')

@section('title', 'Galeri')

@push('styles')
<link href="{{ asset('CSS/geleri.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-Hero-Header
    title="Galeri"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Galeri', 'url' => route('galeri')]
    ]" />

<x-Galeri.Konten-Galeri :galeri="$galeri" />

@endsection