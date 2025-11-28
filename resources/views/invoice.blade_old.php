{{-- <!doctype html>
<html lang="en" class="antialiased">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Portfolio 2025 — Tailwind + 3D Animations + Case Study</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#7c3aed',
                        accent: '#06b6d4'
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        }
    </script>

    <!-- model-viewer for 3D preview -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <!-- GSAP for timeline animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <!-- Simple 3D tilt library -->
    <script src="https://unpkg.com/vanilla-tilt@1.7.2/dist/vanilla-tilt.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        .card-3d {
            transform-style: preserve-3d;
            transition: transform .5s cubic-bezier(.2, .9, .2, 1), box-shadow .35s ease;
        }

        .card-3d:focus-within,
        .card-3d:hover {
            transform: translateY(-12px) rotateX(3deg);
            box-shadow: 0 28px 60px rgba(2, 6, 23, 0.45);
        }

        .focus-ring:focus {
            outline: 3px solid rgba(124, 58, 237, 0.18);
            outline-offset: 3px;
        }

        model-viewer {
            width: 100%;
            height: 100%;
        }

        .bg-wave {
            background-image: radial-gradient(ellipse at 20% 20%, rgba(124, 58, 237, 0.06), transparent 10%), radial-gradient(ellipse at 80% 80%, rgba(6, 182, 212, 0.03), transparent 12%);
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation: none !important;
                transition: none !important;
            }
        }

        /* Case study slider styles */
        .cs-slider {
            display: flex;
            gap: 24px;
            align-items: stretch;
        }

        .cs-slide {
            min-width: 680px;
            max-width: 680px;
            flex: 0 0 680px;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        }

        .cs-track {
            display: flex;
            align-items: stretch;
            transition: transform .6s cubic-bezier(.22, .9, .36, 1);
        }

        @media (max-width: 900px) {
            .cs-slide {
                min-width: 92%;
                max-width: 92%;
            }
        }
    </style>
</head>

<body class="bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 transition-colors duration-300">

    <!-- NAV -->
    <header
        class="fixed inset-x-0 top-0 z-50 backdrop-blur bg-white/60 dark:bg-slate-900/60 border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex items-center justify-between">
                <a href="#" class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-accent flex items-center justify-center text-white font-bold">
                        AP</div>
                    <span class="font-semibold">Ari Port</span>
                </a>
                <nav class="hidden md:flex items-center gap-6 text-sm">
                    <a href="#about" class="hover:text-primary">About</a>
                    <a href="#projects" class="hover:text-primary">Projects</a>
                    <a href="#case-study" class="hover:text-primary">Case Study</a>
                    <a href="#contact" class="hover:text-primary">Contact</a>
                    <button id="themeToggle" aria-label="Toggle theme"
                        class="p-2 rounded-md hover:bg-slate-100 dark:hover:bg-slate-800 focus-ring">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 3a9 9 0 100 18 9 9 0 000-18z" />
                        </svg>
                    </button>
                </nav>
                <div class="md:hidden">
                    <button id="mobileBtn"
                        class="p-2 rounded-md hover:bg-slate-100 dark:hover:bg-slate-800 focus-ring">☰</button>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-24">
        <!-- HERO -->
        <section class="relative overflow-hidden bg-wave">
            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6">
                    <p class="text-sm uppercase tracking-wide text-slate-500 dark:text-slate-400">UI/UX & 3D · Portfolio
                        2025</p>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-tight">I design interfaces with motion &
                        depth</h1>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-300 max-w-xl">Menggabungkan
                        micro-interactions, 3D preview, dan storytelling untuk memperkuat presentasi produk. Semua
                        dibangun responsive dengan Tailwind dan animasi GSAP.</p>
                    <div class="mt-6 flex gap-4">
                        <a href="#projects"
                            class="inline-flex items-center gap-3 bg-primary text-white px-5 py-3 rounded-lg shadow hover:opacity-95">See
                            work</a>
                        <a href="#contact" class="inline-flex items-center gap-3 px-5 py-3 rounded-lg border">Hire
                            me</a>
                    </div>
                </div>

                <!-- 3D model viewer -->
                <div class="lg:col-span-6 flex justify-center lg:justify-end">
                    <div class="w-[420px] h-[420px] card-3d rounded-3xl overflow-hidden bg-gradient-to-br from-slate-50 to-white dark:from-slate-800 dark:to-slate-900 shadow-2xl"
                        tabindex="0" id="modelWrap">
                        <model-viewer id="mv"
                            src="https://modelviewer.dev/shared-assets/models/RobotExpressive.glb" alt="3D preview"
                            camera-controls auto-rotate exposure="1" shadow-intensity="1" ar
                            ar-modes="webxr scene-viewer quick-look"></model-viewer>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects -->
        <section id="projects" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-2xl font-bold mb-6">Selected Projects</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="projectsGrid">
                <!-- sample cards -->
                <article
                    class="card-3d rounded-2xl overflow-hidden bg-white dark:bg-slate-800 border p-0 shadow-lg transform-gpu"
                    tabindex="0">
                    <div class="relative h-44 bg-gradient-to-br from-primary/10 to-accent/10">
                        <img src="https://picsum.photos/seed/portfolio1/800/600" alt="Project 1"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold">E‑commerce Redesign</h3>
                        <p class="text-sm mt-2 text-slate-600 dark:text-slate-300">Personalized storefront + 3D product
                            preview.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#case-study" class="text-sm text-primary hover:underline">Case study</a>
                            <button
                                class="px-3 py-2 rounded-md border text-sm hover:bg-slate-100 dark:hover:bg-slate-700">Preview</button>
                        </div>
                    </div>
                </article>

                <article
                    class="card-3d rounded-2xl overflow-hidden bg-white dark:bg-slate-800 border p-0 shadow-lg transform-gpu"
                    tabindex="0">
                    <div class="relative h-44 bg-gradient-to-br from-primary/10 to-accent/10">
                        <img src="https://picsum.photos/seed/portfolio2/800/600" alt="Project 2"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold">Travel App UI</h3>
                        <p class="text-sm mt-2 text-slate-600 dark:text-slate-300">Microinteractions & onboarding flows.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#case-study" class="text-sm text-primary hover:underline">Case study</a>
                            <button
                                class="px-3 py-2 rounded-md border text-sm hover:bg-slate-100 dark:hover:bg-slate-700">Preview</button>
                        </div>
                    </div>
                </article>

                <article
                    class="card-3d rounded-2xl overflow-hidden bg-white dark:bg-slate-800 border p-0 shadow-lg transform-gpu"
                    tabindex="0">
                    <div class="relative h-44 bg-gradient-to-br from-primary/10 to-accent/10">
                        <img src="https://picsum.photos/seed/portfolio3/800/600" alt="Project 3"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold">Dashboard Concept</h3>
                        <p class="text-sm mt-2 text-slate-600 dark:text-slate-300">Data viz + responsive layout
                            experiments.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#case-study" class="text-sm text-primary hover:underline">Case study</a>
                            <button
                                class="px-3 py-2 rounded-md border text-sm hover:bg-slate-100 dark:hover:bg-slate-700">Preview</button>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- CASE STUDY — slider + prototype embed -->
        <section id="case-study" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex items-start gap-8 lg:gap-12">
                <div class="w-full lg:w-2/3">
                    <h2 class="text-2xl font-bold">Case Study: E‑commerce Redesign</h2>
                    <p class="text-slate-600 dark:text-slate-300 mt-2 max-w-prose">Ringkasan: meningkatkan konversi
                        lewat personalisasi, optimasi checkout, dan tampilan produk 3D.
                    </p>

                    <!-- Slider container -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="cs-slider overflow-hidden">
                                <div class="cs-track" id="csTrack">
                                    <!-- Slide 1: Problem + hero image -->
                                    <div class="cs-slide shadow-lg">
                                        <div class="p-6">
                                            <h3 class="font-semibold text-lg">1. Problem</h3>
                                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Tingkat bounce
                                                tinggi pada halaman produk dan rendahnya konversi di mobile.</p>
                                            <div class="mt-4">
                                                <img src="/mnt/data/A_portfolio_website_for_a_UI/UX_designer_named_\"Jo.png"
                                                    alt="screenshot" class="w-full h-64 object-cover rounded-md" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 2: Research -->
                                    <div class="cs-slide shadow-lg">
                                        <div class="p-6">
                                            <h3 class="font-semibold text-lg">2. Research</h3>
                                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">User interview,
                                                heatmap, funnel analysis — ditemukan friction di checkout.</p>
                                            <ul
                                                class="mt-3 text-sm list-disc list-inside text-slate-600 dark:text-slate-300">
                                                <li>Pengguna bingung tentang varian produk</li>
                                                <li>Preview produk kurang meyakinkan</li>
                                                <li>Form checkout terlalu panjang</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Slide 3: Solution (prototype embed) -->
                                    <div class="cs-slide shadow-lg">
                                        <div class="p-6 flex flex-col h-full">
                                            <h3 class="font-semibold text-lg">3. Solution — Prototype</h3>
                                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Prototype
                                                interaktif (Figma / Embed) — klik untuk buka demo.</p>
                                            <div class="mt-4 rounded-lg overflow-hidden border" style="height:360px;">
                                                <!-- Prototype embed: if you have a Figma/Framer prototype URL, replace the src below -->
                                                <iframe id="protoFrame" src="https://www.figma.com/proto/placeholder"
                                                    class="w-full h-full" title="Prototype" frameborder="0"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <div class="mt-4 flex gap-3">
                                                <a href="#" id="openProto"
                                                    class="px-4 py-2 bg-primary text-white rounded-md">Open
                                                    prototype</a>
                                                <a href="#" id="downloadAssets"
                                                    class="px-4 py-2 border rounded-md">Download assets</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 4: Result & metrics -->
                                    <div class="cs-slide shadow-lg">
                                        <div class="p-6">
                                            <h3 class="font-semibold text-lg">4. Results</h3>
                                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Setelah
                                                implementasi: peningkatan konversi +15% dan penurunan bounce rate -22%
                                                pada mobile.</p>
                                            <div class="mt-4 grid grid-cols-2 gap-4">
                                                <div class="p-4 rounded-md bg-white dark:bg-slate-800 border">
                                                    Conversion +15%</div>
                                                <div class="p-4 rounded-md bg-white dark:bg-slate-800 border">Bounce
                                                    -22%</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Slider controls -->
                            <div class="mt-6 flex items-center gap-3">
                                <button id="prevCS" class="px-3 py-2 rounded-md border">Prev</button>
                                <button id="nextCS" class="px-3 py-2 rounded-md border">Next</button>
                                <div id="csDots" class="ml-4 flex items-center gap-2"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar: timeline & tools -->
                <aside class="hidden lg:block lg:w-1/3">
                    <div class="p-6 rounded-2xl border bg-white dark:bg-slate-800 shadow">
                        <h4 class="font-semibold">Timeline</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-300 mt-2">2 months — research, design,
                            handoff, small A/B tests.</p>
                        <h4 class="mt-4 font-semibold">Tools</h4>
                        <div class="mt-2 flex flex-wrap gap-2">
                            <span class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-700 text-sm">Figma</span>
                            <span class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-700 text-sm">Three.js</span>
                            <span class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-700 text-sm">GSAP</span>
                            <span class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-700 text-sm">Tailwind</span>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
            <h2 class="text-2xl font-bold mb-4">Let’s build something together</h2>
            <p class="text-slate-500 dark:text-slate-400 mb-6">Siap untuk proyek baru atau kolaborasi.</p>
            <a href="mailto:ari@mail.com" class="inline-block px-6 py-3 bg-primary text-white rounded-lg shadow">Email
                me</a>
        </section>

        <footer
            class="py-8 text-center text-sm text-slate-500 dark:text-slate-400 border-t border-slate-200 dark:border-slate-800">
            © 2025 Ari — UI/3D Portfolio</footer>
    </main>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="fixed inset-0 z-40 bg-black/40 hidden">
        <div class="absolute right-4 top-20 w-64 bg-white dark:bg-slate-800 rounded-lg p-4 shadow-lg">
            <nav class="flex flex-col gap-3">
                <a href="#about" class="py-2">About</a>
                <a href="#projects" class="py-2">Projects</a>
                <a href="#case-study" class="py-2">Case Study</a>
                <a href="#contact" class="py-2">Contact</a>
            </nav>
        </div>
    </div>

    <script>
        // Theme toggle
        const html = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) html.classList.add('dark');
        themeToggle?.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        // Mobile menu
        document.getElementById('mobileBtn')?.addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });

        // GSAP entrance
        window.addEventListener('load', () => {
            gsap.from('h1', {
                y: 20,
                opacity: 0,
                duration: .8,
                ease: 'power3.out'
            });
            gsap.from('#projectsGrid article', {
                y: 30,
                opacity: 0,
                duration: .8,
                stagger: .15,
                ease: 'power3.out',
                delay: .4
            });
        });

        // VanillaTilt for project cards
        VanillaTilt.init(document.querySelectorAll('#projectsGrid .card-3d'), {
            max: 12,
            speed: 600,
            glare: true,
            "max-glare": .12
        });

        // Case study slider logic
        (function() {
            const track = document.getElementById('csTrack');
            const slides = Array.from(track.children);
            const prev = document.getElementById('prevCS');
            const next = document.getElementById('nextCS');
            const dotsWrap = document.getElementById('csDots');
            let index = 0;

            // create dots
            slides.forEach((_, i) => {
                const dot = document.createElement('button');
                dot.className = 'w-2 h-2 rounded-full bg-slate-300 dark:bg-slate-600';
                dot.addEventListener('click', () => goTo(i));
                dotsWrap.appendChild(dot);
            });

            function updateDots() {
                Array.from(dotsWrap.children).forEach((d, i) => d.style.opacity = i === index ? '1' : '0.45');
            }

            function goTo(i) {
                index = (i + slides.length) % slides.length;
                const offset = -index * (slides[0].getBoundingClientRect().width + 24);
                track.style.transform = `translateX(${offset}px)`;
                updateDots();
            }

            prev.addEventListener('click', () => goTo(index - 1));
            next.addEventListener('click', () => goTo(index + 1));

            // init
            window.addEventListener('resize', () => goTo(index));
            goTo(0);
        })();

        // Open prototype (placeholder logic)
        document.getElementById('openProto').addEventListener('click', (e) => {
            e.preventDefault();
            const iframe = document.getElementById('protoFrame');
            const url = iframe.getAttribute('src');
            window.open(url, '_blank');
        });

        // Download assets (dummy)
        document.getElementById('downloadAssets').addEventListener('click', (e) => {
            e.preventDefault();
            alert('Download assets not configured in demo. Replace with server link.');
        });

        // Accessibility for model viewer focus
        const mv = document.getElementById('mv');
        const wrap = document.getElementById('modelWrap');
        wrap.addEventListener('focus', () => mv.style.transform = 'scale(1.01)');
        wrap.addEventListener('blur', () => mv.style.transform = 'scale(1)');
    </script>

    <!-- 3D SLIDER SECTION -->
    <section id="slider3d" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <h2 class="text-3xl font-extrabold text-center mb-12">3D Project Slider</h2>

        <div class="relative max-w-5xl mx-auto px-4">
            <div id="threeDSlider" class="flex gap-10 overflow-x-auto snap-x snap-mandatory pb-10">

                <!-- Slide 1 -->
                <div class="min-w-[320px] snap-center bg-slate-800 rounded-2xl p-6 shadow-xl slider-card" data-tilt
                    data-tilt-max="15" data-tilt-speed="400">
                    <model-viewer src="/mnt/data/A_portfolio_website_for_a_UI/UX_designer_named_jo_model.glb"
                        auto-rotate camera-controls class="w-full h-64 rounded-xl bg-black"></model-viewer>
                    <h3 class="mt-4 text-xl font-semibold">3D Portfolio Model</h3>
                    <p class="text-slate-400 text-sm mt-2">Interactive 3D showcase of UI/UX case studies.</p>
                </div>

                <!-- Slide 2 -->
                <div class="min-w-[320px] snap-center bg-slate-800 rounded-2xl p-6 shadow-xl slider-card" data-tilt
                    data-tilt-max="15" data-tilt-speed="400">
                    <img src="/mnt/data/A_portfolio_website_for_a_UI/UX_designer_named_\"Jo.png"
                        class="w-full h-64 object-cover rounded-xl" />
                    <h3 class="mt-4 text-xl font-semibold">High‑Fidelity Design</h3>
                    <p class="text-slate-400 text-sm mt-2">Immersive UI screens with motion interactions.</p>
                </div>

                <!-- Slide 3 -->
                <div class="min-w-[320px] snap-center bg-slate-800 rounded-2xl p-6 shadow-xl slider-card" data-tilt
                    data-tilt-max="15" data-tilt-speed="400">
                    <model-viewer src="https://modelviewer.dev/shared-assets/models/RobotExpressive.glb" auto-rotate
                        camera-controls class="w-full h-64 rounded-xl bg-black"></model-viewer>
                    <h3 class="mt-4 text-xl font-semibold">Motion Prototype</h3>
                    <p class="text-slate-400 text-sm mt-2">3D motion elements integrated with UI flows.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- VanillaTilt + Model Viewer -->
    <script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.2/dist/vanilla-tilt.min.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    <!-- AUTOPLAY + GSAP PARALLAX EFFECT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script>
        // === AUTOPLAY SLIDER ===
        const slider = document.getElementById('threeDSlider');
        let scrollAmount = 0;

        function autoSlide() {
            scrollAmount += 2;
            if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
                scrollAmount = 0;
            }
            slider.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
        setInterval(autoSlide, 60); // autoplay speed

        // === PARALLAX DEPTH ===
        slider.addEventListener('scroll', () => {
            const cards = document.querySelectorAll('.slider-card');
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const center = window.innerWidth / 2;
                const offset = (rect.left - center) * 0.05;
                card.style.transform = `rotateY(${offset}deg)`;
            });
        });

        // === GSAP TRANSITION ON ENTER ===
        gsap.from('.slider-card', {
            opacity: 0,
            y: 80,
            rotationX: 35,
            stagger: 0.2,
            duration: 1.2,
            ease: 'power3.out'
        });
    </script>

</body>

</html> --}}


<!-- Promo Slider -->
<!-- Promo Slider -->


<!doctype html>
<html lang="en">

<style>
#gallery {
    touch-action: pan-y;
    user-select: none;
    will-change: transform;
}
</style>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CekPremi Responsive</title>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- NAVBAR -->
    <nav class="flex items-center justify-between px-4 py-4 bg-white shadow">
        <img src="https://www.cekpremi.com/img/logo-revamp.svg" alt="logo" class="h-7" />
        <button class="text-3xl">☰</button>
    </nav>

    <section class="w-full overflow-hidden">
        <div class="relative w-full h-48 md:h-64 overflow-hidden">
            <div id="gallery" class="flex gap-0 overflow-hidden">
                <img src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250829/mobil.webp"
                    class="w-full h-full object-cover flex-shrink-0" />
                <img src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250829/motor.webp"
                    class="w-full h-full object-cover flex-shrink-0" />
                <img src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250630/properti.webp"
                    class="w-full h-full object-cover flex-shrink-0" />
            </div>

            <!-- Navigation (optional) -->
            <button id="prev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/50 px-3 py-2 rounded">
                ‹
            </button>
            <button id="next" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/50 px-3 py-2 rounded">
                ›
            </button>
        </div>
    </section>


    {{-- <!-- HERO TITLE -->
    <section class="text-center py-6 px-4">
        <h1 class="text-xl font-bold leading-snug md:text-3xl">
            Asuransi Terbaik di Indonesia, Cek dan Bandingkan Gratis!
        </h1>
    </section>

    <!-- BANNER -->
    <section class="px-4">
        <div class="rounded-xl overflow-hidden shadow-md">
            <img src="/mnt/data/6bbd4873-b0da-491e-af29-d7b833c0d7d8.png" class="w-full" />
        </div>
    </section> --}}

    <!-- SUBTITLE -->
    <section class="text-center mt-8 px-4">
        <h2 class="text-2xl font-bold">Membandingkan Asuransi Dengan Mudah, Murah, dan Terpercaya</h2>
        <p class="mt-2 text-gray-600">Premi Terjangkau dan Produk Lengkap</p>
    </section>



    <!-- CATEGORY GRID -->
    <section class="mt-8 px-4">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

            <div class="bg-white p-5 rounded-2xl shadow text-center">
                <div class="text-4xl mb-2">🚗</div>
                <h3 class="font-bold text-lg">Mobil</h3>
                <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 400.000</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow text-center">
                <div class="text-4xl mb-2">🛵</div>
                <h3 class="font-bold text-lg">Motor</h3>
                <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 90.000</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow text-center">
                <div class="text-4xl mb-2">✈️</div>
                <h3 class="font-bold text-lg">Perjalanan</h3>
                <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 50.000</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow text-center">
                <div class="text-4xl mb-2">🏠</div>
                <h3 class="font-bold text-lg">Properti</h3>
                <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 500.000</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow text-center">
                <div class="text-4xl mb-2">🧑‍⚕️</div>
                <h3 class="font-bold text-lg">Kesehatan</h3>
                <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 600.000</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow text-center">
                <div class="text-4xl mb-2">🛡️</div>
                <h3 class="font-bold text-lg">Lainnya</h3>
                <p class="mt-2 text-sm bg-blue-100 text-blue-600 rounded-full py-1">Mulai Dari 100.000</p>
            </div>

        </div>
    </section>

    <!-- SPECIAL OFFERS TITLE -->
    <section class="text-center mt-12 px-4">
        <h2 class="text-2xl font-bold">Penawaran Spesial Hanya Untukmu</h2>
    </section>

    <!-- Form Pencarian Premi -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold mb-6">Cari Premi Terbaik</h2>
            <div class="bg-white p-6 rounded-2xl shadow-md grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" placeholder="Jenis Asuransi" class="border p-3 rounded-lg w-full" />
                <input type="text" placeholder="Kota Domisili" class="border p-3 rounded-lg w-full" />
                <button class="bg-orange-500 text-white p-3 rounded-lg">Cari Sekarang</button>
            </div>
        </div>
    </section>

    <!-- Kalkulator Premi Interaktif -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-center mb-6">Kalkulator Premi Interaktif</h2>
            <div class="bg-gray-100 p-6 rounded-2xl shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input id="hargaMobil" type="number" placeholder="Harga Kendaraan" class="p-3 border rounded-lg" />
                    <select id="jenisAsuransi" class="p-3 border rounded-lg">
                        <option value="comprehensive">Comprehensive</option>
                        <option value="tlo">TLO</option>
                    </select>
                </div>
                <button onclick="hitungPremi()" class="mt-4 bg-blue-600 text-white p-3 rounded-lg w-full">Hitung
                    Premi</button>
                <p id="hasilPremi" class="mt-4 font-semibold text-lg text-center"></p>
            </div>
        </div>
    </section <!-- Kenapa Harus Cekpremi Section -->
    <section id="benefits" class="py-20 bg-white text-gray-900">
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




    <!-- 3 Langkah Mudah Beli Asuransi -->
    <section class="py-16 bg-white">
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

    <!-- FAQ + Accordion -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-center mb-10">FAQ</h2>
            <div class="space-y-4">
                <details class="bg-white p-4 rounded-xl shadow-md">
                    <summary class="font-semibold cursor-pointer">Apa itu Cekpremi?</summary>
                    <p class="mt-2 text-gray-600">Platform pembanding asuransi terbaik di Indonesia.</p>
                </details>
                <details class="bg-white p-4 rounded-xl shadow-md">
                    <summary class="font-semibold cursor-pointer">Apakah gratis digunakan?</summary>
                    <p class="mt-2 text-gray-600">Ya, sepenuhnya gratis untuk semua pengguna.</p>
                </details>
                <details class="bg-white p-4 rounded-xl shadow-md">
                    <summary class="font-semibold cursor-pointer">Bagaimana cara membeli asuransi?</summary>
                    <p class="mt-2 text-gray-600">Pilih produk, bandingkan, lalu beli langsung secara online.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- Carousel Promo Kedua -->
    {{-- <section class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-6">
            <div class="swiper promo2Swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img
                            src="https://b2c-id.oss-ap-southeast-5.aliyuncs.com/cekpremi-website/hero-image/250829/mobil.webp"
                            class="rounded-2xl w-full" /></div>
                    <div class="swiper-slide"><img src="/img/promo2-2.png" class="rounded-2xl w-full" /></div>
                    <div class="swiper-slide"><img src="/img/promo2-3.png" class="rounded-2xl w-full" /></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}

    <!-- Section Testimoni -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold mb-10">Apa Kata Mereka?</h2>

            <div class="overflow-hidden">
                <div class="testimoni-wrapper flex transition-all duration-500">
                    <div class="p-6 bg-gray-100 rounded-2xl shadow-md mx-3 w-full">
                        <p class="text-gray-700 italic">“Proses cepat dan mudah, sangat membantu.”</p>
                        <h4 class="mt-4 font-semibold">Budi – Jakarta</h4>
                    </div>
                    <div class="p-6 bg-gray-100 rounded-2xl shadow-md mx-3 w-full">
                        <p class="text-gray-700 italic">“Pilihan produk lengkap dan harganya terjangkau.”</p>
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



</body>

</html>



<!-- Footer Lengkap -->
<footer class="bg-slate-900 text-white py-14 mt-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">
        <div>
            <h3 class="font-bold text-lg mb-3">Cekpremi</h3>
            <p class="text-gray-300 text-sm">Portal pembanding asuransi terbaik & terpercaya di Indonesia.</p>
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



<!-- Dark Mode Toggle -->
<div class="fixed bottom-6 right-6">
    <button id="darkToggle" class="bg-black text-white p-4 rounded-full shadow-xl">🌓</button>
</div>
<script>
const html = document.documentElement;
document.getElementById('darkToggle').onclick = () => html.classList.toggle('dark');
</script>



<!-- Navbar Sticky + Animated Shadow -->


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
function hitungPremi() {
    const harga = parseFloat(document.getElementById('hargaMobil').value || 0);
    const jenis = document.getElementById('jenisAsuransi').value;
    const rate = jenis === 'comprehensive' ? 0.025 : 0.012;
    const premi = harga * rate;
    document.getElementById('hasilPremi').innerText = 'Perkiraan Premi: Rp ' + premi.toLocaleString();
}

// ============================
// 1) ANIMASI MASUK TIAP SECTION
// ============================
gsap.utils.toArray("section").forEach((sec, i) => {
    gsap.from(sec, {
        scrollTrigger: {
            trigger: sec,
            start: "top 85%",
            toggleActions: "play none none reverse"
        },
        opacity: 0,
        y: 60,
        duration: 1,
        ease: "power3.out",
        delay: i * 0.05
    });
});


// ============================
// 2) TESTIMONI AUTO SLIDE LOOP
// ============================
// const testi = document.querySelector(".testimoni-wrapper");
// const card = document.querySelectorAll(".testimoni-wrapper > div");
// let index = 0;

// function slideTesti() {
//     index = (index + 1) % card.length;
//     gsap.to(testi, {
//         x: -index * testi.clientWidth,
//         duration: 0.8,
//         ease: "power2.out"
//     });
// }

// setInterval(slideTesti, 2500);



gsap.registerPlugin(ScrollSmoother);
ScrollSmoother.create({
    wrapper: '#smooth-wrapper',
    content: '#smooth-content',
    smooth: 1.5
});

const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 20) navbar.classList.add('shadow-lg', 'bg-white/90', 'backdrop-blur-md');
    else navbar.classList.remove('shadow-lg', 'bg-white/90', 'backdrop-blur-md');
});
var promoSwiper = new Swiper('.promoSwiper', {
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
});

gsap.registerPlugin(ScrollTrigger);

const gallery = document.getElementById("gallery");
let current = 0;
const slides = gallery.children;
const total = slides.length;
const slideWidth = () => gallery.clientWidth;

function goToSlide(index) {
    current = gsap.utils.wrap(0, total, index);
    gsap.to(gallery, {
        x: -current * slideWidth(),
        duration: 0.6,
        ease: "power3.out"
    });
}

// Buttons
document.getElementById("next").onclick = () => goToSlide(current + 1);
document.getElementById("prev").onclick = () => goToSlide(current - 1);

// OBSERVE: SWIPE / DRAG
ScrollTrigger.observe({
    target: gallery,
    type: "touch,pointer",
    onPress() {
        this.startX = gsap.getProperty(gallery, "x");
    },
    onDrag(self) {
        gsap.set(gallery, {
            x: this.startX + self.deltaX
        });
    },
    onRelease(self) {
        if (Math.abs(self.deltaX) > 50) {
            goToSlide(current + (self.deltaX < 0 ? 1 : -1));
        } else {
            goToSlide(current);
        }
    },
    tolerance: 8
});

// Resize handling
window.addEventListener("resize", () => goToSlide(current));
</script>