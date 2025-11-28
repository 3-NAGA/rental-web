<!doctype html>
<html lang="en" class="antialiased">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CekPremi — Premium UI Demo</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lottie (for illustrations) -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js"></script>

    <!-- Styles -->
    <style>
        /* Gallery touch config */
        #gallery img {
            min-width: 100%;
            /* wajib agar tiap slide selebar viewport */
            height: 100%;
            object-fit: cover;
        }

        /* Glassmorphism card */
        .card-premium {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: transform .35s ease, box-shadow .35s ease;
        }

        .card-premium:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.45);
        }

        /* Ripple click */
        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple .ripple-elm {
            position: absolute;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            pointer-events: none;
            opacity: .5;
            background: rgba(255, 255, 255, 0.6);
        }

        /* Fade section initial state */
        .fade-sec {
            opacity: 0;
            transform: translateY(60px);
        }

        /* Testimoni wrapper */
        .testimoni-wrapper>div {
            min-width: 100%;
            flex-shrink: 0;
        }

        /* Small helpers */
        .glass-effect {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        /* Ensure gallery images don't collapse */
        #gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <header id="navbar"
        class="fixed inset-x-0 top-0 z-40 bg-white/90 backdrop-blur  border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <img src="https://www.cekpremi.com/img/logo-revamp.svg" alt="logo" class="h-7" />
            <div class="flex items-center gap-3">
                {{-- <button id="themeToggle" aria-label="toggle theme" class="p-2 rounded-md">🌓</button> --}}
                <button id="mobileBtn" class="md:hidden p-2 rounded-md">☰</button>
            </div>
        </div>
    </header>

    <!-- Smooth wrapper for ScrollSmoother (optional). If ScrollSmoother not available it will be ignored in script -->
    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main class="pt-20">

                <!-- HERO (kept minimal) -->
                <section class="w-full overflow-hidden fade-sec">
                    <div class="relative w-full h-48 md:h-64 overflow-hidden rounded-lg">
                        <div id="gallery" class="flex h-full">
                            <img src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250829/mobil.webp"
                                class="flex-shrink-0 min-w-full h-full object-cover" alt="Mobil" />
                            <img src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250829/motor.webp"
                                class="flex-shrink-0 min-w-full h-full object-cover" alt="Motor" />
                            <img src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250630/properti.webp"
                                class="flex-shrink-0 min-w-full h-full object-cover" alt="Properti" />
                        </div>

                        <button id="prev"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow">‹</button>
                        <button id="next"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow">›</button>
                    </div>
                </section>

                <!-- Subtitle -->
                <section class="text-center mt-8 px-4 fade-sec">
                    <h2 class="text-2xl font-bold">Membandingkan Asuransi Dengan Mudah, Murah, dan Terpercaya</h2>
                    <p class="mt-2 text-gray-600">Premi Terjangkau dan Produk Lengkap</p>
                </section>

                <!-- CATEGORY GRID -->
                <section class="mt-8 px-4 fade-sec">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="card-premium p-5 rounded-2xl shadow text-center">
                            <div class="text-4xl mb-2">🚗</div>
                            <h3 class="font-bold text-lg">Mobil</h3>
                            <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 400.000</p>
                        </div>

                        <div class="card-premium p-5 rounded-2xl shadow text-center">
                            <div class="text-4xl mb-2">🛵</div>
                            <h3 class="font-bold text-lg">Motor</h3>
                            <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 90.000</p>
                        </div>

                        <div class="card-premium p-5 rounded-2xl shadow text-center">
                            <div class="text-4xl mb-2">✈️</div>
                            <h3 class="font-bold text-lg">Perjalanan</h3>
                            <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 50.000</p>
                        </div>

                        <div class="card-premium p-5 rounded-2xl shadow text-center">
                            <div class="text-4xl mb-2">🏠</div>
                            <h3 class="font-bold text-lg">Properti</h3>
                            <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 500.000</p>
                        </div>

                        <div class="card-premium p-5 rounded-2xl shadow text-center">
                            <div class="text-4xl mb-2">🧑‍⚕️</div>
                            <h3 class="font-bold text-lg">Kesehatan</h3>
                            <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 600.000</p>
                        </div>

                        <div class="card-premium p-5 rounded-2xl shadow text-center">
                            <div class="text-4xl mb-2">🛡️</div>
                            <h3 class="font-bold text-lg">Lainnya</h3>
                            <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 100.000</p>
                        </div>
                    </div>
                </section>

                <!-- Offers -->
                <section class="text-center mt-12 px-4 fade-sec">
                    <h2 class="text-2xl font-bold">Penawaran Spesial Hanya Untukmu</h2>
                </section>

                <!-- Search form -->
                <section class="py-16 bg-gray-50 fade-sec">
                    <div class="max-w-4xl mx-auto px-6 text-center">
                        <h2 class="text-2xl font-bold mb-6">Cari Premi Terbaik</h2>
                        <div class="bg-white p-6 rounded-2xl shadow-md grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input type="text" placeholder="Jenis Asuransi" class="border p-3 rounded-lg w-full" />
                            <input type="text" placeholder="Kota Domisili" class="border p-3 rounded-lg w-full" />
                            <button id="searchBtn" class="bg-orange-500 text-white p-3 rounded-lg ripple">Cari
                                Sekarang</button>
                        </div>
                    </div>
                </section>

                <!-- Calculator -->
                <section class="py-20 bg-white fade-sec">
                    <div class="max-w-4xl mx-auto px-6">
                        <h2 class="text-2xl font-bold text-center mb-6">Kalkulator Premi Interaktif</h2>
                        <div class="bg-gray-100 p-6 rounded-2xl shadow-md">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input id="hargaMobil" type="number" placeholder="Harga Kendaraan"
                                    class="p-3 border rounded-lg" />
                                <select id="jenisAsuransi" class="p-3 border rounded-lg">
                                    <option value="comprehensive">Comprehensive</option>
                                    <option value="tlo">TLO</option>
                                </select>
                            </div>
                            <button onclick="hitungPremi()"
                                class="mt-4 bg-orange-500 text-white p-3 rounded-lg w-full ripple">Hitung Premi</button>
                            <p id="hasilPremi" class="mt-4 font-semibold text-lg text-center"></p>
                        </div>
                    </div>
                </section>

                <!-- Benefits -->
                <section id="benefits" class="py-20 bg-white text-gray-900 fade-sec">
                    <h2 class="text-3xl font-bold text-center mb-12">Kenapa Harus Cekpremi?</h2>
                    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-6">
                        <div class="p-8 rounded-2xl bg-slate-100 text-center shadow-sm hover:shadow-md transition">
                            <img src="/img/icons/thumb.png" class="w-16 mx-auto mb-4" />
                            <h3 class="font-semibold text-lg">Rekomendasi Terbaik</h3>
                        </div>
                        <div class="p-8 rounded-2xl bg-slate-100 text-center shadow-sm hover:shadow-md transition">
                            <img src="/img/icons/moneybag.png" class="w-16 mx-auto mb-4" />
                            <h3 class="font-semibold text-lg">Lebih Praktis</h3>
                        </div>
                        <div class="p-8 rounded-2xl bg-slate-100 text-center shadow-sm hover:shadow-md transition">
                            <img src="/img/icons/wallet.png" class="w-16 mx-auto mb-4" />
                            <h3 class="font-semibold text-lg">Tanpa Biaya Tambahan</h3>
                        </div>
                        <div class="p-8 rounded-2xl bg-slate-100 text-center shadow-sm hover:shadow-md transition">
                            <img src="/img/icons/compare.png" class="w-16 mx-auto mb-4" />
                            <h3 class="font-semibold text-lg">Perbandingan Asuransi</h3>
                        </div>
                        <div class="p-8 rounded-2xl bg-slate-100 text-center shadow-sm hover:shadow-md transition">
                            <img src="/img/icons/folder.png" class="w-16 mx-auto mb-4" />
                            <h3 class="font-semibold text-lg">Produk Lengkap</h3>
                        </div>
                        <div class="p-8 rounded-2xl bg-slate-100 text-center shadow-sm hover:shadow-md transition">
                            <img src="/img/icons/fast.png" class="w-16 mx-auto mb-4" />
                            <h3 class="font-semibold text-lg">Cepat dan Mudah</h3>
                        </div>
                    </div>
                </section>

                <!-- 3 Steps -->
                <section class="py-16 bg-white fade-sec">
                    <div class="max-w-6xl mx-auto px-6 text-center">
                        <h2 class="text-2xl font-bold mb-10">3 Langkah Mudah Beli Produk Asuransi</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="p-6 bg-gray-100 rounded-2xl shadow-sm">
                                <img src="/img/langkah1.png" class="mx-auto h-24 mb-4" />
                                <h3 class="font-semibold text-lg">Pilih Produk</h3>
                            </div>
                            <div class="p-6 bg-gray-100 rounded-2xl shadow-sm">
                                <img src="/img/langkah2.png" class="mx-auto h-24 mb-4" />
                                <h3 class="font-semibold text-lg">Bandingkan Pilihanmu</h3>
                            </div>
                            <div class="p-6 bg-gray-100 rounded-2xl shadow-sm">
                                <img src="/img/langkah3.png" class="mx-auto h-24 mb-4" />
                                <h3 class="font-semibold text-lg">Dapatkan Proteksi</h3>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FAQ -->


                <section id="faqSection" class="py-20 fade-sec">
                    <div class="max-w-3xl mx-auto">
                        <h3 class="text-2xl font-bold text-center mb-4">FAQ • Pertanyaan Umum</h3>
                        <div class="bg-gray-100 p-6 rounded-2xl shadow-md">
                            <div class="mb-4">
                                <input id="faqSearch" type="search" placeholder="Cari pertanyaan..."
                                    class="w-full px-4 py-3 border rounded-lg focus:outline-none" />
                            </div>

                            <div id="faqList" class="space-y-3">
                                <div class="faq-item border rounded-lg overflow-hidden">
                                    <button
                                        class="faq-head w-full text-left px-4 py-3 flex justify-between items-center bg-white">
                                        <span class="font-semibold">Bagaimana cara klaim asuransi mobil?</span>
                                        <span class="faq-toggle">+</span>
                                    </button>
                                    <div class="faq-body px-4 py-3 bg-gray-50 hidden">
                                        Lengkapi dokumen: KTP, STNK, Foto Kerusakan & Kronologi. Upload melalui portal
                                        klaim
                                        atau
                                        chat ke CS.
                                    </div>
                                </div>

                                <div class="faq-item border rounded-lg overflow-hidden">
                                    <button
                                        class="faq-head w-full text-left px-4 py-3 flex justify-between items-center bg-white">
                                        <span class="font-semibold">Berapa lama proses klaim?</span>
                                        <span class="faq-toggle">+</span>
                                    </button>
                                    <div class="faq-body px-4 py-3 bg-gray-50 hidden">
                                        Estimasi 1–7 hari kerja tergantung kelengkapan dokumen dan jenis klaim.
                                    </div>
                                </div>

                                <div class="faq-item border rounded-lg overflow-hidden">
                                    <button
                                        class="faq-head w-full text-left px-4 py-3 flex justify-between items-center bg-white">
                                        <span class="font-semibold">Apa perbedaan Comprehensive dan TLO?</span>
                                        <span class="faq-toggle">+</span>
                                    </button>
                                    <div class="faq-body px-4 py-3 bg-gray-50 hidden">
                                        Comprehensive menanggung kerusakan sebagian & total; TLO hanya untuk kerusakan
                                        total
                                        /
                                        kehilangan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Testimoni (auto-scroll & swipe) -->
                <section class="py-20 bg-white fade-sec">
                    <div class="max-w-6xl mx-auto px-6 text-center">
                        <h2 class="text-2xl font-bold mb-10">Apa Kata Mereka?</h2>
                        <div class="overflow-hidden">
                            <div class="testimoni-wrapper flex">
                                <div class="p-6 bg-gray-100 rounded-2xl shadow-md mx-3 w-full">
                                    <p class="text-gray-700 italic">“Proses cepat dan mudah, sangat membantu.”</p>
                                    <h4 class="mt-4 font-semibold">Budi – Jakarta</h4>
                                </div>
                                <div class="p-6 bg-gray-100 rounded-2xl shadow-md mx-3 w-full">
                                    <p class="text-gray-700 italic">“Pilihan produk lengkap dan harganya terjangkau.”
                                    </p>
                                    <h4 class="mt-4 font-semibold">Sari – Surabaya</h4>
                                </div>
                                <div class="p-6 bg-gray-100 rounded-2xl shadow-md mx-3 w-full">
                                    <p class="text-gray-700 italic">“Sangat puas! CS responsif dan informatif.”</p>
                                    <h4 class="mt-4 font-semibold">Andi – Bandung</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </main>

            <!-- Footer -->
            <footer class="bg-slate-900 text-white py-14 mt-16">
                <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div>
                        <h3 class="font-bold text-lg mb-3">Cekpremi</h3>
                        <p class="text-gray-300 text-sm">Portal pembanding asuransi terbaik & terpercaya di Indonesia.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3">Produk</h4>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>Asuransi Mobil</li>
                            <li>Asuransi Motor</li>
                            <li>Asuransi Perjalanan</li>
                            <li>Asuransi Kesehatan</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3">Perusahaan</h4>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>Tentang Kami</li>
                            <li>Karir</li>
                            <li>Blog</li>
                            <li>Kontak</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3">Ikuti Kami</h4>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>Instagram</li>
                            <li>Facebook</li>
                            <li>LinkedIn</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center text-gray-400 text-sm mt-10">© 2025 Cekpremi. All rights reserved.</div>
            </footer>

        </div>
    </div>

    <!-- Dark Mode Toggle -->
    <div class="fixed bottom-6 right-6 z-50">
        <button id="darkToggle" class="bg-black text-white p-4 rounded-full shadow-xl">🌓</button>
    </div>

    <!-- GSAP + Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Observer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollSmoother.min.js"></script>

    <!-- Optional Swiper (already included in previous work if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        /* ---------- FAQ search & accordion ---------- */
        const faqSearch = document.getElementById('faqSearch');
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const head = item.querySelector('.faq-head');
            const body = item.querySelector('.faq-body');
            const toggle = item.querySelector('.faq-toggle');

            head.addEventListener('click', () => {
                const opened = !body.classList.contains('hidden');
                // close others
                faqItems.forEach(it => it.querySelector('.faq-body').classList.add('hidden'));
                faqItems.forEach(it => it.querySelector('.faq-toggle').textContent = '+');
                if (opened) {
                    body.classList.add('hidden');
                    toggle.textContent = '+';
                } else {
                    body.classList.remove('hidden');
                    toggle.textContent = '−';
                    gsap.fromTo(body, {
                        height: 0,
                        opacity: 0
                    }, {
                        height: 'auto',
                        opacity: 1,
                        duration: 0.35,
                        ease: 'power2.out'
                    });
                }
            });
        });

        faqSearch.addEventListener('input', (e) => {
            const q = e.target.value.trim().toLowerCase();
            faqItems.forEach(item => {
                const text = item.innerText.toLowerCase();
                item.style.display = text.includes(q) ? 'block' : 'none';
            });
        });
        // Basic utilities
        const html = document.documentElement;
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        const gallery = document.getElementById('gallery');
        const testimoniWrap = document.querySelector('.testimoni-wrapper');
        const themeToggle = document.getElementById('themeToggle');

        prev.addEventListener("click", () => goToSlide(current - 1));
        next.addEventListener("click", () => goToSlide(current + 1));

        // Dark mode toggles
        document.getElementById('darkToggle').onclick = () => html.classList.toggle('dark');
        themeToggle?.addEventListener('click', () => html.classList.toggle('dark'));

        // Sticky navbar shadow
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) navbar.classList.add('shadow-lg');
            else navbar.classList.remove('shadow-lg');
        });

        // Optional: ScrollSmoother init (safe guard if plugin present)
        try {
            if (gsap && ScrollSmoother) {
                ScrollSmoother.create({
                    wrapper: '#smooth-wrapper',
                    content: '#smooth-content',
                    smooth: 1.2
                });
            }
        } catch (e) {
            /* ignore if unavailable */
        }

        // Register plugins
        gsap.registerPlugin(ScrollTrigger, Observer, ScrollToPlugin);

        /* ===========================
           Entrance animation (fade + up)
           applied to .fade-sec sections
           =========================== */
        gsap.utils.toArray('.fade-sec').forEach((sec, i) => {
            gsap.to(sec, {
                opacity: 1,
                y: 0,
                duration: 1.05,
                ease: 'power4.out',
                delay: i * 0.04,
                scrollTrigger: {
                    trigger: sec,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        /* ===========================
           HERO GALLERY — GSAP slide + swipe
           =========================== */
        let current = 0;
        const slides = gallery.children;
        const total = slides.length;

        const getSlideWidth = () => gallery.clientWidth;

        function goToSlide(idx) {
            current = gsap.utils.wrap(0, total, idx);
            gsap.to(gallery, {
                x: -current * getSlideWidth(),
                duration: 0.9,
                ease: 'expo.out'
            });
        }

        // Prev / Next buttons
        prev?.addEventListener('click', () => goToSlide(current - 1));
        next?.addEventListener('click', () => goToSlide(current + 1));

        // Auto-advance hero (optional)
        let heroInterval = setInterval(() => goToSlide(current + 1), 4500);
        // pause on hover
        gallery.addEventListener('mouseenter', () => clearInterval(heroInterval));
        gallery.addEventListener('mouseleave', () => heroInterval = setInterval(() => goToSlide(current + 1), 4500));

        // Swipe support via Observer
        Observer.create({
            target: gallery,
            type: 'touch,pointer',
            onPress() {
                this.startX = gsap.getProperty(gallery, 'x');
            },
            onDrag(self) {
                gsap.set(gallery, {
                    x: this.startX + self.deltaX
                });
            },
            onRelease(self) {
                const threshold = (window.innerWidth * 0.12); // responsive threshold
                if (Math.abs(self.deltaX) > threshold) {
                    goToSlide(current + (self.deltaX < 0 ? 1 : -1));
                } else {
                    goToSlide(current);
                }
            },
            tolerance: 10
        });

        // Resize handling
        window.addEventListener('resize', () => goToSlide(current));

        /* ===========================
           Testimoni auto-slide + swipe
           =========================== */
        if (testimoniWrap) {
            let testiIndex = 0;
            const testiCount = testimoniWrap.children.length;

            function runTesti(idx) {
                testiIndex = gsap.utils.wrap(0, testiCount, idx ?? testiIndex + 1);
                gsap.to(testimoniWrap, {
                    x: -testiIndex * testimoniWrap.children[0].clientWidth,
                    duration: 0.8,
                    ease: 'power2.out'
                });
            }
            let testiInterval = setInterval(() => runTesti(), 3200);
            testimoniWrap.addEventListener('mouseenter', () => clearInterval(testiInterval));
            testimoniWrap.addEventListener('mouseleave', () => testiInterval = setInterval(() => runTesti(), 3200));

            Observer.create({
                target: testimoniWrap,
                type: 'touch,pointer',
                onPress() {
                    this.startX = gsap.getProperty(testimoniWrap, 'x');
                },
                onDrag(self) {
                    gsap.set(testimoniWrap, {
                        x: this.startX + self.deltaX
                    });
                },
                onRelease(self) {
                    const thr = 80;
                    if (Math.abs(self.deltaX) > thr) {
                        runTesti(testiIndex + (self.deltaX < 0 ? 1 : -1));
                    } else {
                        runTesti(testiIndex);
                    }
                }
            });
            // initial position
            runTesti(0);
        }

        /* ===========================
           Ripple click micro-interaction
           =========================== */
        function createRipple(e) {
            const target = e.currentTarget;
            const rect = target.getBoundingClientRect();
            const ripple = document.createElement('span');
            ripple.className = 'ripple-elm';
            ripple.style.left = `${e.clientX - rect.left}px`;
            ripple.style.top = `${e.clientY - rect.top}px`;
            ripple.style.width = ripple.style.height = Math.max(rect.width, rect.height) * 0.6 + 'px';
            target.appendChild(ripple);
            gsap.fromTo(ripple, {
                scale: 0,
                opacity: 0.6
            }, {
                scale: 2.8,
                opacity: 0,
                duration: 0.6,
                ease: 'power1.out',
                onComplete: () => ripple.remove()
            });
        }

        // attach ripple to buttons with .ripple class
        document.querySelectorAll('.ripple').forEach(btn => btn.addEventListener('click', createRipple));

        /* ===========================
           Category hover micro-animations
           =========================== */
        gsap.utils.toArray('.card-premium').forEach(card => {
            card.addEventListener('pointerenter', () => gsap.to(card, {
                scale: 1.03,
                y: -6,
                duration: 0.35,
                ease: 'power2.out'
            }));
            card.addEventListener('pointerleave', () => gsap.to(card, {
                scale: 1,
                y: 0,
                duration: 0.35,
                ease: 'power2.out'
            }));
        });

        /* ===========================
           Small parallax on hero (subtle)
           =========================== */
        gallery.addEventListener('mousemove', (e) => {
            const rect = gallery.getBoundingClientRect();
            const px = (e.clientX - rect.left) / rect.width;
            // small skew transform for subtle parallax feel
            gsap.to(gallery, {
                xPercent: (0.5 - px) * 2,
                duration: 0.6,
                ease: 'power2.out'
            });
        });

        /* ===========================
           Utility: Kalkulator Premi
           =========================== */
        function hitungPremi() {
            const harga = parseFloat(document.getElementById('hargaMobil').value || 0);
            const jenis = document.getElementById('jenisAsuransi').value;
            const rate = jenis === 'comprehensive' ? 0.025 : 0.012;
            const premi = harga * rate;
            document.getElementById('hasilPremi').innerText = 'Perkiraan Premi: Rp ' + Math.round(premi).toLocaleString();
        }
        window.hitungPremi = hitungPremi;

        // initial entrance for gallery
        goToSlide(0);
    </script>
</body>

</html>
