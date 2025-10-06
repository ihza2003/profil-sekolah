<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('CSS/global.css') }}" rel="stylesheet">
    <link href="{{ asset('CSS/lightbox.min.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('IMG/logo1.png') }}" type="image/png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @stack('styles')
</head>

<body>

    <x-Navbar.navbar />

    <main>
        <!-- Konten halaman -->
        @yield('content')
    </main>

    <x-footer />

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('JS/lightbox-plus-jquery.min.js') }}"></script>
    <!-- SwiperJS JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // untuk card guru
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-guru');

            cards.forEach(card => {
                card.addEventListener('click', function() {
                    // Tutup overlay lain dulu (biar hanya satu yang aktif)
                    cards.forEach(c => {
                        if (c !== card) c.classList.remove('active');
                    });

                    // Toggle overlay dari card yang diklik dan menghilangkan overlay jika sudah di klik keduanya 
                    card.classList.toggle('active');
                });
            });
        });

        // Inisialisasi Swiper testimoni
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 25,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 2,
                }
            }
        });

        function animateCount(el) {
            const target = +el.getAttribute('data-count');
            let count = 0;
            const duration = 2000; // ms, animasi total
            const intervalTime = 30; // ms
            const totalSteps = Math.ceil(duration / intervalTime);
            const step = target / totalSteps;

            let interval = setInterval(() => {
                count += step;
                if (count >= target) {
                    count = target;
                    clearInterval(interval);
                }
                el.textContent = Math.floor(count);
            }, intervalTime);
        }
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    animateCount(el);
                    obs.unobserve(el);
                }
            });
        }, {
            threshold: 0.5
        }); // 0.5 berarti setengah elemen kelihatan baru jalan

        document.querySelectorAll('[data-count]').forEach(el => {
            observer.observe(el);
        });
    </script>
    @stack('scripts')
</body>

</html>