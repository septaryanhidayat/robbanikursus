@extends('admin.layouts.admin')

@section('title', 'Pengaturan Profil & Identitas Situs')

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
    <div class="mb-6 border-b border-slate-100 pb-4">
        <h2 class="text-lg font-extrabold text-[#1E3A8B]">Identitas Lembaga & Logo Website</h2>
        <p class="text-xs text-slate-500">Ubah logo resmi, nama lembaga, nomor WhatsApp, alamat, sosmed, slogan, dan teks hero secara dinamis.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Logo & Website Title -->
        <div class="bg-blue-50/40 p-6 rounded-2xl border border-blue-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-[#1E3A8B] tracking-wider">Logo & Nama Lembaga</h3>
            
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="w-24 h-24 p-3 bg-white rounded-2xl border border-slate-200 shadow-sm flex items-center justify-center shrink-0 overflow-hidden">
                    <x-site-logo class="max-h-full max-w-full" />
                </div>

                <div class="space-y-3 flex-grow w-full">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Upload Logo Baru (PNG / SVG / JPG)</label>
                        <input type="file" name="site_logo" accept="image/*" class="w-full px-4 py-2 bg-white rounded-xl border border-slate-200 text-xs">
                        <span class="text-[10px] text-slate-400 block mt-1">Logo akan otomatis disesuaikan secara proporsional dan konsisten di seluruh halaman.</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Nama Website / Lembaga *</label>
                    <input type="text" name="site_title" value="{{ $settings['site_title'] ?? 'Robbani Kursus & Privat' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Tagline / Slogan Utama</label>
                    <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
                </div>
            </div>
        </div>

        <!-- Contact Information & Social Media -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-[#1E3A8B] tracking-wider">Informasi Kontak & Sosial Media</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">No. WhatsApp Official *</label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '0812-7221-8275' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-bold text-emerald-700">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Instagram (@)</label>
                    <input type="text" name="contact_instagram" value="{{ $settings['contact_instagram'] ?? '@robbanikursus_privat' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Facebook Page</label>
                    <input type="text" name="contact_facebook" value="{{ $settings['contact_facebook'] ?? 'Robbani Kursus & Privat' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Alamat Kantor / Lokasi *</label>
                <textarea name="contact_address" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-medium">{{ $settings['contact_address'] ?? 'Kantor Robbani Kursus & Privat, Jl. Sarjana Blok A No. 25 Timbangan, Ogan Ilir' }}</textarea>
            </div>
        </div>

        <!-- Promo Badge & Banner Settings -->
        <div class="bg-amber-50/50 p-6 rounded-2xl border border-amber-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-amber-900 tracking-wider">Badge Promosi & Banner Hero</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Badge Promo Pendaftaran</label>
                <input type="text" name="promo_badge" value="{{ $settings['promo_badge'] ?? 'GRATIS BIAYA PENDAFTARAN!' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-bold text-red-600">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Headline Utama Hero (H1) *</label>
                <input type="text" name="hero_headline" value="{{ $settings['hero_headline'] ?? 'PENDAFTARAN ROBBANI KURSUS & PRIVAT TELAH DIBUKA!' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-extrabold text-[#1E3A8B]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Sub-headline / Deskripsi Hero *</label>
                <textarea name="hero_subheadline" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-medium">{{ $settings['hero_subheadline'] ?? 'Menyediakan bimbingan belajar terlengkap (TK, SD, SMP, SMA) dan program spesial Coding For Kids.' }}</textarea>
            </div>
        </div>

        <!-- CTA Banner Bottom -->
        <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100 space-y-4">
            <h3 class="text-xs font-black uppercase text-emerald-900 tracking-wider">Banner CTA Bagian Bawah</h3>

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
                💾 Simpan Pengaturan & Logo
            </button>
        </div>
    </form>
</div>

@endsection
