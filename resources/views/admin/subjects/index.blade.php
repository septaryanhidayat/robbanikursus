@extends('admin.layouts.admin')

@section('title', 'Manajemen Mata Pelajaran')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="{ editMode: false, form: { id: null, name: '', badge_color: 'amber', order: 0, is_active: true } }">

    <!-- Form -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 sticky top-28">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-1" x-text="editMode ? 'Edit Mata Pelajaran' : 'Tambah Mata Pelajaran'"></h3>
            <p class="text-xs text-slate-500 mb-6">Kelola daftar mata pelajaran yang ditawarkan.</p>

            <form :action="editMode ? '/admin/subjects/' + form.id : '{{ route('admin.subjects.store') }}'" method="POST" class="space-y-4">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Nama Mata Pelajaran *</label>
                    <input type="text" name="name" x-model="form.name" required placeholder="Contoh: Matematika, Bahasa Inggris" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" x-model="form.order" placeholder="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_active" id="subj_active" :checked="form.is_active" value="1" class="rounded text-[#1E3A8B]">
                    <label for="subj_active" class="text-xs font-bold text-slate-700 cursor-pointer">Tampilkan di Website</label>
                </div>

                <div class="pt-4 flex gap-2">
                    <button type="submit" class="flex-1 py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-xl shadow text-xs">
                        <span x-text="editMode ? 'Simpan Perubahan' : 'Tambah Mapel'"></span>
                    </button>
                    <button type="button" x-show="editMode" @click="editMode = false; form = { id: null, name: '', badge_color: 'amber', order: 0, is_active: true }" class="px-4 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl text-xs">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table / List -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-4">Daftar Mata Pelajaran</h3>

            <div class="flex flex-wrap gap-3">
                @forelse($subjects as $subj)
                    <div class="px-4 py-2.5 rounded-2xl bg-amber-50 border border-amber-200 flex items-center gap-3">
                        <span class="font-extrabold text-xs text-amber-900">✨ {{ $subj->name }}</span>
                        <div class="flex items-center gap-1.5 border-l border-amber-200 pl-2">
                            <button @click="editMode = true; form = { id: {{ $subj->id }}, name: '{{ addslashes($subj->name) }}', order: {{ $subj->order }}, is_active: {{ $subj->is_active ? 'true' : 'false' }} }" class="text-[11px] text-blue-600 font-bold hover:underline">
                                Edit
                            </button>
                            <form action="{{ route('admin.subjects.destroy', $subj->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus mata pelajaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[11px] text-rose-500 font-bold hover:underline">
                                    ✕
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 text-xs py-6">Belum ada mata pelajaran.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>

@endsection
