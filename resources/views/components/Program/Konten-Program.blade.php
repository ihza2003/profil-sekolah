<section class="container mt-5 mb-5 ">
    <div class="row text-start g-5 justify-content-center">
        @forelse ($program as $p)
        <div class="col-lg-4 col-md-6 d-flex justify-content-center">
            <a href="{{route('programunggulan.detail', ['id' => $p->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark ">
                <div class="card card_program shadow position-relative overflow-hidden">
                    <div class="gambar_card position-relative h-60 overflow-hidden">
                        <img src="{{ asset('storage/' . $p->gambar) }}" loading="lazy" class="kartu card-img-top img-fluid" alt="gambar 1">
                        <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-eye-fill fs-2 mb-2"></i>
                            <h5 class="fs-6 my-1 fw-bolder text-uppercase">Lihat Selengkapnya</h5>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-decoration-none fs-6">
                            {{ $p->judul }}
                        </h5>
                        <p class="card-text mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 100, '...') }}</p>
                        <span class="badge rounded-pill text-dark px-3 py-2"
                            style="background: linear-gradient(135deg, #d4f1f9, #a9e5f5);">
                            {{$p->kategori}}
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            <h5 class="text-muted my-3">Belum ada Program yang Ditampilkan</h5>
        </div>
        @endforelse
    </div>
</section>