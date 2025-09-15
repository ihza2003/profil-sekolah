@props(['title', 'image', 'breadcrumb' => []])
<section class="hero-header position-relative text-white" style="background-image: url('{{ $image }}');">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="container position-relative z-2 text-center">
        <h2 class=" fw-bold mb-2 text-hero text-uppercase" data-aos="fade-up">{{$title}}</h2>
        <div style="width: 150px; height: 5px; background-color: #ffffff; margin: 0 auto 0 auto;"></div>

        {{-- Breadcrumb --}}
        @if(!empty($breadcrumb))
        <x-breadcrumb :items="$breadcrumb" />
        @endif
    </div>
</section>