@props(['route'])
<section class="container pencarian text-center w-50 mx-auto my-5">
    <form action="{{ $route }}" method="GET">
        <div class="input-group mb-3 shadow rounded-3">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Pencarian"
                aria-label="Search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-success px-4" type="submit">Cari</button>
        </div>
    </form>
</section>