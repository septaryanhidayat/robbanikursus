@extends('admin.layouts.admin')

@section('title', 'Buat Berita / Galeri Baru')

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
    <h2 class="text-lg font-extrabold text-[#1E3A8B] mb-6">Tambah Artikel Berita / Pengumuman</h2>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Judul Artikel *</label>
            <input type="text" name="title" required value="{{ old('title') }}" placeholder="Judul berita/kegiatan..." class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-semibold focus:ring-2 focus:ring-[#1E3A8B]">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Kategori *</label>
                <select name="category" required class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-semibold">
                    <option value="berita">Berita Kegiatan</option>
                    <option value="pengumuman">Pengumuman Resmi</option>
                    <option value="galeri">Galeri Foto</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Foto Sampul (Opsional)</label>
                <input type="file" name="image" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-xs">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Ringkasan Singkat</label>
            <input type="text" name="summary" value="{{ old('summary') }}" placeholder="Ringkasan 1-2 kalimat untuk preview card..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Isi Lengkap Artikel *</label>
            <textarea name="content" rows="8" required placeholder="Tuliskan isi berita..." class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-normal">{{ old('content') }}</textarea>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" id="is_published" value="1" checked class="rounded text-[#1E3A8B]">
            <label for="is_published" class="text-xs font-bold text-slate-700 cursor-pointer">Langsung Terbitkan</label>
        </div>

        <div class="pt-4 flex gap-3">
            <button type="submit" class="px-6 py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-xl shadow text-sm">
                Simpan & Terbitkan
            </button>
            <a href="{{ route('admin.news.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl text-sm">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
