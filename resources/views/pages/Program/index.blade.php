@extends('layouts.app')

@section('title', 'Program Unggulan')

@push('styles')
<link href="{{ asset('CSS/program.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-Hero-Header
    title="Program Unggulan"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('beranda')],
        ['label' => 'Program Unggulan', 'url' => route('akademik.programunggulan')]
    ]" />

<x-program.Konten-program :program="$program" />

@endsection