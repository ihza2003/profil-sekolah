<section class="container my-5 ">
    <div class="row text-start g-5 justify-content-center">
        @forelse ($galeri as $g)
        <div class="col-lg-3 col-md-4 col-sm-12 justify-content-center d-flex ">
            <div class="card card_galeri shadow position-relative">
                <a href="{{ asset('storage/' . $g->gambar) }}" data-lightbox="geleri" data-title="{{ $g->judul }}">
                    <img src="{{ asset('storage/' . $g->gambar) }}" class="img-fluid h-100" alt="{{ $g->judul }}">
                    <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-card-image fs-3"></i>
                        <h5 class="fs-6 my-2 fw-bolder text-uppercase text-center">{{ $g->judul }}</h5>
                    </div>
                </a>
            </div>
        </div>
        @empty
        <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            <h5 class="text-muted my-3">Belum ada Galeri yang ditampilkan</h5>
        </div>
        @endforelse
    </div>
    <!-- Pagination -->
    <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $galeri->links('pagination::bootstrap-5') }}
    </div>

</section>