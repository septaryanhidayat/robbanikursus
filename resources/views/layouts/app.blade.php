<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }} - Belajar Seru, Prestasi Meraih!</title>
    <meta name="description" content="{{ $settings['hero_subheadline'] ?? 'Bimbingan belajar dan privat terpercaya untuk TK, SD, SMP, SMA di Indralaya Ogan Ilir.' }}">
    
    @php
        $logoSetting = \App\Models\SiteSetting::getByKey('site_logo', 'images/logo.jpg');
        $cleanLogoSetting = ltrim(str_replace('\\', '/', $logoSetting), '/');
        $ogLogoUrl = file_exists(public_path($cleanLogoSetting)) ? asset($cleanLogoSetting) : asset('images/logo.jpg');
    @endphp

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ $ogLogoUrl }}">
    <link rel="shortcut icon" href="{{ $ogLogoUrl }}">
    <link rel="apple-touch-icon" href="{{ $ogLogoUrl }}">

    <!-- Open Graph / Facebook / WhatsApp / Social Share -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }} - Belajar Seru, Prestasi Meraih!">
    <meta property="og:description" content="{{ $settings['hero_subheadline'] ?? 'Bimbingan belajar dan privat terpercaya untuk TK, SD, SMP, SMA di Indralaya Ogan Ilir.' }}">
    <meta property="og:image" content="{{ $ogLogoUrl }}">
    <meta property="og:image:secure_url" content="{{ $ogLogoUrl }}">
    <meta property="og:image:type" content="image/jpeg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }} - Belajar Seru, Prestasi Meraih!">
    <meta name="twitter:description" content="{{ $settings['hero_subheadline'] ?? 'Bimbingan belajar dan privat terpercaya untuk TK, SD, SMP, SMA di Indralaya Ogan Ilir.' }}">
    <meta name="twitter:image" content="{{ $ogLogoUrl }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-800 flex flex-col min-h-screen font-sans" x-data="{ regModalOpen: false, modalProgramType: 'Kursus', modalLevel: 'SD/MI' }">

    <!-- Top Announcement Bar -->
    <div class="bg-amber-400 text-slate-900 text-xs sm:text-sm font-bold py-2.5 px-4 text-center flex flex-wrap justify-center items-center gap-2 shadow-inner">
        <span class="bg-red-600 text-white text-[10px] uppercase px-2.5 py-0.5 rounded-full font-black tracking-wider animate-pulse">
            {{ $settings['promo_badge'] ?? 'GRATIS BIAYA PENDAFTARAN!' }}
        </span>
        <span>Pendaftaran Kursus, Privat & Coding For Kids Robbani!</span>
        <button @click="regModalOpen = true" class="underline hover:text-navy-900 ml-1 cursor-pointer font-extrabold">Daftar Sekarang &rarr;</button>
    </div>

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm transition-all" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3 group shrink-0">
                <div class="h-12 w-auto max-w-[200px] flex items-center justify-center">
                    <x-site-logo class="h-12 w-auto max-w-full group-hover:scale-105 transition-transform" />
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-7 text-sm font-bold text-slate-700">
                <a href="#beranda" class="hover:text-[#1E3A8B] transition-colors py-2">Beranda</a>
                <a href="#coding" class="text-indigo-600 font-extrabold hover:text-[#1E3A8B] transition-colors py-2 flex items-center gap-1">
                    <span>💻</span> Coding For Kids
                </a>
                <a href="#keunggulan" class="hover:text-[#1E3A8B] transition-colors py-2">Keunggulan</a>
                <a href="#program" class="hover:text-[#1E3A8B] transition-colors py-2">Program & Mapel</a>
                <a href="#biaya" class="hover:text-[#1E3A8B] transition-colors py-2">Rincian Biaya</a>
                <a href="#kontak" class="hover:text-[#1E3A8B] transition-colors py-2">Kontak</a>
            </nav>

            <!-- Actions -->
            <div class="hidden sm:flex items-center gap-3 shrink-0">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-xs font-bold text-[#1E3A8B] bg-blue-50 hover:bg-blue-100 rounded-lg border border-blue-200 transition">
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('admin.login') }}" class="px-3 py-1.5 text-xs font-semibold text-slate-500 hover:text-[#1E3A8B]">
                        Login Staff
                    </a>
                @endauth

                <button @click="regModalOpen = true" class="px-5 py-2.5 bg-[#F59E0B] hover:bg-amber-600 text-slate-900 font-extrabold rounded-xl shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Daftar Sekarang
                </button>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden items-center gap-2">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-slate-700 hover:bg-slate-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-b border-slate-200 px-4 py-4 space-y-3">
            <a href="#beranda" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Beranda</a>
            <a href="#coding" @click="mobileMenuOpen = false" class="block font-extrabold py-2 text-indigo-600 border-b border-slate-100">💻 Coding For Kids</a>
            <a href="#keunggulan" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Keunggulan</a>
            <a href="#program" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Program & Mapel</a>
            <a href="#biaya" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Rincian Biaya</a>
            <a href="#kontak" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700">Kontak</a>
            <div class="pt-2 flex flex-col gap-2">
                <button @click="mobileMenuOpen = false; regModalOpen = true" class="w-full py-3 bg-[#F59E0B] text-slate-900 font-extrabold rounded-xl shadow text-center">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="kontak" class="bg-[#1E3A8B] text-white pt-16 pb-12 border-t-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Brand Info -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="bg-white p-2 rounded-xl shadow-md inline-block">
                        <x-site-logo class="h-10 w-auto max-w-[180px]" />
                    </div>
                </div>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Tempat terbaik untuk membantu anak meraih prestasi, percaya diri, dan masa depan gemilang melalui bimbingan belajar berkualitas dan privat personal.
                </p>
                <div class="pt-2 flex items-center gap-3">
                    <!-- Instagram -->
                    <a href="https://instagram.com/{{ str_replace('@', '', $settings['contact_instagram'] ?? 'robbanikursus_privat') }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-400 hover:text-[#1E3A8B] transition flex items-center justify-center">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="https://facebook.com" target="_blank" class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-400 hover:text-[#1E3A8B] transition flex items-center justify-center">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Program Quick Links -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-[#F59E0B]">Informasi Program</h4>
                <ul class="space-y-2 text-sm text-blue-100 font-medium">
                    <li><a href="#coding" class="hover:text-white transition font-bold text-amber-300">✓ Coding For Kids (SD, SMP, SMA)</a></li>
                    <li><a href="#program" class="hover:text-white transition">✓ Bimbingan Reguler Semua Mapel</a></li>
                    <li><a href="#program" class="hover:text-white transition">✓ Kelas Tahsin & Tahfidz Al-Qur'an</a></li>
                    <li><a href="#biaya" class="hover:text-white transition">✓ Guru Privat datang ke Rumah</a></li>
                    <li><a href="#keunggulan" class="hover:text-white transition">✓ Pendampingan Belajar Personal</a></li>
                </ul>
            </div>

            <!-- Contact & Location Info -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-[#F59E0B]">Informasi & Pendaftaran</h4>
                <ul class="space-y-3 text-sm text-blue-100">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $settings['contact_address'] ?? 'Kantor Robbani Kursus & Privat, Jl. Sarjana Blok A No. 25 Timbangan, Ogan Ilir' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="font-bold">{{ $settings['contact_phone'] ?? '0812-7221-8275' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        <span>Instagram: {{ $settings['contact_instagram'] ?? '@robbanikursus_privat' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        <span>FB: {{ $settings['contact_facebook'] ?? 'Robbani Kursus & Privat' }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-blue-900/60 text-center text-xs text-blue-300">
            <p>&copy; {{ date('Y') }} {{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Online Registration Modal -->
    <div x-show="regModalOpen" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" x-cloak>
        <div class="min-h-screen px-4 text-center flex items-center justify-center">
            <div @click="regModalOpen = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

            <div class="inline-block w-full max-w-lg p-6 sm:p-8 my-8 text-left align-middle transition-all transform bg-white shadow-2xl rounded-3xl relative z-10 border border-slate-100">
                <button @click="regModalOpen = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl">
                        📝
                    </div>
                    <div>
                        <h3 class="text-xl font-extrabold text-[#1E3A8B]">Form Pendaftaran Online</h3>
                        <p class="text-xs text-slate-500">Isi formulir di bawah ini untuk pendaftaran langsung via WhatsApp.</p>
                    </div>
                </div>

                <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Siswa *</label>
                        <input type="text" name="student_name" required placeholder="Contoh: Fathan Alghifari" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Orang Tua / Wali *</label>
                            <input type="text" name="parent_name" required placeholder="Contoh: Ibu Rahmawati" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">No. HP / WhatsApp *</label>
                            <input type="text" name="phone_number" required placeholder="Contoh: 081272218275" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jenjang Pendidikan *</label>
                            <select name="education_level" x-model="modalLevel" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm bg-white">
                                <option value="TK/PAUD">TK / PAUD</option>
                                <option value="SD/MI">SD / MI</option>
                                <option value="SMP/MTS">SMP / MTS</option>
                                <option value="SMA/MA">SMA / MA</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tipe Program *</label>
                            <select name="program_type" x-model="modalProgramType" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm bg-white">
                                <option value="Kursus">Kursus (Reguler)</option>
                                <option value="Privat">Privat (Di Rumah)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Pilih Program / Mata Pelajaran</label>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <label class="flex items-center gap-2 p-2 rounded-lg border border-indigo-200 bg-indigo-50/50 hover:bg-indigo-100 cursor-pointer col-span-2 font-bold text-indigo-900">
                                <input type="checkbox" name="selected_subjects[]" value="Coding For Kids" checked class="rounded text-indigo-600">
                                <span>💻 Coding For Kids</span>
                            </label>
                            <label class="flex items-center gap-2 p-2 rounded-lg border border-slate-100 hover:bg-slate-50 cursor-pointer">
                                <input type="checkbox" name="selected_subjects[]" value="Calistung" class="rounded text-[#1E3A8B]">
                                <span>Calistung</span>
                            </label>
                            <label class="flex items-center gap-2 p-2 rounded-lg border border-slate-100 hover:bg-slate-50 cursor-pointer">
                                <input type="checkbox" name="selected_subjects[]" value="Matematika" class="rounded text-[#1E3A8B]">
                                <span>Matematika</span>
                            </label>
                            <label class="flex items-center gap-2 p-2 rounded-lg border border-slate-100 hover:bg-slate-50 cursor-pointer">
                                <input type="checkbox" name="selected_subjects[]" value="Bahasa Inggris" class="rounded text-[#1E3A8B]">
                                <span>Bahasa Inggris</span>
                            </label>
                            <label class="flex items-center gap-2 p-2 rounded-lg border border-slate-100 hover:bg-slate-50 cursor-pointer">
                                <input type="checkbox" name="selected_subjects[]" value="Tahsin & Tahfidz" class="rounded text-[#1E3A8B]">
                                <span>Tahsin & Tahfidz</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Alamat Singkat</label>
                        <textarea name="address" rows="2" placeholder="Alamat rumah / domisili" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold rounded-2xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 text-base cursor-pointer">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                        Kirim & Konfirmasi WA
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
