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
use Illuminate\Support\Str;

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
            'hero_headline' => 'PENDAFTARAN ROBBANI KURSUS & PRIVAT TELAH DIBUKA!',
            'hero_subheadline' => 'Belajar jadi lebih mudah, menyenangkan, dan sesuai kebutuhan anak. Mulai dari TK, SD, SMP, hingga SMA, dengan pengajar berpengalaman dan jadwal yang fleksibel.',
            'contact_phone' => '0812-7221-8275',
            'contact_address' => 'Jl. Sarjana Blok A 25, Kel. Timbangan, Indralaya Utara Ogan Ilir',
            'contact_instagram' => '@robbanikursus_privat',
            'cta_banner_title' => 'Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!',
            'cta_banner_description' => 'Yuk, daftarkan putra-putri Anda dan wujudkan prestasi terbaik bersama Robbani Kursus & Privat! Tempat terbaik untuk membantu anak meraih prestasi dan percaya diri.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::setByKey($key, $value);
        }

        // 3. Advantages
        $advantages = [
            [
                'title' => 'Pengajar Berpengalaman',
                'description' => 'Tutor profesional dan sabar yang berdedikasi membimbing perkembangan anak.',
                'icon' => 'award',
                'order' => 1,
            ],
            [
                'title' => 'Bebas Pilih Mata Pelajaran',
                'description' => 'Siswa dapat memilih kombinasi mata pelajaran sesuai dengan kebutuhan belajar.',
                'icon' => 'book-open',
                'order' => 2,
            ],
            [
                'title' => 'Menyesuaikan Kebutuhan Siswa',
                'description' => 'Metode pembelajaran yang disesuaikan dengan ritme dan gaya belajar masing-masing anak.',
                'icon' => 'user-check',
                'order' => 3,
            ],
            [
                'title' => 'Jadwal Fleksibel',
                'description' => 'Waktu kursus yang disepakati bersama sehingga tidak mengganggu aktivitas sekolah.',
                'icon' => 'clock',
                'order' => 4,
            ],
            [
                'title' => 'Pendampingan Belajar Personal',
                'description' => 'Fokus penuh pada setiap anak untuk membantu mengatasi kendala dalam pelajaran.',
                'icon' => 'heart-handshake',
                'order' => 5,
            ],
            [
                'title' => 'Bisa Privat di Rumah',
                'description' => 'Pengajar datang langsung ke rumah Anda untuk kenyamanan dan keamanan belajar.',
                'icon' => 'home',
                'order' => 6,
            ],
        ];

        foreach ($advantages as $adv) {
            Advantage::updateOrCreate(['title' => $adv['title']], $adv);
        }

        // 4. Main Programs
        $programs = [
            [
                'title' => 'Semua Mata Pelajaran',
                'description' => 'Bimbingan komprehensif untuk seluruh mata pelajaran akademik dari TK hingga SMA.',
                'badge_number' => '123',
                'icon' => 'layers',
                'order' => 1,
            ],
            [
                'title' => 'Kelas Tahsin & Tahfidz',
                'description' => 'Pembelajaran membaca Al-Qur\'an dengan tajwid yang benar dan bimbingan hafalan.',
                'badge_number' => '📖',
                'icon' => 'book',
                'order' => 2,
            ],
            [
                'title' => 'Kursus Komputer',
                'description' => 'Keterampilan dasar komputer, aplikasi perkantoran, dan pengenalan teknologi modern.',
                'badge_number' => '💻',
                'icon' => 'monitor',
                'order' => 3,
            ],
        ];

        foreach ($programs as $prog) {
            Program::updateOrCreate(['title' => $prog['title']], $prog);
        }

        // 5. Subjects
        $subjects = [
            ['name' => 'Calistung', 'badge_color' => 'amber', 'order' => 1],
            ['name' => 'Bahasa Inggris', 'badge_color' => 'blue', 'order' => 2],
            ['name' => 'Matematika', 'badge_color' => 'indigo', 'order' => 3],
            ['name' => 'Tahsin & Tahfidz', 'badge_color' => 'emerald', 'order' => 4],
            ['name' => 'Bahasa Arab', 'badge_color' => 'teal', 'order' => 5],
            ['name' => 'IPAS', 'badge_color' => 'purple', 'order' => 6],
            ['name' => 'Renang', 'badge_color' => 'cyan', 'order' => 7],
        ];

        foreach ($subjects as $subj) {
            Subject::updateOrCreate(['name' => $subj['name']], $subj);
        }

        // 6. Pricing Tiers
        $pricings = [
            // Kursus (Reguler)
            ['type' => 'kursus', 'level' => 'TK/SD', 'price' => 240000, 'period' => 'Bulan', 'order' => 1],
            ['type' => 'kursus', 'level' => 'SMP/MTS', 'price' => 280000, 'period' => 'Bulan', 'order' => 2],
            ['type' => 'kursus', 'level' => 'SMA/MA', 'price' => 320000, 'period' => 'Bulan', 'order' => 3],

            // Privat
            ['type' => 'privat', 'level' => 'TK/SD', 'price' => 30000, 'period' => 'Pertemuan', 'order' => 1],
            ['type' => 'privat', 'level' => 'SMP/MTS', 'price' => 35000, 'period' => 'Pertemuan', 'order' => 2],
            ['type' => 'privat', 'level' => 'SMA/MA', 'price' => 40000, 'period' => 'Pertemuan', 'order' => 3],
        ];

        foreach ($pricings as $p) {
            Pricing::updateOrCreate(['type' => $p['type'], 'level' => $p['level']], $p);
        }

        // 7. Initial News & Announcements
        $news = [
            [
                'title' => 'Pendaftaran Gelombang Baru Tahun Ajaran 2026/2027 Telah Dibuka!',
                'slug' => 'pendaftaran-gelombang-baru-2026-2027',
                'summary' => 'Dapatkan promo pendaftaran dan fasilitas lengkap untuk bimbingan belajar reguler maupun privat.',
                'content' => 'Robbani Kursus & Privat kembali membuka pendaftaran siswa baru untuk semua jenjang (TK/PAUD, SD/MI, SMP/MTS, dan SMA/MA). Dapatkan bimbingan belajar personal dengan pengajar berpengalaman dan metode seru yang menyenangkan anak.',
                'category' => 'pengumuman',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Tips Belajar Efektif & Menyenangkan di Rumah untuk Anak SD & SMP',
                'slug' => 'tips-belajar-efektif-dan-menyenangkan-di-rumah',
                'summary' => 'Bagaimana orang tua membantu menciptakan suasana belajar yang kondusif tanpa membuat anak merasa tertekan.',
                'content' => 'Belajar di rumah bisa menjadi momen yang menyenangkan apabila dilakukan dengan gaya interaktif dan bimbingan yang tepat. Simak 5 langkah praktis untuk meningkatkan konsentrasi dan percaya diri anak dalam belajar.',
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
                'student_name' => 'Muhammad Rizky',
                'parent_name' => 'Bapak Ahmad',
                'phone_number' => '081234567890',
                'education_level' => 'SD/MI',
                'program_type' => 'Privat',
                'selected_subjects' => 'Matematika, Bahasa Inggris',
                'address' => 'Indralaya Utara, Ogan Ilir',
                'notes' => 'Ingin jadwal privat setiap hari Selasa & Kamis sore.',
                'status' => 'baru',
            ],
            [
                'student_name' => 'Aisyah Putri',
                'parent_name' => 'Ibu Siti',
                'phone_number' => '081987654321',
                'education_level' => 'TK/PAUD',
                'program_type' => 'Kursus',
                'selected_subjects' => 'Calistung, Tahsin & Tahfidz',
                'address' => 'Timbangan, Indralaya',
                'notes' => 'Kelas sore jam 15:30.',
                'status' => 'dihubungi',
            ],
        ];

        foreach ($registrations as $r) {
            Registration::updateOrCreate(['student_name' => $r['student_name']], $r);
        }
    }
}
