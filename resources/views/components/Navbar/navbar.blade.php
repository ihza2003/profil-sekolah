<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top ">
    <div class="container py-2">
        <a class="navbar-brand" href="{{route('beranda')}}">
            @if($profil?->logo)
            <img src="{{ asset('storage/' . $profil->logo) }}" alt="" class="img-logo img-fluid d-inline-block align-text-top me-2" alt="Logo">
            @else
            <img src="{{ asset('IMG/logo1.png') }}" alt="" class="img-logo img-fluid d-inline-block align-text-top me-2" alt="Logo">
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto fw-bold ">
                <li class="nav-item ">
                    <a class="nav-link fs-5 {{ Request::routeIs('beranda') ? 'active' : '' }}  {{ Request::routeIs('beranda.*') ? 'active' : '' }}" aria-current="page" href="{{route('beranda')}}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 
                        {{ Request::routeIs('profile.*') ? 'active' : '' }}"
                        href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Madrasah
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item {{ Request::routeIs('profile.visi') ? 'active' : '' }}"
                                href="{{ route('profile.visi') }}">Visi Misi dan Tujuan</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('profile.struktur') ? 'active' : '' }}"
                                href="{{ route('profile.struktur') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('profile.akreditasi') ? 'active' : '' }}"
                                href="{{ route('profile.akreditasi') }}">Sertifikat Akreditasi Madrasah</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('profile.fasilitas') ? 'active' : '' }}"
                                href="{{ route('profile.fasilitas') }}">Fasilitas</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('profile.guru') ? 'active' : '' }}"
                                href="{{ route('profile.guru') }}">Tenaga Pendidik</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 {{ Request::routeIs('akademik.*') ? 'active' : '' }}
                    " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item {{ Request::routeIs('akademik.kurikulum') ? 'active' : '' }}" href="{{ route('akademik.kurikulum') }}">Kurikulum</a></li>
                        <li><a class="dropdown-item dropdown-item {{ Request::routeIs('akademik.programunggulan') ? 'active' : '' }} {{ Request::routeIs('akademik.programunggulan.detail') ? 'active' : '' }}"
                                href="{{ route('akademik.programunggulan') }}">Program Unggulan</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('akademik.ekstrakurikuler') ? 'active' : '' }} {{ Request::routeIs('akademik.ekstrakurikuler.detail') ? 'active' : '' }}"
                                href="{{ route('akademik.ekstrakurikuler') }}">Organisasi & Ekskul</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 {{ Request::routeIs('informasi.*') ? 'active' : '' }}
                    " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item {{ Request::routeIs('informasi.berita') ? 'active' : '' }}   {{ Request::routeIs('informasi.berita.detail') ? 'active' : '' }}" href=" {{ route('informasi.berita') }}">Berita</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('informasi.prestasi') ? 'active' : '' }} {{ Request::routeIs('informasi.prestasi.detail') ? 'active' : ''}}" href="{{ route('informasi.prestasi') }}">Prestasi</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('informasi.galeri') ? 'active' : '' }}" href="{{ route('informasi.galeri') }}">Galeri</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ Request::routeIs('kontak') ? 'active' : '' }}" aria-current="page" href="{{ route('kontak') }}">Kontak</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 {{ Request::routeIs('ppdb.*') ? 'active' : '' }}"
                        href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PPDB
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item 
                        {{ Request::routeIs('ppdb.informasi') ? 'active' : '' }}
                        {{ Request::routeIs('ppdb.form') ? 'active' : '' }} "
                                href="{{ route('ppdb.informasi') }}">Informasi PPDB</a></li>

                        <li><a class="dropdown-item 
                        {{ Request::routeIs('ppdb.cek.form') ? 'active' : '' }}
                         {{ Request::routeIs('ppdb.cek.submit') ? 'active' : '' }}"
                                href=" {{ route('ppdb.cek.form') }}">Hasil PPDB</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>