<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\News;
use App\Models\Pricing;
use App\Models\Program;
use App\Models\Registration;
use App\Models\SiteSetting;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@robbanikursus.com'],
            [
                'name' => 'Admin Robbani',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Site Settings
        $settings = [
            'site_title' => 'Robbani Kursus & Privat',
            'site_tagline' => 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!',
            'site_logo' => 'images/logo.jpg',
            'hero_headline' => 'PENDAFTARAN ROBBANI KURSUS & PRIVAT TELAH DIBUKA!',
            'hero_subheadline' => 'Menyediakan bimbingan belajar terlengkap (TK, SD, SMP, SMA) dan program spesial Coding For Kids. Pengajar berpengalaman, tempat belajar nyaman & privat di rumah.',
            'contact_phone' => '0812-7221-8275',
            'contact_address' => 'Kantor Robbani Kursus & Privat, Jl. Sarjana Blok A No. 25, Kel. Timbangan, Indralaya Utara, Ogan Ilir',
            'contact_instagram' => '@robbanikursus_privat',
            'contact_facebook' => 'Robbani Kursus & Privat',
            'promo_badge' => 'GRATIS BIAYA PENDAFTARAN!',
            'cta_banner_title' => 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!',
            'cta_banner_description' => 'Yuk, daftarkan putra-putri Anda dan wujudkan prestasi terbaik bersama Robbani Kursus & Privat! Tempat terbaik untuk membantu anak meraih prestasi dan percaya diri.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::setByKey($key, $value);
        }

        // 3. Advantages (From Banner 1 & Banner 2)
        $advantages = [
            [
                'title' => 'Pengajar Berpengalaman',
                'description' => 'Tutor profesional, sabar, dan ramah yang membimbing perkembangan anak secara intensif.',
                'icon' => 'award',
                'order' => 1,
            ],
            [
                'title' => 'Bebas Pilih Mata Pelajaran',
                'description' => 'Siswa bebas memilih kombinasi mata pelajaran sekolah maupun keahlian khusus seperti Coding & Tahfidz.',
                'icon' => 'book-open',
                'order' => 2,
            ],
            [
                'title' => 'Menyesuaikan Kebutuhan Siswa',
                'description' => 'Materi dan metode belajar disesuaikan dengan ritme serta tingkat pemahaman masing-masing siswa.',
                'icon' => 'user-check',
                'order' => 3,
            ],
            [
                'title' => 'Jadwal Fleksibel',
                'description' => 'Waktu les disepakati bersama sehingga tidak mengganggu jam sekolah atau kegiatan lainnya.',
                'icon' => 'clock',
                'order' => 4,
            ],
            [
                'title' => 'Pendampingan Belajar Personal',
                'description' => 'Fokus penuh pada setiap anak untuk membantu mengatasi kendala dalam pelajaran dan tugas sekolah.',
                'icon' => 'heart-handshake',
                'order' => 5,
            ],
            [
                'title' => 'Bisa Privat di Rumah',
                'description' => 'Pengajar datang langsung ke rumah Anda dengan sistem 1 Siswa 1 Tutor yang aman & fokus.',
                'icon' => 'home',
                'order' => 6,
            ],
        ];

        foreach ($advantages as $adv) {
            Advantage::updateOrCreate(['title' => $adv['title']], $adv);
        }

        // 4. Main Programs (Including Banner 1 Coding For Kids & Banner 2)
        $programs = [
            [
                'title' => 'Coding For Kids (SD, SMP, SMA)',
                'description' => 'Belajar logika pemrograman, membuat game, dan aplikasi seru dengan bimbingan tutor berpengalaman.',
                'badge_number' => '💻',
                'icon' => 'code',
                'order' => 1,
            ],
            [
                'title' => 'Semua Mata Pelajaran Sekolah',
                'description' => 'Bimbingan komprehensif untuk seluruh pelajaran akademik dari jenjang TK/PAUD, SD/MI, SMP/MTS, hingga SMA/MA.',
                'badge_number' => '📚',
                'icon' => 'layers',
                'order' => 2,
            ],
            [
                'title' => 'Kelas Tahsin & Tahfidz Al-Qur\'an',
                'description' => 'Pembelajaran membaca Al-Qur\'an sesuai tajwid dan bimbingan hafalan hafiz/hafizah berpengalaman.',
                'badge_number' => '📖',
                'icon' => 'book',
                'order' => 3,
            ],
            [
                'title' => 'Kursus Komputer & Aplikasi',
                'description' => 'Pelatihan komputer praktis untuk keahlian aplikasi perkantoran, desain, dan pengenalan dunia digital.',
                'badge_number' => '🖥️',
                'icon' => 'monitor',
                'order' => 4,
            ],
        ];

        foreach ($programs as $prog) {
            Program::updateOrCreate(['title' => $prog['title']], $prog);
        }

        // 5. Subjects
        $subjects = [
            ['name' => 'Coding For Kids', 'badge_color' => 'indigo', 'order' => 1],
            ['name' => 'Calistung', 'badge_color' => 'amber', 'order' => 2],
            ['name' => 'Bahasa Inggris', 'badge_color' => 'blue', 'order' => 3],
            ['name' => 'Matematika', 'badge_color' => 'indigo', 'order' => 4],
            ['name' => 'Tahsin & Tahfidz', 'badge_color' => 'emerald', 'order' => 5],
            ['name' => 'Bahasa Arab', 'badge_color' => 'teal', 'order' => 6],
            ['name' => 'IPAS', 'badge_color' => 'purple', 'order' => 7],
            ['name' => 'Renang', 'badge_color' => 'cyan', 'order' => 8],
        ];

        foreach ($subjects as $subj) {
            Subject::updateOrCreate(['name' => $subj['name']], $subj);
        }

        // 6. Pricing Tiers (From Banner 1 & Banner 2)
        $pricings = [
            // Banner 1: Coding For Kids Reguler & Privat
            ['type' => 'kursus', 'level' => 'Coding For Kids (Reguler)', 'price' => 250000, 'period' => 'Bulan', 'notes' => 'Diskon dari Rp 400rb! 4x Pertemuan/bln @ 90 menit (1 Kelas 3-5 Orang)', 'order' => 1],
            ['type' => 'privat', 'level' => 'Les Private Coding', 'price' => 300000, 'period' => 'Bulan', 'notes' => '1 Siswa 1 Tutor, 4x Pertemuan/bln @ 90 menit, waktu fleksibel', 'order' => 1],

            // Banner 2: Kursus (Reguler) Umum
            ['type' => 'kursus', 'level' => 'TK/SD', 'price' => 240000, 'period' => 'Bulan', 'notes' => 'Bimbingan belajar reguler semua mapel', 'order' => 2],
            ['type' => 'kursus', 'level' => 'SMP/MTS', 'price' => 280000, 'period' => 'Bulan', 'notes' => 'Bimbingan belajar reguler semua mapel', 'order' => 3],
            ['type' => 'kursus', 'level' => 'SMA/MA', 'price' => 320000, 'period' => 'Bulan', 'notes' => 'Bimbingan belajar reguler semua mapel', 'order' => 4],

            // Banner 2: Privat Umum
            ['type' => 'privat', 'level' => 'TK/SD', 'price' => 30000, 'period' => 'Pertemuan', 'notes' => 'Tutor datang ke rumah', 'order' => 2],
            ['type' => 'privat', 'level' => 'SMP/MTS', 'price' => 35000, 'period' => 'Pertemuan', 'notes' => 'Tutor datang ke rumah', 'order' => 3],
            ['type' => 'privat', 'level' => 'SMA/MA', 'price' => 40000, 'period' => 'Pertemuan', 'notes' => 'Tutor datang ke rumah', 'order' => 4],
        ];

        foreach ($pricings as $p) {
            Pricing::updateOrCreate(['type' => $p['type'], 'level' => $p['level']], $p);
        }

        // 7. Initial News & Announcements
        $news = [
            [
                'title' => 'Pembukaan Kelas Spesial Coding For Kids - Tingkat SD, SMP, SMA!',
                'slug' => 'pembukaan-kelas-spesial-coding-for-kids',
                'summary' => 'Belajar coding jadi seru & mudah! Dapatkan promo gratis biaya pendaftaran & diskon khusus kelas reguler maupun privat coding.',
                'content' => 'Robbani Kursus & Privat secara resmi meluncurkan program unggulan **Coding For Kids** untuk tingkat SD, SMP, dan SMA. Tersedia pilihan **Kelas Reguler** (250rb/bulan, 1 kelas 3-5 siswa) dan **Les Private Coding** (300rb/bulan, 1 siswa 1 tutor). Dapatkan **GRATIS BIAYA PENDAFTARAN** untuk pendaftaran minggu ini. Kuota sangat terbatas!',
                'category' => 'pengumuman',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Pendaftaran Bimbingan Belajar & Privat Tahun Ajaran 2026/2027',
                'slug' => 'pendaftaran-bimbingan-belajar-dan-privat-2026-2027',
                'summary' => 'Menyediakan bimbingan belajar untuk siswa TK/PAUD, SD/MI, SMP/MTS, dan SMA/MA dengan jadwal fleksibel.',
                'content' => 'Robbani Kursus & Privat membuka pendaftaran siswa baru untuk semua mata pelajaran sekolah (Calistung, Matematika, B. Inggris, Tahsin & Tahfidz, B. Arab, IPAS, Renang). Pengajar berpengalaman siap mendampingi di kelas reguler maupun privat di rumah.',
                'category' => 'berita',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($news as $n) {
            News::updateOrCreate(['slug' => $n['slug']], $n);
        }

        // 8. Sample Registrations
        $registrations = [
            [
                'student_name' => 'Fathan Alghifari',
                'parent_name' => 'Ibu Rahmawati',
                'phone_number' => '081272218275',
                'education_level' => 'SD/MI',
                'program_type' => 'Privat',
                'selected_subjects' => 'Coding For Kids, Matematika',
                'address' => 'Jl. Sarjana Blok A, Timbangan, Ogan Ilir',
                'notes' => 'Mendaftar Les Private Coding 1 Siswa 1 Tutor.',
                'status' => 'baru',
            ],
            [
                'student_name' => 'Muhammad Rizky',
                'parent_name' => 'Bapak Ahmad',
                'phone_number' => '081234567890',
                'education_level' => 'SMP/MTS',
                'program_type' => 'Kursus',
                'selected_subjects' => 'Coding For Kids',
                'address' => 'Indralaya Utama, Ogan Ilir',
                'notes' => 'Ingin ikut kelas reguler coding sore.',
                'status' => 'dihubungi',
            ],
        ];

        foreach ($registrations as $r) {
            Registration::updateOrCreate(['student_name' => $r['student_name']], $r);
        }
    }
}
