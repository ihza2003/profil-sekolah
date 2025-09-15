<footer class="mt-5 text-white">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Kontak Kami -->
            @if($profil)
            <div class="col-lg-5 col-md-6">
                <h5 class="fw-bold mb-3">Kontak Kami</h5>
                <ul class="list-unstyled small">
                    @if($profil?->alamat)
                    <li class="mb-2 fs-6"><i class="bi bi-geo-alt-fill me-2"></i>{{$profil->alamat}}</li>
                    @endif
                    @if($profil?->telepon)
                    <li class="mb-2 fs-6"><i class="bi bi-telephone-fill me-2"></i>{{$profil->telepon}}</li>
                    @endif
                    @if($profil?->email)
                    <li><i class="bi bi-envelope-fill me-2"></i><a href="mailto:masamujaya@gmail.com" class="text-white text-decoration-none fs-6">{{$profil->email}}</a></li>
                    @endif
                </ul>
            </div>
            @endif
            <!-- Madrasah -->
            <div class="col-lg-2 col-md-6">
                <h5 class="fw-bold mb-3">Informasi</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none fs-6">Prestasi</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none fs-6">Berita</a></li>
                    <li><a href="#" class="text-white text-decoration-none fs-6">Akreditasi</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="fw-bold mb-3">Akses Cepat</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none fs-6">Testimoni</a></li>
                    <li><a href="#" class="text-white text-decoration-none fs-6">PPDB</a></li>
                </ul>
            </div>

            <!-- Media Sosial -->
            @if($medsos)
            <div class="col-lg-3 col-md-12">
                <h5 class="fw-bold mb-3">Media Sosial</h5>
                <div class="d-flex gap-3 fs-4">
                    @if($medsos?->facebook)
                    <div class="wrap py-1 px-2 text-white rounded-2">
                        <a href="{{ $medsos->facebook }}" class="text-white" target="_blank"><i class="bi bi-facebook"></i></a>
                    </div>
                    @endif
                    @if($medsos?->twitter)
                    <div class="wrap py-1 px-2 text-white rounded-2">
                        <a href="{{ $medsos->twitter }}" class="text-white" target="_blank"><i class="bi bi-twitter"></i></a>
                    </div>
                    @endif
                    @if($medsos?->instagram)
                    <div class="wrap py-1 px-2 text-white rounded-2">
                        <a href="{{ $medsos->instagram }}" class="text-white" target="_blank"><i class="bi bi-instagram"></i></a>
                    </div>
                    @endif
                    @if($medsos?->youtube)
                    <div class="wrap py-1 px-2 text-white rounded-2">
                        <a href="{{ $medsos->youtube }}" class="text-white" target="_blank"><i class="bi bi-youtube"></i></a>
                    </div>
                    @endif
                    @if($medsos?->tiktok)
                    <div class="wrap py-1 px-2 text-white rounded-2">
                        <a href="{{ $medsos->tiktok }}" class="text-white" target="_blank"><i class="bi bi-tiktok"></i></a>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center py-3 copyright" style="background-color: #002855; border-top: 1px solid rgba(255, 255, 255, 0.2); font-size: 0.9rem;">
        &copy; 2025 <strong>MTS Muhammadiyah Jayapura</strong>. All rights reserved.
    </div>
</footer>