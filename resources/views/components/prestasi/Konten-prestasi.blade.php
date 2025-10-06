<section class="container mb-5">
    <div class="row text-start g-5 justify-content-center">
        @forelse ($prestasi as $p)
        <div class="col-lg-4 col-md-6 justify-content-center d-flex mb-4">
            <a href="{{ route('informasi.prestasi.detail', ['id' => $p->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark">
                <div class="card card_prestasi shadow rounded-4">
                    <div class="gambar_prestasi position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $p->gambar) }}" class="kartu card-img-top img-fluid" alt="{{ $p->judul }}">
                        <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-trophy fs-3"></i>
                            <h5 class="fs-6 my-2 fw-bolder text-uppercase">Lihat Prestasi</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold fs-6">{{ $p->judul }}</h5>
                        <p class="card-text small">
                            {{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 110, '...') }}
                        </p>
                        <div class="tgl_post d-flex justify-content-end align-items-center">
                            <i class="bi bi-clock"></i>
                            <span class="tgl text-muted ms-2" style="font-size: 12px;">
                                @if($p->created_at >= now()->subDays(1))
                                {{ \Carbon\Carbon::parse($p->created_at)->diffForHumans() }}
                                @else
                                {{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y') }}
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
            <i class="bi bi-search"></i> Tidak ada prestasi ditemukan untuk pencarian: <strong>{{ request('search') }}</strong>
        </div>
        @else
        <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            <h5 class="text-muted my-3">Belum ada Prestasi yang Ditampilkan</h5>
        </div>
        @endif
        @endforelse
    </div>
    <!-- Pagination -->
    <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $prestasi->links('pagination::bootstrap-5') }}
    </div>
</section>