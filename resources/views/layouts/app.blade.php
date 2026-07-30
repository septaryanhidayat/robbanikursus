<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }} - Belajar Seru, Prestasi Meraih!</title>
    <meta name="description" content="{{ $settings['hero_subheadline'] ?? 'Bimbingan belajar dan privat terpercaya untuk TK, SD, SMP, SMA di Indralaya Ogan Ilir.' }}">
    
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
    <div class="bg-amber-400 text-slate-900 text-xs sm:text-sm font-bold py-2 px-4 text-center flex justify-center items-center gap-2 shadow-inner">
        <span class="bg-red-600 text-white text-[10px] uppercase px-2 py-0.5 rounded-full font-black tracking-wider animate-pulse">TELAH DIBUKA!</span>
        <span>Pendaftaran Kursus & Privat Robbani Tahun Ajaran 2026/2027</span>
        <button @click="regModalOpen = true" class="underline hover:text-navy-900 ml-1 cursor-pointer font-extrabold">Daftar Online &rarr;</button>
    </div>

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-100 shadow-sm transition-all" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-900 via-indigo-900 to-amber-500 p-2 shadow-md group-hover:scale-105 transition-transform flex items-center justify-center text-white">
                    <!-- Book Star Logo SVG -->
                    <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-[#1E3A8B] block leading-none">ROBBANI</span>
                    <span class="text-xs font-bold text-slate-500 tracking-wider uppercase block">KURSUS & PRIVAT</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-700">
                <a href="#beranda" class="hover:text-[#1E3A8B] transition-colors py-2">Beranda</a>
                <a href="#keunggulan" class="hover:text-[#1E3A8B] transition-colors py-2">Keunggulan</a>
                <a href="#program" class="hover:text-[#1E3A8B] transition-colors py-2">Program & Mapel</a>
                <a href="#biaya" class="hover:text-[#1E3A8B] transition-colors py-2">Rincian Biaya</a>
                <a href="#berita" class="hover:text-[#1E3A8B] transition-colors py-2">Berita</a>
                <a href="#kontak" class="hover:text-[#1E3A8B] transition-colors py-2">Kontak</a>
            </nav>

            <!-- Actions -->
            <div class="hidden sm:flex items-center gap-3">
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
            <a href="#keunggulan" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Keunggulan</a>
            <a href="#program" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Program & Mapel</a>
            <a href="#biaya" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Rincian Biaya</a>
            <a href="#berita" @click="mobileMenuOpen = false" class="block font-semibold py-2 text-slate-700 border-b border-slate-100">Berita</a>
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
                    <div class="w-10 h-10 rounded-lg bg-amber-400 text-[#1E3A8B] flex items-center justify-center font-black text-xl">
                        R
                    </div>
                    <div>
                        <h3 class="text-xl font-extrabold tracking-wide">ROBBANI</h3>
                        <p class="text-xs text-blue-200 uppercase font-bold tracking-widest">Kursus & Privat</p>
                    </div>
                </div>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Tempat terbaik untuk membantu anak meraih prestasi, percaya diri, dan masa depan gemilang melalui bimbingan belajar berkualitas dan personal.
                </p>
                <div class="pt-2 flex gap-3">
                    <a href="https://instagram.com/{{ str_replace('@', '', $settings['contact_instagram'] ?? 'robbanikursus_privat') }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-400 hover:text-[#1E3A8B] transition flex items-center justify-center">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Program Quick Links -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-[#F59E0B]">Informasi Program</h4>
                <ul class="space-y-2 text-sm text-blue-100 font-medium">
                    <li><a href="#program" class="hover:text-white transition">✓ Bimbingan Reguler Semua Mapel</a></li>
                    <li><a href="#program" class="hover:text-white transition">✓ Kelas Tahsin & Tahfidz Al-Qur'an</a></li>
                    <li><a href="#program" class="hover:text-white transition">✓ Kursus Komputer Modern</a></li>
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
                        <span>{{ $settings['contact_address'] ?? 'Jl. Sarjana Blok A 25, Kel. Timbangan, Indralaya Utara Ogan Ilir' }}</span>
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
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold">
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
                        <input type="text" name="student_name" required placeholder="Contoh: Muhammad Rizky" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Orang Tua / Wali *</label>
                            <input type="text" name="parent_name" required placeholder="Contoh: Bapak Ahmad" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">No. HP / WhatsApp *</label>
                            <input type="text" name="phone_number" required placeholder="Contoh: 08123456789" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
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
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Pilih Mata Pelajaran (Opsional)</label>
                        <div class="grid grid-cols-2 gap-2 text-xs">
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
