@extends('layouts.app')
@section('title', 'Kurikulum')

@push('styles')
<link href="{{ asset('CSS/kurikulum.css') }}" rel="stylesheet">
@endpush

@section('content')
<x-Hero-Header
    title="Kurikulum"
    image="{{ asset('IMG/landing2.jpeg') }}"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Kurikulum', 'url' => route('kurikulum')]
    ]" />
<x-kurikulum.Konten-kurikulum :kurikulums="$kurikulums" />
@endsection