<section class="hero-landing d-flex justify-content-start align-items-center text-white  position-relative" style="background-image: url('{{ asset('IMG/landing3.jpg') }}');">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="container z-2">
        <div class="row ">
            <div class="col-lg-12">
                <p class="fs-4 text-shadow mb-3" data-aos="fade-down">Selamat Datang di</p>
                @if($profil?->nama)
                <h1 class="display-6 fw-bold mb-3" data-aos="fade-in">
                    {{$profil->nama}}
                </h1>
                @else
                <h1 class="display-6 fw-bold mb-3" data-aos="fade-in">
                    MTs Muhammadiyah Jayapura
                </h1>
                @endif
                <p class="fs-5 text-shadow fst-italic" data-aos="fade-out">
                    "Berkarya, Kreatif, dan Terunggul"
                </p>
                <form action="{{ route('search.global') }}" method="GET"
                    class="d-flex w-50 seacrh-global shadow-sm p-1 bg-white rounded-3"
                    data-aos="fade-up">
                    <input class="form-control border-0"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari informasi..."
                        aria-label="Search">
                    <button class="btn btn-success px-5 fw-semibold" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
</section>