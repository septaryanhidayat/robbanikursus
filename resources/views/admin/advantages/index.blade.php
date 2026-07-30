@extends('admin.layouts.admin')

@section('title', 'Manajemen Keunggulan')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="{ editMode: false, form: { id: null, title: '', description: '', icon: 'award', order: 0, is_active: true } }">

    <!-- Form -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 sticky top-28">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-1" x-text="editMode ? 'Edit Keunggulan' : 'Tambah Keunggulan'"></h3>
            <p class="text-xs text-slate-500 mb-6">Kelola poin keunggulan lembaga yang tampil di website.</p>

            <form :action="editMode ? '/admin/advantages/' + form.id : '{{ route('admin.advantages.store') }}'" method="POST" class="space-y-4">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Judul Keunggulan *</label>
                    <input type="text" name="title" x-model="form.title" required placeholder="Contoh: Pengajar Berpengalaman" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Deskripsi Singkat</label>
                    <textarea name="description" x-model="form.description" rows="3" placeholder="Penjelasan keunggulan..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" x-model="form.order" placeholder="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800">
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_active" id="adv_active" :checked="form.is_active" value="1" class="rounded text-[#1E3A8B]">
                    <label for="adv_active" class="text-xs font-bold text-slate-700 cursor-pointer">Tampilkan di Website</label>
                </div>

                <div class="pt-4 flex gap-2">
                    <button type="submit" class="flex-1 py-3 bg-[#1E3A8B] hover:bg-blue-900 text-white font-extrabold rounded-xl shadow text-xs">
                        <span x-text="editMode ? 'Simpan Perubahan' : 'Tambah Keunggulan'"></span>
                    </button>
                    <button type="button" x-show="editMode" @click="editMode = false; form = { id: null, title: '', description: '', icon: 'award', order: 0, is_active: true }" class="px-4 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl text-xs">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- List -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <h3 class="text-base font-extrabold text-[#1E3A8B] mb-4">Daftar Keunggulan Robbani</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($advantages as $adv)
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-extrabold text-sm text-[#1E3A8B]">🏆 {{ $adv->title }}</span>
                                <span class="text-[10px] text-slate-400">Order: {{ $adv->order }}</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed mb-4">{{ $adv->description }}</p>
                        </div>
                        <div class="flex items-center justify-end gap-3 pt-2 border-t border-slate-200/60">
                            <button @click="editMode = true; form = { id: {{ $adv->id }}, title: '{{ addslashes($adv->title) }}', description: '{{ addslashes($adv->description) }}', order: {{ $adv->order }}, is_active: {{ $adv->is_active ? 'true' : 'false' }} }" class="text-xs font-bold text-blue-600 hover:underline">
                                ✏️ Edit
                            </button>
                            <form action="{{ route('admin.advantages.destroy', $adv->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus poin keunggulan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-500 hover:underline">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 text-xs py-6 col-span-2">Belum ada data keunggulan.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>

@endsection
