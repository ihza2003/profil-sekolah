<section class="container konten mt-4 py-3 mb-4">
    @if(is_null($struktur))
    <div class="alert alert-warning text-center mt-5" role="alert" data-aos="fade-up">
        <h5 class="text-muted mt-5">Belum ada Konten yang ditampilkan</h5>

    </div>
    @else
    <div class="struktur d-flex justify-content-center" data-aos="fade-down">
        <a href="{{ asset('storage/' . $struktur->gambar) }}">
            <img src="{{ asset('storage/' . $struktur->gambar) }}" alt="Struktur Organisasi Sekolah"
                class="img-fluid struktur-img shadow rounded-4">
        </a>
    </div>
    @endif
</section>