<footer class="footer text-white pt-5">
    <div class="container pb-4">
        <div class="row g-4">
            <!-- Kontak & Sosial -->
            <div class="col-lg-4 col-md-12">
                @if($profil)
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="list-unstyled ">
                    @if($profil?->alamat)
                    <li><i class="bi bi-geo-alt-fill me-2 mb-2"></i>{{$profil->alamat}}</li>
                    @endif
                    @if($profil?->telepon)
                    <li><i class="bi bi-telephone-fill me-2 mb-2"></i>{{$profil->telepon}}</li>
                    @endif
                    @if($profil?->email)
                    <li><i class="bi bi-envelope-fill me-2"></i>{{$profil->email}}</li>
                    @endif
                </ul>
                @endif

                @if($medsos)
                <div class="social-icons d-flex gap-3 mt-3">
                    @if($medsos?->facebook)
                    <a href="{{ $medsos->facebook }}" class="icon facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if($medsos?->twitter)
                    <a href="{{$medsos->twitter}}" class="icon twitter" target="_blank"><i class="bi bi-twitter"></i></a>
                    @endif
                    @if($medsos?->instagram)
                    <a href="{{ $medsos->instagram }}" class="icon instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if($medsos?->tiktok)
                    <a href="{{ $medsos->tiktok }}" class="icon tiktok" target="_blank"><i class="bi bi-tiktok"></i></a>
                    @endif
                    @if($medsos?->youtube)
                    <a href="{{ $medsos->youtube }}" class="icon youtube" target="_blank"><i class="bi bi-youtube"></i></a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Informasi -->
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">Informasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('informasi.prestasi') }}">Prestasi</a></li>
                    <li><a href="{{ route('informasi.berita') }}">Berita</a></li>
                    <li><a href="{{ route('profile.akreditasi') }}">Akreditasi</a></li>
                </ul>
            </div>

            <!-- Akses Cepat -->
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">Akses Cepat</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('beranda.testimoni') }}">Testimoni</a></li>
                    <li><a href="#">PPDB</a></li>
                </ul>
            </div>


            <div class="col-lg-4">
                @if($profil?->embed_maps)
                <h5 class="footer-title">Lokasi Kami</h5>
                <div class="maps rounded-4 overflow-hidden">
                    {!! $profil->embed_maps !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center py-3">
        @if($pengaturan?->tahun_footer)
        &copy; {{ $pengaturan->tahun_footer}} MTS Muhammadiyah Jayapura. All rights reserved.
        @else
        &copy; 2025 MTS Muhammadiyah Jayapura. All rights reserved.
        @endif
    </div>
</footer>