<section class="baris1 mt-5 mb-5" data-aos="fade-up">
    @if($beritaTerbaru->isNotEmpty())
    <div class="container">
        <div class="jdl row justify-content-between mb-2">
            <div class="col-md-6 text-start">
                <h4 class="fw-bolder" style="color: #003366;">Berita <span>Terbaru</span></h4>
            </div>
            <div class="col-md-6 text-end selengkap">
                <a href="{{ route('informasi.berita') }}" class="ket-berita text-decoration-none fw-bolder" style="color: #002855;">
                    <span>Selengkapnya</span>
                    <span class="border rounded">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="row text-start justify-content-center g-5">
            @foreach ($beritaTerbaru as $b)
            <div class="col-lg-4 col-md-6 justify-content-center d-flex mb-4">
                <a href="{{ route('informasi.berita.detail', ['id' => $b->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark">
                    <div class="card card-content shadow">
                        <div class="gambar_berita position-relative overflow-hidden">
                            <img src="{{ asset('storage/' . $b->gambar) }}" class="kartu card-img-top img-fluid" alt="{{ $b->judul }}">
                            <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-file-text fs-3"></i>
                                <h5 class="fs-6 my-2 fw-bolder text-uppercase">lihat berita</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold fs-6">{{ $b->judul }}</h5>
                            <p class="card-text ">
                                {{ \Illuminate\Support\Str::limit(strip_tags($b->isi), 100, '...') }}
                            </p>
                            <div class="tgl_post d-flex justify-content-end align-items-center">
                                <i class="bi bi-clock"></i>
                                <span class="tgl text-muted ms-2" style="font-size: 12px;">
                                    @if($b->created_at >= now()->subDays(1))
                                    {{ \Carbon\Carbon::parse($b->created_at)->diffForHumans() }}
                                    @else
                                    {{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('d F Y') }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>
