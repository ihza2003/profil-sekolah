@extends('layouts.app')
@section('title', 'Formulir PPDB')

@push('styles')
<link href="{{ asset('CSS/ppdb.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container py-5">
    <div class="card card_pendaftaran shadow" data-aos="fade-up">
        <div class="card-header text-center bg-primary text-white fw-bold fs-4">
            Formulir Pendaftaran Peserta Didik Baru
        </div>
        <div class="card-body bg-light">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <a href="{{ route('ppdb.download', ['no_pendaftaran' => session('no_pendaftaran')]) }}" target="_blank" class="btn btn-sm btn-primary mt-2">
                Download Bukti Pendaftaran (PDF)
            </a>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->getMessages() as $key => $messages)
                    <div>
                        <strong>{{ $key }}:</strong>
                        <ul>
                            @foreach ($messages as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </ul>
            </div>
            @endif -->

            <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-ppdb.section-data-diri />
                <x-ppdb.section-periodik />
                <x-ppdb.section-orangtua />
                <x-ppdb.section-nilai />
                <x-ppdb.section-upload />

                <div class="keterangan fst-italic">
                    <p> <span class="text-danger ">*</span> Wajib disi</p>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-success px-5 py-2">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection