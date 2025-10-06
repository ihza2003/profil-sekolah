<section class="container my-5">
    <div class="row g-5 justify-content-center">
        @forelse ($testimoni as $t)
        <div class="col-md-6">
            <a href="{{ route('beranda.testimoni.detail', ['id' => $t->id])}} ?page={{ request('page')}}" class="text-decoration-none text-dark">
                <div class="card card_testimoni mb-3 rounded-4 shadow border-0 bg-white ">
                    <div class="row g-0">
                        <div class="col-md-4 sampul-gambar media-card text-center rounded-4">
                            <img src="{{asset('storage/' . $t->foto)}}" class="img-fluid img-alumni" alt="foto testimoni">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold  mb-0">{{$t->nama}}</h5>
                                <p class="text-muted mb-1">{{$t->status}} </p>
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
        @if (request('search'))
        <div class="text-center text-muted mt-4">
            <i class="bi bi-search"></i> Tidak ada testimoni ditemukan untuk pencarian: <strong>{{ request('search') }}</strong>
        </div>
        @else
        <div class="text-center text-muted mt-4">
            Belum ada testimoni yang ditampilkan.
        </div>
        @endif
        @endforelse
    </div>

    <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $testimoni->links('pagination::bootstrap-5') }}
    </div>
</section>