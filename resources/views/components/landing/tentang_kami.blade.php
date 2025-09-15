<section class="tentang-kami" data-aos="fade-down">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card p-5 shadow">
                    <h3 class="text-center fw-bold">Tentang Kami</h3>
                    <div class="row align-items-center mt-3">
                        <div class="col-md-3 col-sm-12 text-center py-2 ">
                            <img src="{{ asset('IMG/sejarah.png') }}" class="py-2 h-5 w-5" alt="">
                            <a href="{{ route('profile.visi') }}" class=" tentang d-block text-decoration-none fw-bold fs-5 text-muted">Madrasah</a>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center py-2">
                            <!-- <i class="fa-solid fs-1 py-2 fa-place-of-worship"></i> -->
                            <img src="{{ asset('IMG/alumni.png') }}" class="py-2 h-5 w-5" alt="">
                            <a href="{{ route('prestasi') }}" class=" tentang d-block text-decoration-none fw-bold fs-5 text-muted">Prestasi</a>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center py-2">
                            <!-- <img src="{{ asset('IMG/fasilitas.png') }}" class="py-2" alt=""> -->
                            <i class="bi bi-award fs-1 text-secondary"></i>
                            <a href="{{ route('profile.akreditasi') }}" class=" tentang d-block text-decoration-none fw-bold fs-5 text-muted">Akreditasi</a>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center py-2">
                            <img src="{{ asset('IMG/prestasi.png') }}" class="py-2" alt="">
                            <a href="{{ route('ekstrakurikuler') }}" class=" tentang d-block text-decoration-none fw-bold fs-5 text-muted">Ekstrakulikuler</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>