@extends('layouts.app')
@section('title', 'Guru Kami')

@push('styles')
<link href="{{ asset('CSS/profil.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Guru Kami"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Guru Kami', 'url' => route('profile.guru')]
    ]" />
<x-Search-ui route="{{ route('profile.guru.search') }}" />
<x-profile.Konten-guru :guru="$guru" />

@endsection