<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top ">
    <div class="container py-2">
        <a class="navbar-brand" href="{{route('beranda')}}">
            @if($profil?->logo)
            <img src="{{ asset('storage/' . $profil->logo) }}" alt="" class="img-fluid d-inline-block align-text-top me-2" alt="Logo">
            @else
            <img src="{{ asset('IMG/logo1.png') }}" alt="" class="img-fluid d-inline-block align-text-top me-2" alt="Logo">
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto fw-bold ">
                <li class="nav-item ">
                    <a class="nav-link fs-5 {{ Request::routeIs('beranda') ? 'active' : '' }}" aria-current="page" href="{{route('beranda')}}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 {{ Request::routeIs('profile.visi') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Madrasah
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="{{ route('profile.visi') }}">Visi Misi dan Tujuan</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.struktur') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.akreditasi') }}">Sertifikat Akreditasi Madrasah</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.fasilitas') }}">Fasilitas</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.guru') }}">Tenaga Pendidik</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('kurikulum') }}">Kurikulum</a></li>
                        <li><a class="dropdown-item" href="{{ route('programunggulan') }}">Program Unggulan</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler') }}">Organisasi & Ekskul</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="{{ route('berita') }}">Berita</a></li>
                        <li><a class="dropdown-item" href="{{ route('prestasi') }}">Prestasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('galeri') }}">Galeri</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ Request::routeIs('kontak') ? 'active' : '' }}" aria-current="page" href="{{ route('kontak') }}">Kontak</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PPDB
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('ppdb.informasi') }}">Informasi PPDB</a></li>
                        <li><a class="dropdown-item" href="{{ route('ppdb.cek.form') }}">Hasil PPDB</a></li>
                        <!-- <li><a class="dropdown-item" href="{{ route('ppdb.form') }}">Formulir PPDB</a></li> -->
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>