@extends('admin.layouts.admin')

@section('title', 'Pengaturan Profil & Identitas Situs')

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
    <div class="mb-6 border-b border-slate-100 pb-4">
        <h2 class="text-lg font-extrabold text-[#1E3A8B]">Identitas Lembaga & Kontak</h2>
        <p class="text-xs text-slate-500">Ubah nama, nomor WhatsApp official, alamat, slogan, dan teks landing page secara dinamis.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Site & Brand Name -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Nama Lembaga *</label>
                <input type="text" name="site_title" value="{{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Tagline / Slogan</label>
                <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-[#1E3A8B] tracking-wider">Informasi Kontak & Pendaftaran</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">No. WhatsApp Official *</label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '0812-7221-8275' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-bold text-emerald-700">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Instagram Handle</label>
                    <input type="text" name="contact_instagram" value="{{ $settings['contact_instagram'] ?? '@robbanikursus_privat' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Alamat Lengkap *</label>
                <textarea name="contact_address" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-medium">{{ $settings['contact_address'] ?? 'Jl. Sarjana Blok A 25, Kel. Timbangan, Indralaya Utara Ogan Ilir' }}</textarea>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-[#1E3A8B] tracking-wider">Teks Hero Banner Landing Page</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Headline Utama (H1) *</label>
                <input type="text" name="hero_headline" value="{{ $settings['hero_headline'] ?? 'PENDAFTARAN ROBBANI KURSUS & PRIVAT TELAH DIBUKA!' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-extrabold text-[#1E3A8B]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Sub-headline / Deskripsi *</label>
                <textarea name="hero_subheadline" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-medium">{{ $settings['hero_subheadline'] ?? 'Belajar jadi lebih mudah, menyenangkan, dan sesuai kebutuhan anak. Mulai dari TK, SD, SMP, hingga SMA, dengan pengajar berpengalaman dan jadwal yang fleksibel.' }}</textarea>
            </div>
        </div>

        <!-- CTA Banner -->
        <div class="bg-amber-50/50 p-6 rounded-2xl border border-amber-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-amber-900 tracking-wider">Banner Call to Action (CTA) Bawah</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Judul Banner Promosi</label>
                <input type="text" name="cta_banner_title" value="{{ $settings['cta_banner_title'] ?? 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-bold">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Deskripsi Banner Promosi</label>
                <textarea name="cta_banner_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm">{{ $settings['cta_banner_description'] ?? 'Yuk, daftarkan putra-putri Anda dan wujudkan prestasi terbaik bersama Robbani Kursus & Privat!' }}</textarea>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-2xl shadow-lg transition text-base cursor-pointer">
                💾 Simpan Pengaturan
            </button>
        </div>
    </form>
</div>

@endsection
