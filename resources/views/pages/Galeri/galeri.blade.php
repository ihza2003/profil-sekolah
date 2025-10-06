@extends('layouts.app')

@section('title', 'Galeri')

@push('styles')
<link href="{{ asset('CSS/geleri.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-Hero-Header
    title="Galeri"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Galeri', 'url' => route('informasi.galeri')]
    ]" />

<x-Galeri.Konten-Galeri :galeri="$galeri" />

@endsection