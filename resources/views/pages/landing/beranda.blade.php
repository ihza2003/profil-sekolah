@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<link href="{{ asset('CSS/beranda.css') }}" rel="stylesheet">
@endpush


@section('content')

<x-landing.Hero-landing />
<x-landing.Sambutan :sambutan='$sambutan' />
<x-landing.Statistik :statistik='$statistik' />
<x-landing.Berita_beranda :beritaTerbaru='$beritaTerbaru' />
<x-landing.Tentang_kami />
<x-landing.Testimoni :testimoni='$testimoni' />

@endsection