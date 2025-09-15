@extends('layouts.app')

@section('title', 'Ekstrakulikuler')

@push('styles')
<link href="{{ asset('CSS/ekskul.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-Hero-Header
    title="Organisasi & Ekskul"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Ekstrakulikuler', 'url' => route('ekstrakurikuler')]
    ]" />

<x-Ekskul.Konten-Ekskul :ekskul="$ekskul" />

@endsection