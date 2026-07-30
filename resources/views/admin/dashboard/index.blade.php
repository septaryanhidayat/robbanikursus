@extends('admin.layouts.admin')

@section('title', 'Dashboard Pengelola')

@section('content')

<!-- Quick Metrics Overview Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase text-slate-400">Total Pendaftaran</span>
            <h3 class="text-3xl font-black text-[#1E3A8B] mt-1">{{ $stats['total_registrations'] }}</h3>
            <span class="text-[10px] text-amber-600 font-extrabold bg-amber-50 px-2 py-0.5 rounded-full mt-2 inline-block">
                {{ $stats['new_registrations'] }} Leads Baru
            </span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#1E3A8B] flex items-center justify-center text-2xl font-bold">
            📝
        </div>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase text-slate-400">Program Utama</span>
            <h3 class="text-3xl font-black text-amber-500 mt-1">{{ $stats['total_programs'] }}</h3>
            <span class="text-[10px] text-slate-500 font-semibold mt-2 inline-block">Aktif Tampil</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl font-bold">
            🎓
        </div>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase text-slate-400">Mata Pelajaran</span>
            <h3 class="text-3xl font-black text-emerald-600 mt-1">{{ $stats['total_subjects'] }}</h3>
            <span class="text-[10px] text-slate-500 font-semibold mt-2 inline-block">TK s/d SMA</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
            📚
        </div>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase text-slate-400">Berita & Galeri</span>
            <h3 class="text-3xl font-black text-purple-600 mt-1">{{ $stats['total_news'] }}</h3>
            <span class="text-[10px] text-slate-500 font-semibold mt-2 inline-block">Artikel Terpublikasi</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl font-bold">
            📰
        </div>
    </div>

</div>

<!-- Recent Registrations Section -->
<div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-[#1E3A8B]">Pendaftaran Terbaru</h2>
            <p class="text-xs text-slate-500">List pendaftar online yang baru masuk via website.</p>
        </div>
        <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 bg-blue-50 text-[#1E3A8B] hover:bg-[#1E3A8B] hover:text-white font-bold text-xs rounded-xl transition">
            Lihat Semua Pendaftar &rarr;
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-xs uppercase font-extrabold text-slate-400 bg-slate-50">
                    <th class="py-3 px-4 rounded-l-xl">Nama Siswa / Orang Tua</th>
                    <th class="py-3 px-4">Kontak WA</th>
                    <th class="py-3 px-4">Jenjang & Program</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 rounded-r-xl">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                @forelse($recentRegistrations as $reg)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-4">
                            <span class="font-extrabold text-slate-900 block">{{ $reg->student_name }}</span>
                            <span class="text-xs text-slate-400">Wali: {{ $reg->parent_name }}</span>
                        </td>
                        <td class="py-3.5 px-4 font-mono text-xs">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $reg->phone_number) }}" target="_blank" class="text-emerald-600 hover:underline font-bold flex items-center gap-1">
                                💬 {{ $reg->phone_number }}
                            </a>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-[#1E3A8B] inline-block mb-0.5">
                                {{ $reg->education_level }}
                            </span>
                            <span class="text-xs text-slate-500 block font-semibold">{{ $reg->program_type }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            @if($reg->status === 'baru')
                                <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-black uppercase">Baru</span>
                            @elseif($reg->status === 'dihubungi')
                                <span class="px-2.5 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-black uppercase">Dihubungi</span>
                            @elseif($reg->status === 'diterima')
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-black uppercase">Diterima</span>
                            @else
                                <span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-black uppercase">Batal</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-xs text-slate-400">
                            {{ $reg->created_at->format('d M Y, H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-slate-400 text-sm">Belum ada pendaftaran baru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
