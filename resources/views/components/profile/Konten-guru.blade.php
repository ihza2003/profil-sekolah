<section class="container konten my-5">
    <div class="row g-5 justify-content-center ">
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
        @if (request('search'))
        <div class="alert alert-warning text-center rounded-4 mt-5 " role="alert">
            <i class="bi bi-info-circle me-2"></i> Tidak ditemukan untuk pencarian: <strong>{{ request('search') }}</strong>
        </div>
        @else
        <div class="alert alert-warning text-center rounded-4 mt-5" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <h5 class="text-muted my-3">Belum ada guru yang ditampilkan</h5>
        </div>
        @endif
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 mb-3 d-flex justify-content-center">
        {{ $guru->links('pagination::bootstrap-5') }}
    </div>
</section>
<!-- <section class="container konten my-5">
    <div class="row g-5 justify-content-center">
        @forelse($guru as $g)
        <div class="col-lg-3 col-md-6 my-3 justify-content-center d-flex">
            <div class="card-guru shadow position-relative rounded-3">
                <img src="{{ asset('storage/' . $g->foto) }}" class="img-fluid h-100 w-100" alt="Foto Guru">
                <div class="info-overlay text-white d-flex flex-column justify-content-center">
                    <h5 class="fs-6 my-2 fw-bolder">{{ $g->nama }}</h5>
                    @if($g?->nip)
                    <p class="fs-6 my-2 fw-bolder">NIP: {{ $g->nip }}</p>
                    @endif
                    @if($g?->mapel->isNotEmpty())
                    <p class="my-2 fs-6">Mapel:
                        @foreach($g->mapel as $mapel)
                        <span class="d-block">{{ $mapel->nama }}</span>
                        @endforeach
                    </p>
                    @endif
                    <p class="my-2 fst-italic">{{ $g->{'riwayat-pendidikan'} }}</p>
                </div>
            </div>
        </div>
        @empty
        @if (request('search'))
        <div class="text-center text-muted mt-4">
            <i class="bi bi-search"></i> Tidak ditemukan untuk pencarian: <strong>{{ request('search') }}</strong>
        </div>
        @else
        <div class="text-center text-muted mt-4">
            Belum ada guru yang ditampilkan.
        </div>
        @endif
        @endforelse
    </div>

<div class="mt-5 mb-3 d-flex justify-content-center">
    {{ $guru->links('pagination::bootstrap-5') }}
</div>
</section> -->