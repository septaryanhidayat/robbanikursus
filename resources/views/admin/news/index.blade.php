@extends('admin.layouts.admin')

@section('title', 'Manajemen Berita & Galeri')

@section('content')

<div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-[#1E3A8B]">Berita, Pengumuman & Galeri</h2>
            <p class="text-xs text-slate-500">Kelola artikel berita dan dokumentasi kegiatan Robbani.</p>
        </div>

        <a href="{{ route('admin.news.create') }}" class="px-5 py-2.5 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold text-xs rounded-xl shadow transition flex items-center gap-2">
            <span>➕ Buat Berita / Galeri</span>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-xs uppercase font-extrabold text-slate-400 bg-slate-50">
                    <th class="py-3 px-4">Judul Artikel</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Tanggal Buat</th>
                    <th class="py-3 px-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                @forelse($newsList as $news)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-3.5 px-4 font-extrabold text-slate-900">
                            {{ $news->title }}
                            <span class="block text-xs text-slate-400 font-normal line-clamp-1">{{ $news->summary }}</span>
                        </td>
                        <td class="py-3.5 px-4 text-xs font-bold uppercase">
                            <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#1E3A8B]">
                                {{ $news->category }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            @if($news->is_published)
                                <span class="text-[10px] font-black uppercase text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">Terbit</span>
                            @else
                                <span class="text-[10px] font-black uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-xs text-slate-400">
                            {{ $news->created_at->format('d M Y') }}
                        </td>
                        <td class="py-3.5 px-4 text-right space-x-2">
                            <a href="{{ route('admin.news.edit', $news->id) }}" class="text-xs font-bold text-blue-600 hover:underline">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-500 hover:underline">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400 text-sm">Belum ada berita/galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $newsList->links() }}
    </div>
</div>

@endsection
