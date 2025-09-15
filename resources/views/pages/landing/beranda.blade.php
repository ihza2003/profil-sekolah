@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<link href="{{ asset('CSS/beranda.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-landing.Hero-landing />
<x-landing.sambutan :sambutan='$sambutan' />
<x-landing.statistik :statistik='$statistik' />
<x-landing.berita_beranda :beritaTerbaru='$beritaTerbaru' />
<x-landing.tentang_kami />
<x-landing.testimoni :testimoni='$testimoni' />

@endsection