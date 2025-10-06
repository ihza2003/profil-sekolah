@extends('layouts.app')

@section('title', 'Ekstrakulikuler')

@push('styles')
<link href="{{ asset('CSS/ekskul.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-Hero-Header
    title="Organisasi & Ekskul"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Organisasi & Ekskul', 'url' => route('akademik.ekstrakurikuler')]
    ]" />

<x-Ekskul.Konten-Ekskul :ekskul="$ekskul" />

@endsection