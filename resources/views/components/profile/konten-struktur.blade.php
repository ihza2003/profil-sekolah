<section class="container konten mt-4 py-3 mb-4">
    @if(is_null($struktur))
    <div class="alert alert-warning mt-5 rounded-4 d-flex align-items-center justify-content-center" role="alert" data-aos="fade-up">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
        <h5 class="text-muted my-3">Belum ada Konten yang ditampilkan</h5>
    </div>
    @else
    <div class="struktur d-flex justify-content-center">
        <a href="{{ asset('storage/' . $struktur->gambar) }}">
            <img src="{{ asset('storage/' . $struktur->gambar) }}" alt="Struktur Organisasi Sekolah"
                class="img-fluid struktur-img shadow rounded-4">
        </a>
    </div>
    @endif
</section>