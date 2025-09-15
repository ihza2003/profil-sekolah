@php
$file = $getRecord()->{$field};
$url = $file ? Storage::disk('public')->url($file) : null;
@endphp

<style>
    .button-group {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .button-group a {
        font-weight: 500;
        font-size: 0.875rem;
        line-height: 1.25rem;
        text-decoration: none;
    }

    .preview {
        color: #003366;
        display: flex;
        align-items: center;
        gap: 0.2rem;
    }

    .preview:hover {
        text-decoration: underline;
    }

    .download {
        color: #008000;
        display: flex;
        align-items: center;
        gap: 0.2rem;
    }

    .download:hover {
        text-decoration: underline;
    }
</style>

@if ($file)
<div class="button-group">
    {{-- Preview (buka tab baru) --}}
    <a href="{{ $url }}" target="_blank"
        class="preview">
        <x-heroicon-o-eye class="w-5 h-5" />
        <span>Lihat</span>
    </a>

    {{-- Download langsung --}}
    <a href="{{ $url }}" download
        class="download">
        <x-heroicon-o-arrow-down-tray class="w-5 h-5" />
        <span>Download</span>
    </a>
</div>
@else
<span class="text-secondary italic">Belum diunggah</span>
@endif