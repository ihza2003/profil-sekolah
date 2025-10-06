@extends('layouts.app')
@section('title', 'Testimoni')

@push('styles')
<link href="{{ asset('CSS/cerita.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Testimoni"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Testimoni', 'url' => route('beranda.testimoni')]
    ]" />
<x-Search-ui route="{{ route('beranda.testimoni.search') }}" />
<x-testimoni.Konten-testimoni :testimoni="$testimoni" />
@endsection