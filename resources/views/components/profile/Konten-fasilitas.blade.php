<section class="container my-5 ">
    <div class="row g-5 text-center justify-content-center mb-4" data-aos="fade-up">
        @foreach ($fasilitas as $f)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card_count position-relative shadow-sm border-0 rounded-4 h-100 overflow-hidden py-3">
                <div class="card-body">
                    <div class="position-absolute bottom-4 end-0" style="font-size: 5rem;">
                        <i class="bi bi-buildings text-secondary opacity-50"></i>
                    </div>
                    <h6 class="fw-bold text-uppercase">{{ $f->judul }}</h6>
                    <p class="fs-3 fw-bolder text-success mb-0">{{ $f->kuantitas }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row text-start g-5 justify-content-center" data-aos="fade-down">
        @forelse ($fasilitas as $f)
        <div class="col-lg-3 col-md-4 col-sm-12 justify-content-center d-flex ">
            <div class="card card_fasilitas rounded-4 shadow position-relative">
                <a href="{{ asset('storage/' . $f->gambar) }}" data-lightbox="fasilitas" data-title="{{ $f->judul }}">
                    <img src="{{ asset('storage/' . $f->gambar) }}" class="img-fluid h-100" alt="{{ $f->judul }}">
                    <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-card-image fs-3"></i>
                        <h5 class="fs-6 my-2 fw-bolder text-uppercase text-center">{{ $f->judul }}</h5>
                    </div>
                </a>
            </div>
        </div>
        @empty
        <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            <h5 class="text-muted my-3">Belum ada Konten yang ditampilkan</h5>
        </div>
        @endforelse
    </div>
    <!-- Pagination -->
    <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $fasilitas->links('pagination::bootstrap-5') }}
    </div>

</section>