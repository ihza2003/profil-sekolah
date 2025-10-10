<section class="container my-5" data-aos="fade-up">
    <!-- Tabs kategori -->
    <ul class="nav nav-tabs justify-content-center border-0 " id="searchTab" role="tablist">
        <li class="nav-item mx-2 my-2">
            <button class="nav-link active modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#berita" type="button">
                <i class="bi bi-newspaper me-1"></i> Berita
            </button>
        </li>
        <li class="nav-item mx-2 my-2">
            <button class="nav-link modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#prestasi" type="button">
                <i class="bi bi-trophy me-1"></i> Prestasi
            </button>
        </li>
        <li class="nav-item mx-2 my-2">
            <button class="nav-link modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#testimoni" type="button">
                <i class="bi bi-chat-dots me-1"></i> Testimoni
            </button>
        </li>
        <li class="nav-item mx-2 my-2">
            <button class="nav-link modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#guru" type="button">
                <i class="bi-mortarboard-fill me-1"></i> Guru
            </button>
        </li>
        <li class="nav-item mx-2 my-2">
            <button class="nav-link modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#galeri" type="button">
                <i class="bi-image me-1"></i> Galeri
            </button>
        </li>

        <li class="nav-item mx-2 my-2">
            <button class="nav-link modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#ekskul" type="button">
                <i class="bi bi-people me-1"></i> Ekstrakurikuler
            </button>
        </li>
        <li class="nav-item mx-2 my-2">
            <button class="nav-link modern-tab rounded-pill" data-bs-toggle="tab" data-bs-target="#program" type="button">
                <i class="bi bi-lightbulb me-1"></i> Program Unggulan
            </button>
        </li>
    </ul>
    <!-- end Tabs kategori  -->


    <div class="tab-content mt-4 px-3">
        <!-- Tab Berita -->
        <div class="tab-pane fade show active" id="berita">
            <div class="row text-start g-5 justify-content-center">
                @forelse ($berita as $b)
                <div class="col-lg-4 col-md-6 d-flex mb-5 justify-content-center">
                    <a href="{{ route('informasi.berita.detail', $b->id) }}" class="text-decoration-none text-dark w-100">
                        <div class="card card_berita shadow">
                            <div class="gambar_berita position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $b->gambar) }}" class="kartu card-img-top img-fluid" alt="{{ $b->judul }}">
                                <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-file-text fs-3"></i>
                                    <h5 class="fs-6 my-2 fw-bolder text-uppercase">detail berita</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-6">{{ $b->judul }}</h5>
                                <p class="card-text small mb-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($b->isi), 100, '...') }}
                                </p>
                                <div class="tgl_post d-flex">
                                    <i class="bi bi-calendar-week-fill"></i>
                                    <p class="tgl fst-italic text-muted ms-2" style="font-size: 12px;">
                                        {{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian berita tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $berita->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Tab Prestasi -->
        <div class="tab-pane fade" id="prestasi">
            <div class="row text-start g-5 justify-content-center ">
                @forelse ($prestasi as $p)
                <div class="col-lg-4 col-md-6 d-flex mb-4 justify-content-center">
                    <a href="{{ route('informasi.prestasi.detail', $p->id) }}" class="text-decoration-none text-dark w-100">
                        <div class="card card_prestasi shadow ">
                            <div class="gambar_prestasi position-relative overflow-hidden" style="border-radius: 1rem;">
                                <img src="{{ asset('storage/' . $p->gambar) }}" class="kartu card-img-top img-fluid" alt="{{ $p->judul }}">
                                <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-file-text fs-3"></i>
                                    <h5 class="fs-6 my-2 fw-bolder text-uppercase">detail prestasi</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-6">{{ $p->judul }}</h5>
                                <p class="card-text fs-6" style="text-align: justify;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 100, '...') }}
                                </p>
                                <div class="tgl_post d-flex">
                                    <i class="bi bi-calendar-week-fill"></i>
                                    <p class="tgl fst-italic text-muted ms-2" style="font-size: 12px;">
                                        {{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian prestasi tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $prestasi->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Tab Testimoni -->
        <div class="tab-pane fade" id="testimoni">
            <div class="row g-5 justify-content-center ">
                @forelse ($testimoni as $t)
                <div class="col-md-6">
                    <a href="{{ route('beranda.testimoni.detail', ['id' => $t->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark">
                        <div class="card card_testimoni mb-3 rounded-4 shadow border-0 bg-white">
                            <div class="row g-0">
                                <div class="col-md-4 sampul-gambar media-card text-center rounded-4">
                                    <img src="{{asset('storage/' . $t->foto)}}" class="img-fluid rounded-5 img-alumni" alt="foto testimoni">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold  mb-0">{{$t->nama}}</h5>
                                        <p class="text-muted mb-1 small">{{$t->status}} </p>
                                        @if($t?->posisi)
                                        <p class="text-success fst-italic mb-2" style="font-size: 0.95rem;">
                                            {{$t->posisi}}
                                        </p>
                                        @endif
                                        <p class="card-text text-secondary" style="font-size: 0.95rem;">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($t->isi), 150, '...') }}
                                        </p>
                                        <div class="d-flex justify-content-end align-items-end">
                                            <!-- <i class="fa-solid fa-quote-right  fs-3 text-secondary opacity-50"></i> -->
                                            <i class="bi bi-quote fs-3 text-secondary opacity-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian testimoni tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $testimoni->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Tab Guru -->
        <div class="tab-pane fade" id="guru">
            <div class="row g-5 justify-content-center">
                @forelse ($guru as $g)
                <div class="col-md-6">
                    <div class="card card_guru mb-3 rounded-4 shadow border-0 bg-white">
                        <div class="row g-0">
                            <!-- Foto Guru -->
                            <div class="col-md-4 media-card text-center rounded-4">
                                <img src="{{ asset('storage/' . $g->foto) }}" class="img-fluid img-guru" alt="foto guru">
                            </div>

                            <!-- Info Guru -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <!-- Nama -->
                                    <h5 class="card-title fw-bold text-primary mb-2">
                                        {{ $g->nama }}
                                    </h5>

                                    <p class="text-muted mb-2">
                                        <strong class="me-2">NIP : </strong> {{ $g?->nip }}
                                    </p>

                                    <p class="mb-2">
                                        <strong>Email :</strong> {{ $g->email }}
                                    </p>

                                    <!-- Pendidikan -->
                                    <p class="text-success d-flex align-items-center mb-2">
                                        <i class="bi bi-mortarboard-fill fs-4 me-4"></i>
                                        {{ $g->{"riwayat_pendidikan"} }}
                                    </p>

                                    <!-- Mapel -->
                                    @if($g?->mapel->isNotEmpty())
                                    <div class="card-text mb-2">
                                        <strong class="me-2">Mata Pelajaran</strong>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            @foreach($g->mapel as $mapel)
                                            <span class="badge rounded-pill shadow text-white border">
                                                {{ $mapel->nama }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian guru tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5 mb-3 d-flex justify-content-center">
                {{ $guru->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Tab Galeri -->
        <div class="tab-pane fade" id="galeri">
            <div class="row text-start g-5 justify-content-center">
                @forelse ($galeri as $g)
                <div class="col-lg-3 col-md-4 col-sm-12 justify-content-center d-flex ">
                    <div class="card card_galeri shadow position-relative">
                        <a href="{{ asset('storage/' . $g->gambar) }}" data-lightbox="galeri" data-title="{{ $g->judul }}">
                            <img src="{{ asset('storage/' . $g->gambar) }}" class="img-fluid h-100" alt="{{ $g->judul }}">
                            <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-card-image fs-3"></i>
                                <h5 class="fs-6 my-2 fw-bolder text-uppercase text-center">{{ $g->judul }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian galeri tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5 mb-5 d-flex justify-content-center">
                {{ $galeri->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>



        <!-- Tab Ekstrakulikuler -->
        <div class="tab-pane fade" id="ekskul">
            <div class="row text-start g-5 justify-content-center">
                @forelse ($ekskul as $e)
                <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="{{route('akademik.ekstrakurikuler.detail', ['id' => $e->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark ">
                        <div class="card card_ekskul shadow position-relative overflow-hidden">
                            <div class="gambar_card position-relative overflow-hidden h-60">
                                <img src="{{ asset('storage/' . $e->gambar) }}" loading="lazy" class="kartu card-img-top img-fluid" alt="gambar 1">
                                <div class="info-overlay text-white h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-eye-fill fs-2 mb-2"></i>
                                    <h5 class="fs-6 my-1 fw-bolder text-uppercase">Lihat Selengkapnya</h5>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-decoration-none fs-6">
                                    {{ $e->judul }}
                                </h5>
                                <p class="text-muted small mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($e->isi), 100, '...') }}</p>
                                <span class="badge bg-info  text-dark">{{$e->kategori}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian ekstrakulikuler tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $ekskul->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Tab Program Unggulan -->
        <div class="tab-pane fade" id="program">
            <div class="row text-start g-5 justify-content-center">
                @forelse ($program as $p)
                <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                    <a href="{{route('akademik.programunggulan.detail', ['id' => $p->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark ">
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
                                <p class="text-muted small mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 100, '...') }}</p>
                                <span class="badge bg-info  text-dark">{{$p->kategori}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="alert alert-warning text-center rounded-4 " role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    Hasil pencarian program unggulan tidak ditemukan. Coba kata kunci lain.
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $program->appends(['search' => $search])->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>