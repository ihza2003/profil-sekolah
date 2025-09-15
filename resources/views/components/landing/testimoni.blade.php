<section class="testimoni mb-5" data-aos="fade-up">
    @if($testimoni->isNotEmpty())
    <div class="container mt-5">
        <div class="jdl row justify-content-between mb-2">
            <div class="col-md-6 text-start">
                <h4 class="fw-bolder">Cerita <span style="color:green;">Kami</span></h4>
            </div>
            <div class="col-md-6 text-end selengkap">
                <a href="{{ route('testimoni') }}" class="ket-berita text-decoration-none fw-bolder" style="color: #002855;">
                    <span>Selengkapnya</span>
                    <span class="border rounded">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($testimoni as $t)
                <div class="swiper-slide">
                    <a href="{{ route('testimoni.detail', ['id' => $t->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark">
                        <div class="card shadow border-0" style="max-width: 100%; max-height: 400px;">
                            <div class="card-body">
                                <p class="card-text text-justify fs-6 text-secondary" style="font-size: 0.95rem;">
                                    "{{ \Illuminate\Support\Str::limit(strip_tags($t->isi), 180, '...') }}"
                                </p>
                                <div class="from-alumni d-flex align-items-center mt-3 justify-content-between">
                                    <div class="alumni d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $t->foto) }}" class="rounded-circle me-2 border shadow-sm" width="50" height="50" alt="foto testimoni">
                                        <div class="ket-alumni">
                                            <h6 class="mb-0 fw-bold">{{ $t->nama }}</h6>
                                            <small class="text-primary d-block">{{ $t->status }}</small>
                                            <small class="text-muted">{{ $t->posisi }}</small>
                                        </div>
                                    </div>
                                    <i class="bi bi-quote fs-3 text-secondary opacity-50"></i>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <!-- Optional navigation -->
            <div class="pagination-swiper mt-5">
                <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> -->
                <div class="swiper-pagination "></div>
            </div>

        </div>
    </div>
    @endif
</section>