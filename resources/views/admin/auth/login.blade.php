<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Staff Admin - {{ \App\Models\SiteSetting::getByKey('site_title', 'Robbani Kursus & Privat') }}</title>
    
    <!-- Tailwind Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#1E3A8B] via-blue-900 to-amber-500 min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl border-4 border-amber-400">
        
        <!-- Header Brand -->
        <div class="text-center space-y-2 mb-8 flex flex-col items-center">
            <div class="w-20 h-20 p-2.5 rounded-2xl bg-white shadow-md flex items-center justify-center mb-1 border border-slate-100 overflow-hidden">
                <x-site-logo class="max-h-full max-w-full" />
            </div>
            <h1 class="text-xl font-black text-[#1E3A8B] tracking-tight uppercase">{{ \App\Models\SiteSetting::getByKey('site_title', 'Robbani Kursus & Privat') }}</h1>
            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Login Dashboard Pengelola</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Email Admin</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@robbanikursus.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A8B] text-sm">
            </div>

            <div class="flex items-center justify-between text-xs font-semibold text-slate-600">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-[#1E3A8B]">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 bg-[#F59E0B] hover:bg-amber-500 text-slate-900 font-black rounded-2xl shadow-lg transition text-base cursor-pointer">
                MASUK KE DASHBOARD
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('landing') }}" class="text-xs font-bold text-[#1E3A8B] hover:underline">
                &larr; Kembali ke Website Utama
            </a>
        </div>

    </div>

</body>
</html>
