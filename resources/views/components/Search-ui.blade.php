@props(['route'])
<section class="container pencarian text-center w-50 mx-auto my-5">
    <!-- <form action="{{ $route }}" method="GET">
        <div class="input-group mb-3 shadow rounded-3">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari informasi..."
                aria-label="Search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-success px-4" type="submit">Cari</button>
        </div>
    </form> -->

    <form action="{{ $route }}" method="GET"
        class="d-flex justify-content-center seacrh-global shadow p-1 bg-white rounded-3">
        <input class="form-control border-0"
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari informasi..."
            aria-label="Search">
        <button class="btn btn-success px-5 fw-semibold" type="submit">Cari</button>
    </form>

</section>