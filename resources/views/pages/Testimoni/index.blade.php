@extends('layouts.app')
@section('title', 'Testimoni')

@push('styles')
<link href="{{ asset('CSS/cerita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Testimoni"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Testimoni', 'url' => route('testimoni')]
    ]" />
<x-Search-ui route="{{ route('testimoni.search') }}" />
<x-testimoni.Konten-testimoni :testimoni="$testimoni" />
@endsection