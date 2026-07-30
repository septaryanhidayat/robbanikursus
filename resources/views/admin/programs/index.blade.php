@extends('admin.layouts.admin')

@section('title', 'Manajemen Program Utama')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="{ editMode: false, form: { id: null, title: '', description: '', badge_number: '', order: 0, is_active: true } }">

    <!-- Form -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 sticky top-28">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-1" x-text="editMode ? 'Edit Program Utama' : 'Tambah Program Utama'"></h3>
            <p class="text-xs text-slate-500 mb-6">Kelola data program unggulan yang tampil di Landing Page.</p>

            <form :action="editMode ? '/admin/programs/' + form.id : '{{ route('admin.programs.store') }}'" method="POST" class="space-y-4">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Judul Program *</label>
                    <input type="text" name="title" x-model="form.title" required placeholder="Contoh: Kelas Tahsin & Tahfidz" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Badge Simbol / Angka</label>
                    <input type="text" name="badge_number" x-model="form.badge_number" placeholder="Contoh: 123, 📖, 💻" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Deskripsi Singkat</label>
                    <textarea name="description" x-model="form.description" rows="3" placeholder="Penjelasan singkat mengenai program..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Urutan</label>
                    <input type="number" name="order" x-model="form.order" placeholder="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_active" id="prog_active" :checked="form.is_active" value="1" class="rounded text-[#1E3A8B]">
                    <label for="prog_active" class="text-xs font-bold text-slate-700 cursor-pointer">Tampilkan di Website</label>
                </div>

                <div class="pt-4 flex gap-2">
                    <button type="submit" class="flex-1 py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-xl shadow text-xs">
                        <span x-text="editMode ? 'Simpan Perubahan' : 'Tambah Program'"></span>
                    </button>
                    <button type="button" x-show="editMode" @click="editMode = false; form = { id: null, title: '', description: '', badge_number: '', order: 0, is_active: true }" class="px-4 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl text-xs">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Programs Table -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-4">Program Pilihan</h3>

            <div class="space-y-4">
                @forelse($programs as $prog)
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-amber-400 text-slate-900 flex items-center justify-center font-bold text-base shadow">
                                {{ $prog->badge_number ?? '123' }}
                            </div>
                            <div>
                                <h4 class="font-extrabold text-slate-900 text-sm">{{ $prog->title }}</h4>
                                <p class="text-xs text-slate-500 line-clamp-1">{{ $prog->description }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <button @click="editMode = true; form = { id: {{ $prog->id }}, title: '{{ addslashes($prog->title) }}', description: '{{ addslashes($prog->description) }}', badge_number: '{{ $prog->badge_number }}', order: {{ $prog->order }}, is_active: {{ $prog->is_active ? 'true' : 'false' }} }" class="text-xs font-bold text-blue-600 hover:underline">
                                ✏️ Edit
                            </button>

                            <form action="{{ route('admin.programs.destroy', $prog->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus program ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-500 hover:underline">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 text-xs py-6">Belum ada program utama.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>

@endsection
