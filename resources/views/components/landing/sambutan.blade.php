<section class="content container my-5 fade-in" data-aos="fade-up">
    <div class="card kepsek shadow-lg border-0 p-4 bg-white">
        <div class="row g-4 align-items-center">
            <!-- Gambar Kepala Sekolah -->
            <div class="col-md-5 text-center ">
                <img
                    src="{{ $sambutan && $sambutan->foto_kepala_sekolah 
                            ? asset('storage/' . $sambutan->foto_kepala_sekolah) 
                            : asset('IMG/profile.png') }}"
                    class="img-fluid rounded-4 shadow-sm"
                    style="height: 350px; width: auto;"
                    alt="Kepala Sekolah">
            </div>

            <!-- Sambutan Kepala Sekolah -->
            <div class="col-md-7">
                <h5 class="fw-bold text-success">Sambutan Kepala Madrasah</h5>
                <h3 class="fw-bold section-title">MTS Muhammadiyah Jayapura</h3>

                <p class="fw-semibold text-dark">
                    {{ $sambutan->nama_kepala_sekolah ?? 'Nama Kepala Sekolah Belum Tersedia' }}
                </p>

                <p class="text-secondary content-paragraph">
                    {{ $sambutan && $sambutan->isi_sambutan 
                        ? Str::limit(strip_tags($sambutan->isi_sambutan), 400, '...') 
                        : 'Sambutan Kepala Madrasah akan diperbarui segera.' }}
                </p>

                @if($sambutan)
                <a href="{{ route('beranda.detail-sambutan', ['id' => $sambutan->id]) }}?page={{ request('page') }}"
                    class="btn btn-success mt-3 px-4 py-2 shadow-sm fw-bold rounded-pill">
                    Lebih Lengkap <i class="bi bi-arrow-right"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>