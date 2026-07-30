@extends('admin.layouts.admin')

@section('title', 'Manajemen Rincian Biaya')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="{ editMode: false, form: { id: null, type: 'kursus', level: '', price: '', period: 'Bulan', notes: '', order: 0, is_active: true } }">

    <!-- Left Column: Add / Edit Form -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 sticky top-28">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-1" x-text="editMode ? 'Edit Paket Biaya' : 'Tambah Paket Biaya Baru'"></h3>
            <p class="text-xs text-slate-500 mb-6">Atur rincian biaya kursus reguler & privat per jenjang.</p>

            <form :action="editMode ? '/admin/pricings/' + form.id : '{{ route('admin.pricings.store') }}'" method="POST" class="space-y-4">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Kategori Program *</label>
                    <select name="type" x-model="form.type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-800">
                        <option value="kursus">Kursus (Reguler)</option>
                        <option value="privat">Privat (Di Rumah)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Tingkat / Jenjang *</label>
                    <input type="text" name="level" x-model="form.level" required placeholder="Contoh: TK/SD, SMP/MTS, SMA/MA" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Biaya / Tarif (Rp) *</label>
                    <input type="number" name="price" x-model="form.price" required placeholder="240000" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Satuan Periode *</label>
                    <input type="text" name="period" x-model="form.period" required placeholder="Bulan / Pertemuan" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" x-model="form.order" placeholder="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_active" id="is_active" :checked="form.is_active" value="1" class="rounded text-[#1E3A8B]">
                    <label for="is_active" class="text-xs font-bold text-slate-700 cursor-pointer">Tampilkan di Website</label>
                </div>

                <div class="pt-4 flex gap-2">
                    <button type="submit" class="flex-1 py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-xl shadow text-xs">
                        <span x-text="editMode ? 'Simpan Perubahan' : 'Tambah Paket Biaya'"></span>
                    </button>
                    <button type="button" x-show="editMode" @click="editMode = false; form = { id: null, type: 'kursus', level: '', price: '', period: 'Bulan', notes: '', order: 0, is_active: true }" class="px-4 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl text-xs">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Column: Pricings Table -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-4">Daftar Rincian Biaya Aktif</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 text-xs uppercase font-extrabold text-slate-400 bg-slate-50">
                            <th class="py-3 px-4">Tipe</th>
                            <th class="py-3 px-4">Jenjang</th>
                            <th class="py-3 px-4">Harga / Periode</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                        @forelse($pricings as $p)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-3.5 px-4 font-bold text-xs uppercase">
                                    <span class="px-2.5 py-1 rounded-full {{ $p->type === 'kursus' ? 'bg-blue-50 text-[#1E3A8B]' : 'bg-amber-50 text-amber-800' }}">
                                        {{ $p->type }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 font-extrabold text-slate-900">{{ $p->level }}</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-600">
                                    Rp {{ number_format($p->price, 0, ',', '.') }} / <span class="text-slate-400 text-xs font-normal">{{ $p->period }}</span>
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($p->is_active)
                                        <span class="text-[10px] font-black uppercase text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">Aktif</span>
                                    @else
                                        <span class="text-[10px] font-black uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded-full">Sembunyi</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-right space-x-2">
                                    <button @click="editMode = true; form = { id: {{ $p->id }}, type: '{{ $p->type }}', level: '{{ $p->level }}', price: {{ $p->price }}, period: '{{ $p->period }}', order: {{ $p->order }}, is_active: {{ $p->is_active ? 'true' : 'false' }} }" class="text-xs font-bold text-blue-600 hover:underline">
                                        ✏️ Edit
                                    </button>

                                    <form action="{{ route('admin.pricings.destroy', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus rincian biaya ini?')">
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
                                <td colspan="5" class="py-6 text-center text-slate-400 text-xs">Belum ada rincian biaya.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
