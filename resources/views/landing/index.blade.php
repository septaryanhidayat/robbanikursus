@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="beranda" class="relative overflow-hidden bg-gradient-to-br from-[#1E3A8B] via-[#1e40af] to-sky-700 text-white pt-12 pb-20 lg:pt-20 lg:pb-28">
    <!-- Decorative background elements -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-amber-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-sky-400/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Text -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full border border-white/20 text-xs sm:text-sm font-bold text-amber-300">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-ping"></span>
                    <span>{{ $settings['promo_badge'] ?? 'GRATIS BIAYA PENDAFTARAN!' }}</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-tight uppercase">
                    {{ $settings['hero_headline'] ?? 'PENDAFTARAN ROBBANI KURSUS & PRIVAT TELAH DIBUKA!' }}
                </h1>

                <p class="text-base sm:text-xl text-blue-100 font-medium leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ $settings['hero_subheadline'] ?? 'Menyediakan bimbingan belajar terlengkap (TK, SD, SMP, SMA) dan program spesial Coding For Kids. Pengajar berpengalaman dan jadwal yang fleksibel.' }}
                </p>

                <!-- Hero Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <button @click="regModalOpen = true" class="w-full sm:w-auto px-8 py-4 bg-[#F59E0B] hover:bg-amber-500 text-slate-900 text-base font-black rounded-2xl shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3 cursor-pointer">
                        <span>DAFTAR SEKARANG</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>

                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_phone'] ?? '081272218275') }}?text={{ urlencode('Halo Robbani Kursus & Privat, saya ingin konsultasi mengenai program belajar anak.') }}" target="_blank" class="w-full sm:w-auto px-7 py-4 bg-emerald-500 hover:bg-emerald-600 text-white text-base font-extrabold rounded-2xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-3">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                        <span>TANYA PROGRAM (WA)</span>
                    </a>
                </div>

                <!-- Level Badges -->
                <div class="pt-6 flex flex-wrap items-center justify-center lg:justify-start gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-blue-200 mr-2">Jenjang:</span>
                    <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-extrabold text-white">TK / PAUD</span>
                    <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-extrabold text-white">SD / MI</span>
                    <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-extrabold text-white">SMP / MTS</span>
                    <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-extrabold text-white">SMA / MA</span>
                    <span class="px-3 py-1 bg-amber-400 text-slate-900 rounded-full text-xs font-black">💻 CODING FOR KIDS</span>
                </div>
            </div>

            <!-- Right Visual Banner Card with 3D Kids Illustration -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-md bg-white text-slate-900 rounded-3xl p-5 sm:p-6 shadow-2xl border-4 border-amber-400 transform lg:rotate-1 hover:rotate-0 transition-transform">
                    <div class="absolute -top-5 -right-5 bg-red-600 text-white font-black text-xs uppercase px-4 py-1.5 rounded-full shadow-lg border-2 border-white tracking-widest animate-bounce z-20">
                        SPECIAL PROMO
                    </div>

                    <!-- 3D Hero Image -->
                    <div class="rounded-2xl overflow-hidden mb-4 border-2 border-slate-100 shadow-inner bg-slate-100">
                        <img src="{{ asset('images/hero-kids-3d.png') }}" alt="Anak Indonesia Ceria 3D" class="w-full h-56 object-cover hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="text-center space-y-3">
                        <div class="inline-block bg-indigo-100 text-indigo-900 font-extrabold text-xs px-3 py-1 rounded-full uppercase">
                            💻 CODING FOR KIDS & REGULER
                        </div>
                        <h2 class="text-xl font-black text-[#1E3A8B] leading-tight">
                            Belajar Seru & Meraih Masa Depan Gemilang!
                        </h2>

                        <!-- Feature List in Card -->
                        <div class="bg-slate-50 rounded-2xl p-3.5 text-left space-y-2 text-xs font-bold text-slate-700">
                            <div class="flex items-center gap-2">
                                <span class="text-emerald-500 font-extrabold text-base">✓</span>
                                <span>Tutor Berpengalaman & Sabar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-emerald-500 font-extrabold text-base">✓</span>
                                <span>Bebas Pilih Mata Pelajaran / Coding</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-emerald-500 font-extrabold text-base">✓</span>
                                <span>Privat 1 Siswa 1 Tutor Di Rumah</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-emerald-500 font-extrabold text-base">✓</span>
                                <span>GRATIS Biaya Pendaftaran!</span>
                            </div>
                        </div>

                        <div class="pt-1">
                            <button @click="regModalOpen = true" class="w-full py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-xl shadow-md transition text-sm flex items-center justify-center gap-2">
                                🌟 Konsultasi & Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Dedicated Coding For Kids Section (Banner 1 Details with 3D Coding Illustration) -->
<section id="coding" class="py-20 bg-gradient-to-br from-indigo-900 via-blue-900 to-slate-900 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center mb-16">
            <div class="lg:col-span-7 space-y-4">
                <div class="inline-flex items-center gap-2 bg-amber-400 text-slate-900 px-4 py-1.5 rounded-full font-black text-xs uppercase tracking-widest shadow-md">
                    <span>⚡ PROGRAM SPESIAL UNGGULAN</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                    💻 CODING FOR KIDS
                </h2>
                <p class="text-amber-300 font-extrabold text-lg sm:text-xl">
                    Tingkat SD - SMP - SMA
                </p>
                <p class="text-blue-100 text-sm sm:text-base leading-relaxed">
                    Persiapkan masa depan emas putra-putri Anda dengan keterampilan pemrograman komputer, logika, game, dan teknologi digital sejak dini dalam suasana belajar yang menyenangkan!
                </p>
                <div class="pt-2 flex items-center gap-3">
                    <span class="px-3.5 py-1.5 bg-red-600 text-white rounded-full text-xs font-black uppercase tracking-wider animate-pulse">
                        GRATIS BIAYA PENDAFTARAN!
                    </span>
                    <span class="px-3.5 py-1.5 bg-amber-400 text-slate-900 rounded-full text-xs font-black uppercase tracking-wider">
                        KUOTA TERBATAS!
                    </span>
                </div>
            </div>

            <!-- 3D Coding Image Illustration -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative rounded-3xl overflow-hidden border-4 border-amber-400 shadow-2xl bg-slate-800 transform hover:scale-105 transition-transform duration-500">
                    <img src="{{ asset('images/coding-kids-3d.png') }}" alt="Coding For Kids 3D Illustration" class="w-full h-72 sm:h-80 object-cover">
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950 via-slate-900/80 to-transparent p-4 text-center">
                        <span class="text-amber-300 text-xs font-extrabold uppercase tracking-wider">Belajar Coding Seru bersama Robot Helper 3D</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner 1 Comparison Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            
            <!-- Kelas Reguler Coding -->
            <div class="bg-white text-slate-900 rounded-3xl p-8 border-4 border-blue-500 shadow-2xl flex flex-col justify-between relative transform hover:-translate-y-1 transition-transform">
                <div class="absolute -top-4 left-6 bg-blue-600 text-white font-black text-xs uppercase px-4 py-1 rounded-full shadow">
                    KELAS REGULER
                </div>
                <div>
                    <h3 class="text-2xl font-black text-[#1E3A8B] mt-2 mb-1">Belajar Coding bersama teman!</h3>
                    <p class="text-xs text-slate-500 font-semibold mb-6">Interaksi seru & diskusi kelompok kecil.</p>

                    <div class="space-y-3 text-sm font-semibold text-slate-700 mb-8 bg-blue-50/60 p-5 rounded-2xl">
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600 text-lg">📅</span>
                            <span><strong>4x Pertemuan</strong> setiap bulan</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600 text-lg">⏰</span>
                            <span>Durasi <strong>90 menit</strong> per pertemuan</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600 text-lg">👥</span>
                            <span><strong>1 Kelas 3–5 Orang</strong> (Kelompok Kecil)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600 text-lg">💻</span>
                            <span>Membawa Laptop Sendiri</span>
                        </div>
                    </div>

                    <div class="text-center p-4 bg-slate-50 rounded-2xl border border-slate-200 mb-6">
                        <span class="text-xs font-bold text-slate-400 block uppercase">Biaya Kursus Reguler</span>
                        <div class="flex items-center justify-center gap-3 mt-1">
                            <span class="line-through text-slate-400 font-bold text-lg">400rb</span>
                            <span class="text-3xl sm:text-4xl font-black text-blue-700">250rb</span>
                            <span class="text-xs text-slate-600 font-bold">/bulan</span>
                        </div>
                        <span class="text-[11px] text-red-500 font-bold block mt-1">*Kelas Selanjutnya harga naik</span>
                    </div>
                </div>

                <button @click="regModalOpen = true; modalProgramType = 'Kursus'" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl shadow-lg transition text-center cursor-pointer">
                    Daftar Kelas Reguler Coding &rarr;
                </button>
            </div>

            <!-- Les Private Coding -->
            <div class="bg-white text-slate-900 rounded-3xl p-8 border-4 border-amber-400 shadow-2xl flex flex-col justify-between relative transform hover:-translate-y-1 transition-transform">
                <div class="absolute -top-4 left-6 bg-amber-500 text-slate-900 font-black text-xs uppercase px-4 py-1 rounded-full shadow">
                    LES PRIVATE CODING
                </div>
                <div>
                    <h3 class="text-2xl font-black text-[#1E3A8B] mt-2 mb-1">Belajar lebih fokus dengan tutor!</h3>
                    <p class="text-xs text-slate-500 font-semibold mb-6">Pendampingan 1-on-1 dengan kecepatan belajar teratur.</p>

                    <div class="space-y-3 text-sm font-semibold text-slate-700 mb-6 bg-amber-50/60 p-5 rounded-2xl">
                        <div class="flex items-center gap-3">
                            <span class="text-amber-600 text-lg">📅</span>
                            <span><strong>4x Pertemuan</strong> setiap bulan</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-amber-600 text-lg">⏰</span>
                            <span>Durasi <strong>90 menit</strong> per pertemuan</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-amber-600 text-lg">👤</span>
                            <span><strong>1 Siswa 1 Tutor</strong> (Eksklusif)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-amber-600 text-lg">💻</span>
                            <span>Membawa Laptop Sendiri</span>
                        </div>
                    </div>

                    <!-- Keuntungan Private -->
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 mb-6 text-xs space-y-2 font-bold text-slate-700">
                        <span class="text-purple-700 uppercase font-black block text-[11px]">Keuntungan Private:</span>
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-500">✓</span> Belajar lebih fokus & personal
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-500">✓</span> Materi disesuaikan dengan kebutuhan
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-500">✓</span> Waktu fleksibel (sesuai kesepakatan)
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-emerald-500">✓</span> Perkembangan belajar lebih terpantau
                        </div>
                    </div>

                    <div class="text-center p-4 bg-slate-50 rounded-2xl border border-slate-200 mb-6">
                        <span class="text-xs font-bold text-slate-400 block uppercase">Biaya Private Coding</span>
                        <div class="mt-1">
                            <span class="text-3xl sm:text-4xl font-black text-[#1E3A8B]">Rp 300.000</span>
                            <span class="text-xs text-slate-600 font-bold">/bulan</span>
                        </div>
                    </div>
                </div>

                <button @click="regModalOpen = true; modalProgramType = 'Privat'" class="w-full py-4 bg-amber-400 hover:bg-amber-500 text-slate-900 font-extrabold rounded-2xl shadow-lg transition text-center cursor-pointer">
                    Daftar Les Private Coding &rarr;
                </button>
            </div>

        </div>

    </div>
</section>

<!-- Keunggulan Section (Banner 2 Details with 3D Private Tutor Illustration) -->
<section id="keunggulan" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-16">
            <div class="lg:col-span-7">
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-500 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    MENGAPA MEMILIH KAMI?
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#1E3A8B] mt-3">
                    Keunggulan Robbani Kursus & Privat
                </h2>
                <p class="text-slate-600 mt-3 text-sm sm:text-base leading-relaxed">
                    Kami berkomitmen memberikan bimbingan belajar terbaik yang disesuaikan khusus dengan karakteristik dan gaya belajar setiap anak Indonesia dari tingkat TK hingga SMA.
                </p>
            </div>

            <!-- 3D Private Tutor Illustration -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative rounded-3xl overflow-hidden border-4 border-amber-400 shadow-xl bg-amber-50 max-w-sm">
                    <img src="{{ asset('images/private-tutor-3d.png') }}" alt="Pendampingan Belajar 3D" class="w-full h-64 object-cover">
                    <div class="p-3 text-center bg-white border-t border-slate-100">
                        <span class="text-xs font-extrabold text-[#1E3A8B]">Pendampingan Belajar Personal & Ramah Anak</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($advantages as $adv)
                <div class="p-8 rounded-3xl bg-slate-50 hover:bg-gradient-to-br hover:from-blue-50 hover:to-amber-50/50 border border-slate-100 hover:border-blue-200 shadow-sm hover:shadow-xl transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-[#1E3A8B] text-amber-400 flex items-center justify-center text-2xl font-black shadow-md group-hover:scale-110 transition-transform mb-6">
                        🏆
                    </div>
                    <h3 class="text-xl font-extrabold text-[#1E3A8B] mb-2 group-hover:text-blue-900">
                        {{ $adv->title }}
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $adv->description ?? 'Pendampingan belajar yang optimal demi pencapaian prestasi akademik dan non-akademik siswa.' }}
                    </p>
                </div>
            @empty
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                    <h3 class="font-extrabold text-[#1E3A8B]">Pengajar Berpengalaman</h3>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Program & Mata Pelajaran Section (Banner 2 Details) -->
<section id="program" class="py-20 bg-sky-50/60 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-extrabold uppercase tracking-widest text-[#1E3A8B] bg-blue-100 px-3 py-1 rounded-full">
                PILIHAN PROGRAM BELAJAR
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#1E3A8B] mt-3">
                Program Utama & Mata Pelajaran
            </h2>
            <p class="text-slate-600 mt-3 text-sm sm:text-base">
                Pilih program bimbingan belajar yang sesuai kebutuhan minat dan akademik putra-putri Anda.
            </p>
        </div>

        <!-- Main Programs Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            @foreach($programs as $prog)
                <div class="bg-white rounded-3xl p-7 shadow-md hover:shadow-xl transition-all border border-slate-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-amber-400 text-slate-900 flex items-center justify-center text-xl font-black shadow-md">
                                {{ $prog->badge_number ?? '123' }}
                            </div>
                            <span class="text-[10px] font-bold text-[#1E3A8B] bg-blue-50 px-2.5 py-1 rounded-full uppercase">Program Unggulan</span>
                        </div>
                        <h3 class="text-xl font-black text-[#1E3A8B] mb-2 group-hover:text-amber-600 transition-colors">
                            {{ $prog->title }}
                        </h3>
                        <p class="text-slate-600 text-xs leading-relaxed mb-6">
                            {{ $prog->description }}
                        </p>
                    </div>

                    <button @click="regModalOpen = true; modalProgramType = 'Kursus'" class="w-full py-3 bg-blue-50 hover:bg-[#1E3A8B] text-[#1E3A8B] hover:text-white font-extrabold rounded-2xl transition text-xs flex items-center justify-center gap-2 cursor-pointer">
                        Pilih Program Ini &rarr;
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Mata Pelajaran Pills Badges -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-lg border border-slate-100">
            <h3 class="text-xl sm:text-2xl font-black text-center text-[#1E3A8B] mb-6">
                📚 Mata Pelajaran yang Tersedia
            </h3>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($subjects as $subj)
                    <span class="px-5 py-2.5 rounded-full text-sm font-extrabold {{ $subj->name === 'Coding For Kids' ? 'bg-indigo-600 text-white shadow-md' : 'bg-gradient-to-r from-amber-400 to-amber-500 text-slate-900' }} shadow-sm hover:scale-105 transition-transform">
                        ✨ {{ $subj->name }}
                    </span>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- Rincian Biaya Section -->
<section id="biaya" class="py-20 bg-white" x-data="{ pricingTab: 'kursus' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-extrabold uppercase tracking-widest text-red-500 bg-red-50 px-3 py-1 rounded-full border border-red-200">
                INVENTARIS HARGA TRANSPARAN
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#1E3A8B] mt-3">
                Rincian Biaya Program
            </h2>
            <p class="text-slate-600 mt-3 text-sm sm:text-base">
                Investasi pendidikan terbaik dengan biaya terjangkau & fleksibel.
            </p>

            <!-- Tab Buttons -->
            <div class="inline-flex p-1.5 bg-slate-100 rounded-2xl mt-8 shadow-inner">
                <button @click="pricingTab = 'kursus'" :class="pricingTab === 'kursus' ? 'bg-[#1E3A8B] text-white shadow-md' : 'text-slate-600 hover:text-slate-900'" class="px-6 py-3 rounded-xl text-sm font-extrabold transition-all cursor-pointer">
                    🏫 KURSUS (Reguler)
                </button>
                <button @click="pricingTab = 'privat'" :class="pricingTab === 'privat' ? 'bg-[#1E3A8B] text-white shadow-md' : 'text-slate-600 hover:text-slate-900'" class="px-6 py-3 rounded-xl text-sm font-extrabold transition-all cursor-pointer">
                    🏡 PRIVAT (Di Rumah)
                </button>
            </div>
        </div>

        <!-- Kursus Pricing Cards -->
        <div x-show="pricingTab === 'kursus'" x-transition class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($pricingsKursus as $pk)
                <div class="bg-slate-50 hover:bg-white rounded-3xl p-7 border-2 border-slate-100 hover:border-[#1E3A8B] shadow-sm hover:shadow-2xl transition-all duration-300 flex flex-col justify-between relative">
                    <div>
                        <div class="inline-block bg-blue-100 text-[#1E3A8B] font-extrabold text-xs px-3 py-1 rounded-full uppercase mb-4">
                            Reguler • {{ $pk->level }}
                        </div>
                        <h3 class="text-xl font-black text-slate-800 mb-2">{{ $pk->level }}</h3>
                        <div class="my-5">
                            <span class="text-2xl sm:text-3xl font-black text-red-500">Rp {{ number_format($pk->price, 0, ',', '.') }}</span>
                            <span class="text-slate-500 text-xs font-semibold">/ {{ $pk->period }}</span>
                        </div>
                        @if($pk->notes)
                            <p class="text-xs text-slate-500 font-semibold mb-6 italic bg-white p-3 rounded-xl border border-slate-100">"{{ $pk->notes }}"</p>
                        @endif
                    </div>
                    <button @click="regModalOpen = true; modalProgramType = 'Kursus'; modalLevel = '{{ $pk->level }}'" class="w-full py-3 bg-[#F59E0B] hover:bg-amber-500 text-slate-900 font-extrabold rounded-2xl shadow transition text-center cursor-pointer text-xs">
                        Pilih Paket Reguler
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Privat Pricing Cards -->
        <div x-show="pricingTab === 'privat'" x-transition class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" style="display: none;">
            @foreach($pricingsPrivat as $pp)
                <div class="bg-slate-50 hover:bg-white rounded-3xl p-7 border-2 border-slate-100 hover:border-amber-400 shadow-sm hover:shadow-2xl transition-all duration-300 flex flex-col justify-between relative">
                    <div>
                        <div class="inline-block bg-amber-100 text-amber-800 font-extrabold text-xs px-3 py-1 rounded-full uppercase mb-4">
                            Privat • {{ $pp->level }}
                        </div>
                        <h3 class="text-xl font-black text-slate-800 mb-2">{{ $pp->level }}</h3>
                        <div class="my-5">
                            <span class="text-2xl sm:text-3xl font-black text-[#1E3A8B]">Rp {{ number_format($pp->price, 0, ',', '.') }}</span>
                            <span class="text-slate-500 text-xs font-semibold">/ {{ $pp->period }}</span>
                        </div>
                        @if($pp->notes)
                            <p class="text-xs text-slate-500 font-semibold mb-6 italic bg-white p-3 rounded-xl border border-slate-100">"{{ $pp->notes }}"</p>
                        @endif
                    </div>
                    <button @click="regModalOpen = true; modalProgramType = 'Privat'; modalLevel = '{{ $pp->level }}'" class="w-full py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-2xl shadow transition text-center cursor-pointer text-xs">
                        Pilih Paket Privat
                    </button>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- News & Activity Showcase Section -->
@if($newsList->count() > 0)
<section id="berita" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-extrabold uppercase tracking-widest text-[#1E3A8B] bg-blue-100 px-3 py-1 rounded-full">
                KABAR & INFORMASI
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#1E3A8B] mt-3">
                Kegiatan & Berita Terbaru
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($newsList as $item)
                @php
                    $cleanImg = $item->image ? ltrim(str_replace('\\', '/', $item->image), '/') : null;
                    $hasImg = $cleanImg && file_exists(public_path($cleanImg));
                    $imgUrl = $hasImg ? asset($cleanImg) : ($item->image ? asset($item->image) : null);
                @endphp
                <div @click="newsModalOpen = true; selectedNews = {
                        title: '{{ addslashes($item->title) }}',
                        category: '{{ strtoupper($item->category) }}',
                        published_at: '{{ $item->published_at ? $item->published_at->format('d M Y') : '' }}',
                        summary: '{{ addslashes($item->summary ?? '') }}',
                        content: '{{ addslashes($item->content) }}',
                        image: '{{ $imgUrl }}'
                    }" 
                    class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 flex flex-col justify-between cursor-pointer group transform hover:-translate-y-1">
                    <div>
                        <div class="h-48 bg-gradient-to-r from-blue-900 to-indigo-800 flex items-center justify-center text-white relative overflow-hidden">
                            @if($imgUrl)
                                <img src="{{ $imgUrl }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <span class="text-5xl group-hover:scale-110 transition-transform">📢</span>
                            @endif
                            <span class="absolute top-4 left-4 bg-amber-400 text-slate-900 font-extrabold text-[10px] uppercase px-3 py-1 rounded-full shadow">
                                {{ strtoupper($item->category) }}
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-slate-400 font-semibold mb-2 flex items-center justify-between">
                                <span>{{ $item->published_at ? $item->published_at->format('d M Y') : '' }}</span>
                                <span class="text-indigo-600 font-bold text-[11px] group-hover:underline">Klik untuk baca &rarr;</span>
                            </div>
                            <h3 class="text-lg font-black text-slate-800 mb-2 leading-snug group-hover:text-[#1E3A8B] transition-colors">
                                {{ $item->title }}
                            </h3>
                            <p class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                                {{ $item->summary ?? Str::limit(strip_tags($item->content), 120) }}
                            </p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-2">
                        <span class="inline-flex items-center gap-1.5 text-xs font-extrabold text-[#1E3A8B] group-hover:text-indigo-600">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call To Action Banner -->
<section class="py-16 bg-gradient-to-r from-[#1E3A8B] via-blue-900 to-amber-500 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <h2 class="text-3xl sm:text-5xl font-black leading-tight uppercase tracking-wide text-amber-300">
            {{ $settings['cta_banner_title'] ?? 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!' }}
        </h2>
        <p class="text-base sm:text-xl text-blue-100 font-medium max-w-3xl mx-auto">
            {{ $settings['cta_banner_description'] ?? 'Yuk, daftarkan putra-putri Anda dan wujudkan prestasi terbaik bersama Robbani Kursus & Privat!' }}
        </p>
        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button @click="regModalOpen = true" class="w-full sm:w-auto px-10 py-4 bg-amber-400 hover:bg-amber-300 text-slate-900 font-black text-lg rounded-2xl shadow-2xl transition transform hover:scale-105 cursor-pointer">
                AYO, DAFTAR SEKARANG!
            </button>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_phone'] ?? '081272218275') }}" target="_blank" class="w-full sm:w-auto px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-extrabold text-base rounded-2xl border border-white/30 backdrop-blur-md transition">
                Hubungi Kami via WA
            </a>
        </div>
    </div>
</section>

@endsection
