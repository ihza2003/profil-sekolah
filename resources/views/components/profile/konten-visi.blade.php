<section class="container konten mt-4 mb-5" data-aos="fade-down">
    @if($visi?->sejarah)
    <div class="sejarah">
        <div class="isi-konten fs-6">{!!$visi->sejarah!!}</div>
    </div>
    @endif

    @if($visi?->visi)
    <div class="visi">
        <h2 class="judul-visi mt-4 fw-bold text-uppercase">visi</h2>
        <div class="garis border-bottom border-primary border-4 my-2"></div>
        <p class="isi-konten fs-6">{{$visi->visi}}</p>
    </div>
    @endif

    @if($visi?->misi)
    <div class="misi">
        <h2 class="mt-4 fw-bold text-uppercase ">misi</h2>
        <div class="garis border-bottom border-primary border-4 my-3"></div>
        <ol class="fs-6 isi-konten">
            @foreach (($visi->misi) as $m)
            <li>{{$m}}</li>
            @endforeach
        </ol>
    </div>
    @endif

    @if($visi?->tujuan)
    <div class="tujuan">
        <h2 class="mt-4 fw-bold text-uppercase">tujuan</h2>
        <div class="garis border-bottom border-primary border-4 my-3"></div>
        <ol class="fs-6 isi-konten">
            @foreach (($visi->tujuan) as $t)
            <li>{{$t}}</li>
            @endforeach
        </ol>
    </div>
    @endif
</section>