<section class="container">
    <div class="row text-start g-5 justify-content-center">
        @forelse ($berita as $b)
        <div class="col-lg-4 col-md-6 justify-content-center d-flex mb-4">
            <a href="{{ route('informasi.berita.detail', ['id' => $b->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark">
                <div class="card card_berita shadow">
                    <div class="gambar_berita position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $b->gambar) }}" class="kartu card-img-top img-fluid" alt="{{ $b->judul }}">
                        <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-file-text fs-3"></i>
                            <h5 class="fs-6 my-2 fw-bolder text-uppercase">lihat berita</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold fs-6">{{ $b->judul }}</h5>
                        <p class="card-text">
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
        @empty
        @if (request('search'))
        <div class="text-center text-muted mt-4">
            <i class="bi bi-search"></i> Tidak ada berita ditemukan untuk pencarian: <strong>{{ request('search') }}</strong>
        </div>
        @else
        <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            <h5 class="text-muted my-3">Belum ada Berita yang ditampilkan</h5>
        </div>
        @endif
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 mb-3 d-flex justify-content-center">
        {{ $berita->links('pagination::bootstrap-5') }}
    </div>
</section>