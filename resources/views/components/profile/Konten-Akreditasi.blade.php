<section class="container konten mt-4 mb-4 py-3">
    <div class="row justify-content-center">
        @if(is_null($akreditasi))
        <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            <h5 class="text-muted my-3">Belum ada Konten yang ditampilkan</h5>
        </div>
        @else
        <div class="col-md-12">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $akreditasi->gambar) }}" alt="Akreditasi Sekolah"
                        class="img-fluid rounded shadow-sm mb-3" style=" object-fit: contain;">
                    <div class="row row-cols-1 row-cols-md-3 g-3 ">
                        <div class="col">
                            <a href="{{ route('profile.download-akreditas') }}" class="btn btn-outline-danger w-100  gap-2">
                                <i class="bi bi-file-earmark-pdf fs-5"></i>
                                <span class="fw-semibold">Download PDF</span>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ asset('storage/' . $akreditasi->gambar) }}" download class="btn btn-outline-primary w-100 gap-2">
                                <i class="bi bi-image fs-5"></i>
                                <span class="fw-semibold">Download Gambar</span>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ asset('storage/' . $akreditasi->gambar) }}" data-lightbox="akreditasi" data-title="Akreditasi Sekolah"
                                class="btn btn-outline-secondary w-100 gap-2">
                                <i class="bi bi-image fs-5"></i>
                                <span class="fw-semibold">Lihat Gambar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>