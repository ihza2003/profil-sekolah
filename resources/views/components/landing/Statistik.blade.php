<section class="statistik" data-aos="fade-down">
    <div class="container">
        <div class="card shadow-lg border-0 overflow-hidden">
            <div class="bg-gradient d-flex justify-content-center align-items-center px-4 py-5">

                <div class="row w-100 text-center text-white">
                    <!-- Tahun Ajaran -->
                    <div class="col-md-3 col-6 mb-4 mb-md-0">
                        <i class="bi bi-calendar-check fs-1 mb-2 "></i>
                        <h3 class="fw-bold mb-0">{{ $statistik->tahun_ajaran ?? '-' }}</h3>
                        <small class="fw-semibold">Tahun Ajaran</small>
                    </div>

                    <!-- Peserta Didik -->
                    <div class="col-md-3 col-6 mb-4 mb-md-0">
                        <i class="bi bi-people-fill fs-1 mb-2"></i>
                        <h3 class="fw-bold mb-0" data-count="{{ $statistik->jumlah_siswa ?? 0 }}">0</h3>
                        <small class=" fw-semibold">Peserta Didik</small>
                    </div>

                    <!-- Kelas Rombel -->
                    <div class="col-md-3 col-6">
                        <i class="bi bi-building fs-1 mb-2"></i>
                        <h3 class="fw-bold mb-0" data-count="{{ $statistik->jumlah_kelas ?? 0 }}">0</h3>
                        <small class="fw-semibold">Rombel kelas</small>
                    </div>

                    <!-- Guru Tendik -->
                    <div class="col-md-3 col-6">
                        <i class="bi bi-person-workspace fs-1 mb-2"></i>
                        <h3 class="fw-bold mb-0" data-count="{{ $statistik->jumlah_guru ?? 0}}">0</h3>
                        <small class="fw-semibold">Guru</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
