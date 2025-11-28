<!doctype html>
<html lang="id" class="antialiased">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CekPremi — Demo with FAQ & AI Claim Chat</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- GSAP (dipakai untuk animasi kecil) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Observer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <style>
        /* small helper styles */
        .fade-sec {
            opacity: 0;
            transform: translateY(30px);
        }

        /* chat UI */
        #chatWidget {
            width: 360px;
            max-width: calc(100vw - 32px);
        }

        .chat-bubble {
            max-width: 78%;
            padding: .6rem .9rem;
            border-radius: 16px;
            display: inline-block;
        }

        .chat-user {
            background: #f97316;
            color: white;
            border-bottom-right-radius: 4px;
        }

        .chat-ai {
            background: #f3f4f6;
            color: #111827;
            border-bottom-left-radius: 4px;
        }

        /* drag cursor */
        .draggable {
            cursor: move;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* file preview */
        .img-preview {
            max-width: 100%;
            border-radius: 8px;
            display: block;
            margin-top: .5rem;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- ======= NAVBAR (simple) ======= -->
    <header class="fixed inset-x-0 top-0 z-40 bg-white/80 backdrop-blur border-b">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://www.cekpremi.com/img/logo-revamp.svg" alt="cekpremi" class="h-7" />
                {{-- <span class="font-semibold text-lg">cekpremi</span> --}}
            </div>
            <div class="flex items-center gap-3">
                <button id="openChatBtn" class="hidden md:inline px-4 py-2 bg-orange-500 text-white rounded-lg">Butuh
                    Klaim? Chat AI</button>
                <button id="mobileMenuBtn" class="md:hidden px-3 py-2 rounded-lg">☰</button>
            </div>
        </div>
    </header>

    {{-- <div class="pt-20"></div> --}}

    <main class="max-w-6xl mx-auto px-4">

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

        <!-- CATEGORY GRID (kept short) -->
        <section class="mt-8 px-4 fade-sec">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="p-5 rounded-2xl bg-white shadow text-center">🚗 <h3>Mobil</h3>
                </div>
                <div class="p-5 rounded-2xl bg-white shadow text-center">🛵 <h3>Motor</h3>
                </div>
                <div class="p-5 rounded-2xl bg-white shadow text-center">🏠 <h3>Properti</h3>
                </div>
            </div>
        </section>

        <!-- ===== FAQ with search & accordion ===== -->
        <section id="faqSection" class="py-12 fade-sec">
            <div class="max-w-3xl mx-auto">
                <h3 class="text-2xl font-bold text-center mb-4">FAQ • Pertanyaan Umum</h3>

                <div class="mb-4">
                    <input id="faqSearch" type="search" placeholder="Cari pertanyaan..."
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none" />
                </div>

                <div id="faqList" class="space-y-3">
                    <div class="faq-item border rounded-lg overflow-hidden">
                        <button class="faq-head w-full text-left px-4 py-3 flex justify-between items-center bg-white">
                            <span class="font-semibold">Bagaimana cara klaim asuransi mobil?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-body px-4 py-3 bg-gray-50 hidden">
                            Lengkapi dokumen: KTP, STNK, Foto Kerusakan & Kronologi. Upload melalui portal klaim atau
                            chat ke CS.
                        </div>
                    </div>

                    <div class="faq-item border rounded-lg overflow-hidden">
                        <button class="faq-head w-full text-left px-4 py-3 flex justify-between items-center bg-white">
                            <span class="font-semibold">Berapa lama proses klaim?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-body px-4 py-3 bg-gray-50 hidden">
                            Estimasi 1–7 hari kerja tergantung kelengkapan dokumen dan jenis klaim.
                        </div>
                    </div>

                    <div class="faq-item border rounded-lg overflow-hidden">
                        <button class="faq-head w-full text-left px-4 py-3 flex justify-between items-center bg-white">
                            <span class="font-semibold">Apa perbedaan Comprehensive dan TLO?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-body px-4 py-3 bg-gray-50 hidden">
                            Comprehensive menanggung kerusakan sebagian & total; TLO hanya untuk kerusakan total /
                            kehilangan.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- small footer placeholder -->
        <section class="py-12 text-center text-sm text-gray-500">
            © 2025 Cekpremi — Demo
        </section>
    </main>

    <!-- ========== Chat AI Claim Widget (floating) ========== -->
    <!-- Button (mobile & desktop) -->
    <button id="fabOpen" title="Butuh klaim? Chat AI"
        class="fixed z-50 bottom-6 right-6 bg-orange-500 text-white rounded-full p-3 shadow-xl md:hidden">
        💬
    </button>

    <!-- Chat window -->
    <div id="chatWidget"
        class="hidden fixed z-50 bottom-6 right-6 md:bottom-8 md:right-8 bg-white rounded-2xl shadow-2xl w-11/12 max-w-[380px]">
        <!-- header -->
        <div id="chatHeader"
            class="draggable bg-orange-500 text-white px-4 py-3 rounded-t-2xl flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="rounded-full bg-white/20 w-9 h-9 flex items-center justify-center">🤖</div>
                <div>
                    <div class="font-semibold">AI Claim Assistant</div>
                    <div class="text-xs opacity-90">Bantuan klaim cepat & panduan</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button id="minimizeChat" class="text-white/90">—</button>
                <button id="closeChat" class="text-white/90">✕</button>
            </div>
        </div>

        <!-- body -->
        <div id="chatBody" class="px-4 py-3 h-72 overflow-y-auto bg-gray-50">
            <div id="messages" class="space-y-3">
                <div class="chat-ai chat-bubble">Halo! Saya AI Claim Assistant. Mau saya bantu proses klaim atau cek
                    dokumen?</div>
            </div>
        </div>

        <!-- attachments & input -->
        <div class="px-3 py-3 border-t bg-white flex gap-2 items-center">
            <label class="cursor-pointer text-sm text-gray-600">
                <input id="fileInput" type="file" accept="image/*" class="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v4a1 1 0 001 1h3m10 0h3a1 1 0 001-1V7m-7 8V3m0 0L7 9m10-6l-10 6" />
                </svg>
            </label>

            <input id="chatInput" type="text" placeholder="Tulis pertanyaan tentang klaim..."
                class="flex-1 px-3 py-2 rounded-md border focus:outline-none" />

            <button id="sendBtn" class="bg-orange-500 text-white px-4 py-2 rounded-md">Kirim</button>
        </div>

        <!-- file preview area (hidden) -->
        <div id="filePreviewWrap" class="px-3 py-2 hidden bg-white border-t">
            <img id="filePreview" class="img-preview" src="" alt="preview">
        </div>

        <!-- helper footer -->
        <div class="px-3 py-2 text-xs text-gray-500">Kamu bisa upload foto kerusakan (opsional). Tidak diupload kecuali
            kamu tekan 'Kirim ke CS'.</div>
    </div>

    <!-- ======= Scripts ======= -->
    <script>
        /* ---------- Helpers & Animations ---------- */
        gsap.registerPlugin(Observer, ScrollTrigger);

        /* entrance fade for .fade-sec */
        gsap.utils.toArray('.fade-sec').forEach((el, i) => {
            gsap.to(el, {
                opacity: 1,
                y: 0,
                duration: 0.9,
                delay: i * 0.06,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%'
                }
            });
        });

        /* ---------- HERO SLIDER (basic) ---------- */
        const gallery = document.getElementById('gallery');
        const slides = gallery.children;
        let active = 0;

        function updateGallery() {
            gallery.style.transform = `translateX(-${active * gallery.clientWidth}px)`;
        }
        document.getElementById('next').addEventListener('click', () => {
            active = (active + 1) % slides.length;
            updateGallery();
        });
        document.getElementById('prev').addEventListener('click', () => {
            active = (active - 1 + slides.length) % slides.length;
            updateGallery();
        });
        window.addEventListener('resize', updateGallery);
        updateGallery();

        /* touch swipe using simple pointer events */
        let startX = 0,
            currentX = 0,
            dragging = false;
        gallery.addEventListener('pointerdown', (e) => {
            startX = e.clientX;
            dragging = true;
            gallery.setPointerCapture(e.pointerId);
        });
        gallery.addEventListener('pointermove', (e) => {
            if (!dragging) return;
            currentX = e.clientX;
            const diff = currentX - startX;
            gallery.style.transform = `translateX(${ -active*gallery.clientWidth + diff }px)`;
        });
        gallery.addEventListener('pointerup', (e) => {
            dragging = false;
            const diff = currentX - startX;
            if (Math.abs(diff) > gallery.clientWidth * 0.12) {
                active = diff < 0 ? active + 1 : active - 1;
                active = (active + slides.length) % slides.length;
            }
            updateGallery();
        });

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

        /* ---------- Chat AI Widget logic (client-only rules) ---------- */
        const fabOpen = document.getElementById('fabOpen');
        const chatWidget = document.getElementById('chatWidget');
        const openChatBtn = document.getElementById('openChatBtn');
        const closeChat = document.getElementById('closeChat');
        const minimizeChat = document.getElementById('minimizeChat');
        const messages = document.getElementById('messages');
        const chatInput = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendBtn');
        const fileInput = document.getElementById('fileInput');
        const filePreviewWrap = document.getElementById('filePreviewWrap');
        const filePreview = document.getElementById('filePreview');

        function showChat() {
            chatWidget.classList.remove('hidden');
            fabOpen.classList.add('hidden');
            openChatBtn?.classList?.add('hidden');
        }

        function hideChat() {
            chatWidget.classList.add('hidden');
            fabOpen.classList.remove('hidden');
            openChatBtn?.classList?.remove('hidden');
        }

        fabOpen.addEventListener('click', showChat);
        openChatBtn?.addEventListener('click', showChat);
        closeChat.addEventListener('click', (e) => {
            e.stopPropagation(); // Tambahkan ini
            hideChat();
        });
        // minimizeChat.addEventListener('click', () => {
        //     // simple minimize -> collapse body
        //     const body = document.getElementById('chatBody');
        //     if (body.style.display === 'none') {
        //         body.style.display = 'block';
        //         document.getElementById('filePreviewWrap').style.display = 'none';
        //     } else {
        //         body.style.display = 'none';
        //         document.getElementById('filePreviewWrap').style.display = 'none';
        //     }
        // });

        minimizeChat.addEventListener('click', (e) => {
            e.stopPropagation(); // Tambahkan ini
            let body = document.getElementById('chatBody');
            let inputWrap = chatWidget.querySelector("div.border-t");
            let footer = chatWidget.querySelector(".text-xs");

            if (body.style.display !== "none") {
                body.style.display = "none";
                inputWrap.style.display = "none";
                footer.style.display = "none";
                minimizeChat.textContent = "▢";
            } else {
                body.style.display = "block";
                inputWrap.style.display = "flex";
                footer.style.display = "block";
                minimizeChat.textContent = "—";
            }
        });

        /* draggable header */
        /* === FIX — draggable chat widget === */
        (function enableDrag() {
            const header = document.getElementById('chatHeader');
            const widget = document.getElementById('chatWidget');

            let dragging = false,
                offsetX = 0,
                offsetY = 0;

            header.addEventListener('pointerdown', (e) => {
                dragging = true;
                const rect = widget.getBoundingClientRect();
                offsetX = e.clientX - rect.left;
                offsetY = e.clientY - rect.top;
                header.setPointerCapture(e.pointerId);
            });

            header.addEventListener('pointermove', (e) => {
                if (!dragging) return;
                widget.style.left = (e.clientX - offsetX) + "px";
                widget.style.top = (e.clientY - offsetY) + "px";
                widget.style.position = "fixed"; // wajib agar bisa di-drag
            });

            header.addEventListener('pointerup', () => {
                dragging = false;
            });
        })();


        /* add message helper */
        function addMessage(from, text, img = null) {
            const wrap = document.createElement('div');
            wrap.className = from === 'user' ? 'text-right' : 'text-left';
            const bubble = document.createElement('div');
            bubble.className = 'inline-block chat-bubble ' + (from === 'user' ? 'chat-user' : 'chat-ai');
            if (img) {
                const im = document.createElement('img');
                im.src = img;
                im.className = 'img-preview';
                bubble.appendChild(im);
            }
            const p = document.createElement('div');
            p.innerText = text;
            bubble.appendChild(p);
            wrap.appendChild(bubble);
            messages.appendChild(wrap);
            messages.scrollTop = messages.scrollHeight;
        }

        /* simple rule-based AI reply (replaceable with real API) */
        function aiReply(userText) {
            const q = userText.toLowerCase();
            if (q.includes('klaim') || q.includes('claim')) {
                addMessage('ai',
                    'Untuk klaim, siapkan: KTP, STNK, foto kerusakan, dan kronologi. Mau saya pandu langkah per langkah?'
                );
            } else if (q.includes('biaya') || q.includes('harga') || q.includes('premi')) {
                addMessage('ai', 'Estimasi premi tergantung nilai kendaraan. Coba gunakan kalkulator di halaman utama.');
            } else if (q.includes('dokumen') || q.includes('dokumen apa')) {
                addMessage('ai', 'Dokumen umum: KTP, STNK, Foto Kerusakan, Lampiran Polisi (jika ada).');
            } else if (q.includes('cs') || q.includes('orang')) {
                addMessage('ai', 'Saya bisa menghubungkanmu ke CS. Mau dikirim via WhatsApp atau minta telepon?');
            } else {
                addMessage('ai',
                    'Terima kasih. Untuk bantuan klaim, ketik "klaim" atau "dokumen". Jika perlu, kirim foto kerusakan.'
                );
            }
        }

        /* send button */
        sendBtn.addEventListener('click', () => {
            const txt = chatInput.value.trim();
            if (!txt && !filePreview.src) return;
            if (txt) {
                addMessage('user', txt);
                chatInput.value = '';
            }
            // if there's an image preview, include it as part of message
            const imgSrc = filePreview.src || null;
            if (imgSrc) {
                addMessage('user', 'Foto dikirim (preview)', imgSrc);
                // hide preview after "send" - in real flow you'd upload to server then attach URL
                filePreview.src = '';
                filePreviewWrap.classList.add('hidden');
                filePreviewWrap.style.display = 'none';
            }
            // simulate thinking
            setTimeout(() => aiReply(txt || 'foto'), 700);
        });

        /* Enter key to send */
        chatInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                sendBtn.click();
            }
        });

        /* file input preview */
        fileInput.addEventListener('change', (e) => {
            const f = e.target.files[0];
            if (!f) return;
            const reader = new FileReader();
            reader.onload = (ev) => {
                filePreview.src = ev.target.result;
                filePreviewWrap.classList.remove('hidden');
                filePreviewWrap.style.display = 'block';
            };
            reader.readAsDataURL(f);
        });

        /* optional: connect to real AI endpoint (commented placeholder)
        function callOpenAI(prompt) {
          return fetch('/api/openai', { method:'POST', body: JSON.stringify({prompt}), headers:{'Content-Type':'application/json'} })
            .then(r=>r.json());
        }
        */

        /* ---------- small UX: show full chat on desktop by default ---------- */
        if (window.innerWidth >= 768) {
            showChat();
        }

        /* preserve chat on reload? (simple) */
        window.addEventListener('beforeunload', () => {
            // optionally save to localStorage
        });
    </script>

</body>

</html>
