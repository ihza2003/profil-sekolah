@extends('layouts.app')
@section('title', 'Visi Misi')

@push('styles')
<link href="{{ asset('CSS/profil.css') }}" rel="stylesheet">
@endpush

@section('content')

<x-Hero-Header
    title="Visi & Misi"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Visi & Misi', 'url' => route('profile.visi')]
    ]" />

<x-profile.konten-visi :visi="$visi" />
@endsection