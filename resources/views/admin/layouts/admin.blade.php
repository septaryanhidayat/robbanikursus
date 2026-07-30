<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Robbani Kursus & Privat</title>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" class="fixed md:static inset-y-0 left-0 z-40 w-64 bg-[#1E3A8B] text-white transition-transform duration-300 ease-in-out flex flex-col justify-between shadow-xl">
            <div>
                <!-- Brand Logo Area -->
                <div class="h-20 px-6 flex items-center justify-between border-b border-blue-900/80">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-400 text-slate-900 flex items-center justify-center font-black text-xl shadow">
                            R
                        </div>
                        <div>
                            <span class="font-extrabold text-lg text-white block leading-tight">ROBBANI</span>
                            <span class="text-[10px] text-amber-300 font-bold uppercase tracking-widest block">Panel Pengelola</span>
                        </div>
                    </div>
                    <button @click="sidebarOpen = false" class="md:hidden text-blue-200 hover:text-white">
                        ✕
                    </button>
                </div>

                <!-- Navigation Links -->
                <nav class="p-4 space-y-1.5 font-bold text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>📊</span>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.registrations.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.registrations.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>📝</span>
                        <span>Data Pendaftaran</span>
                    </a>

                    <a href="{{ route('admin.pricings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.pricings.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>💰</span>
                        <span>Biaya Kursus & Privat</span>
                    </a>

                    <a href="{{ route('admin.programs.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.programs.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>🎓</span>
                        <span>Program Utama</span>
                    </a>

                    <a href="{{ route('admin.subjects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.subjects.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>📚</span>
                        <span>Mata Pelajaran</span>
                    </a>

                    <a href="{{ route('admin.advantages.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.advantages.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>⭐</span>
                        <span>Keunggulan</span>
                    </a>

                    <a href="{{ route('admin.news.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.news.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>📰</span>
                        <span>Berita & Galeri</span>
                    </a>

                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-amber-400 text-slate-900 shadow-md font-extrabold' : 'text-blue-100 hover:bg-blue-800/60' }}">
                        <span>⚙️</span>
                        <span>Pengaturan Situs</span>
                    </a>
                </nav>
            </div>

            <!-- Footer Sidebar / User Info -->
            <div class="p-4 border-t border-blue-900/80">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-extrabold text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-blue-200">{{ auth()->user()->email ?? '' }}</p>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" title="Logout" class="p-2 text-rose-300 hover:text-white hover:bg-rose-600/30 rounded-lg transition cursor-pointer">
                            🚪
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-grow flex flex-col min-w-0">
            <!-- Topbar Header -->
            <header class="h-20 bg-white border-b border-slate-200 px-6 flex items-center justify-between sticky top-0 z-30 shadow-xs">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg">
                        ☰
                    </button>
                    <h1 class="text-xl font-black text-[#1E3A8B]">@yield('title', 'Dashboard Pengelola')</h1>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" target="_blank" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl flex items-center gap-2 transition">
                        <span>🌐 Lihat Website</span>
                    </a>
                </div>
            </header>

            <!-- Page Body -->
            <main class="p-6 md:p-8 flex-grow">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-bold flex items-center justify-between">
                        <span>✅ {{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm font-bold">
                        <p class="font-extrabold mb-1">⚠️ Terjadi Kesalahan:</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
