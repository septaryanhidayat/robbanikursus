@extends('admin.layouts.admin')

@section('title', 'Manajemen Data Pendaftaran')

@section('content')

<div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
    
    <!-- Filter & Search Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-[#1E3A8B]">Daftar Pendaftar (Leads)</h2>
            <p class="text-xs text-slate-500">Kelola calon siswa yang mendaftar melalui website.</p>
        </div>

        <form action="{{ route('admin.registrations.index') }}" method="GET" class="flex flex-wrap items-center gap-3">
            <select name="status" onchange="this.form.submit()" class="px-4 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs font-bold text-slate-700">
                <option value="">Semua Status</option>
                <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="dihubungi" {{ request('status') == 'dihubungi' ? 'selected' : '' }}>Dihubungi</option>
                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / WA..." class="px-4 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B]">

            <button type="submit" class="px-4 py-2 bg-[#1E3A8B] text-white font-bold text-xs rounded-xl shadow">
                Cari
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-xs uppercase font-extrabold text-slate-400 bg-slate-50">
                    <th class="py-3.5 px-4 rounded-l-xl">Siswa & Wali</th>
                    <th class="py-3.5 px-4">Kontak WA</th>
                    <th class="py-3.5 px-4">Jenjang & Program</th>
                    <th class="py-3.5 px-4">Mapel / Catatan</th>
                    <th class="py-3.5 px-4">Status</th>
                    <th class="py-3.5 px-4 rounded-r-xl">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                @forelse($registrations as $reg)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-4 px-4">
                            <span class="font-extrabold text-slate-900 block text-base">{{ $reg->student_name }}</span>
                            <span class="text-xs text-slate-500">Wali: {{ $reg->parent_name }}</span>
                            @if($reg->address)
                                <span class="text-[11px] text-slate-400 block italic mt-0.5">📍 {{ $reg->address }}</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 font-mono text-xs">
                            @php
                                $cleanPhone = preg_replace('/[^0-9]/', '', $reg->phone_number);
                                if (str_starts_with($cleanPhone, '0')) {
                                    $cleanPhone = '62' . substr($cleanPhone, 1);
                                }
                                $waMsg = "Halo Bpk/Ibu {$reg->parent_name}, kami dari Admin Robbani Kursus & Privat ingin mengonfirmasi pendaftaran ananda {$reg->student_name}.";
                            @endphp
                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waMsg) }}" target="_blank" class="px-3 py-1.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white rounded-lg font-bold inline-flex items-center gap-1.5 transition text-xs border border-emerald-200">
                                💬 {{ $reg->phone_number }}
                            </a>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-[#1E3A8B] inline-block mb-1">
                                {{ $reg->education_level }}
                            </span>
                            <span class="text-xs font-extrabold text-slate-800 block">{{ $reg->program_type }}</span>
                        </td>
                        <td class="py-4 px-4 text-xs max-w-xs">
                            @if($reg->selected_subjects)
                                <span class="font-bold text-amber-700 block mb-1">📚 {{ $reg->selected_subjects }}</span>
                            @endif
                            @if($reg->notes)
                                <span class="text-slate-500 italic block">"{{ $reg->notes }}"</span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            <form action="{{ route('admin.registrations.updateStatus', $reg->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="px-3 py-1.5 rounded-lg text-xs font-extrabold border cursor-pointer {{ $reg->status === 'baru' ? 'bg-amber-100 text-amber-800 border-amber-300' : ($reg->status === 'dihubungi' ? 'bg-blue-100 text-blue-800 border-blue-300' : ($reg->status === 'diterima' ? 'bg-emerald-100 text-emerald-800 border-emerald-300' : 'bg-slate-100 text-slate-600 border-slate-300')) }}">
                                    <option value="baru" {{ $reg->status === 'baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="dihubungi" {{ $reg->status === 'dihubungi' ? 'selected' : '' }}>Dihubungi</option>
                                    <option value="diterima" {{ $reg->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="batal" {{ $reg->status === 'batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                            </form>
                        </td>
                        <td class="py-4 px-4">
                            <form action="{{ route('admin.registrations.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Hapus data pendaftaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-rose-500 hover:text-white hover:bg-rose-600 rounded-lg transition text-xs font-bold">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400 text-sm">Tidak ada data pendaftaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $registrations->links() }}
    </div>
</div>

@endsection
