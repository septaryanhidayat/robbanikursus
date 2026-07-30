# Rencana Pengembangan Website: Robbani Kursus & Privat

## 1. Saran Nama Domain
Untuk representasi lembaga pendidikan yang profesional dan mudah ditemukan secara online (SEO Lokal):
- **robbanikursus.com** (Sangat disarankan, ekstensi `.com` menunjukkan entitas terpercaya di Indonesia)

## 2. Tech Stack & Infrastruktur
- **Framework:** Laravel 13
- **Language:** PHP 8.4
- **Database:** MySQL
- **CSS Framework:** TailwindCSS atau Bootstrap 5 (Sangat direkomendasikan untuk memastikan tampilan responsif *"Mobile-First"* di semua *device*).

## 3. UI/UX & Color Palette (Diekstrak dari Logo & Flyer)
Desain visual akan menggunakan pendekatan ceria, edukatif, namun tetap profesional.
- **Primary Color:** **Navy Blue (`#1E3A8B`)** - Berasal dari teks logo "ROBBANI". Digunakan untuk Header, Footer, Judul Section (Heading).
- **Secondary Color:** **Golden Yellow (`#F59E0B` / `#FBBF24`)** - Berasal dari ilustrasi buku/bintang di logo. Digunakan untuk Tombol CTA (Call to Action), Ikon, dan Highlight teks.
- **Accent Color 1:** **Bright Red (`#EF4444`)** - Berasal dari teks "PRIVAT" di flyer. Digunakan untuk *badge* harga, label "Telah Dibuka!", atau elemen penarik perhatian.
- **Accent Color 2:** **Light Blue (`#38BDF8`)** - Digunakan untuk *background* pada section pendukung agar tidak monoton putih.
- **Typography:** Gunakan font berjenis *Sans-Serif* yang ramah anak namun tegas, seperti **Nunito**, **Quicksand**, atau **Poppins**.

## 4. Struktur Halaman Landing Page
*(Layout dijamin responsif: Sistem grid akan menggunakan 1 kolom penuh di Mobile, dan berjejer 3-4 kolom di Desktop).*

### A. Navbar (Header)
- Logo Robbani Kursus & Privat (Posisi Kiri).
- Menu Navigasi: Beranda, Keunggulan, Program & Biaya, Mata Pelajaran, Kontak.
- Tombol: "Daftar Sekarang" (Menuju link WhatsApp).

### B. Hero Section
- **Headline (H1):** PENDAFTARAN ROBBANI KURSUS & PRIVAT TELAH DIBUKA!
- **Sub-headline:** Belajar jadi lebih mudah, menyenangkan, dan sesuai kebutuhan anak. Mulai dari TK, SD, SMP, hingga SMA, dengan pengajar berpengalaman dan jadwal yang fleksibel.
- **Visual:** Ilustrasi anak belajar ceria (seperti gambar anak berbaju hijau di flyer) atau vektor edukasi.
- **Tombol CTA:** "Tanya Program" (Logo WhatsApp).

### C. Keunggulan Kami (Grid 3 Kolom)
Ditampilkan dengan ikon *Checklist* atau Piala:
1. Pengajar berpengalaman
2. Bebas pilih mata pelajaran
3. Menyesuaikan dengan kebutuhan siswa
4. Jadwal fleksibel
5. Pendampingan belajar personal
6. Bisa Privat di rumah

### D. Pilihan Program & Mata Pelajaran
**Program Utama (Cards):**
- Semua Mata Pelajaran
- Kelas Tahsin & Tahfidz
- Kursus Komputer

**Mata Pelajaran (Pill Badges):**
Calistung, Bahasa Inggris, Matematika, Tahsin & Tahfidz, Bahasa Arab, IPAS, Renang.

### E. Rincian Biaya (Pricing Table / Cards)
Dibuat dengan dua tab/kolom berdampingan:

**1. KURSUS (Reguler)**
- TK/SD: Rp. 240.000/Bulan
- SMP/MTS: Rp. 280.000/Bulan
- SMA/MA: Rp. 320.000/Bulan

**2. PRIVAT**
- TK/SD: Rp. 30.000/Pertemuan
- SMP/MTS: Rp. 35.000/Pertemuan
- SMA/MA: Rp. 40.000/Pertemuan

### F. Call to Action (CTA) Banner Section
- **Slogan Besar:** Belajar Seru, Prestasi Meraih, Masa Depan Gemilang!
- **Deskripsi:** Yuk, daftarkan putra-putri Anda dan wujudkan prestasi terbaik bersama Robbani Kursus & Privat! Tempat terbaik untuk membantu anak meraih prestasi dan percaya diri.
- **Tombol Utama:** "Hubungi Kami via WA"

### G. Footer & Kontak
- **Informasi & Pendaftaran:**
  - WhatsApp: 0812-7221-8275
  - Alamat: Jl. Sarjana Blok A 25, Kel. Timbangan, Indralaya Utara Ogan Ilir
  - Instagram: @robbanikursus_privat
- **Copyright:** © 2026 Robbani Kursus & Privat.

---

## 5. Rancangan Awal Skema Database (MySQL)
Jika website nantinya dikembangkan dari sekadar *Landing Page* menjadi Sistem Informasi (Dashboard Manajemen):

- `users` (Tabel untuk Super Admin, Staff, Pengajar, Siswa)
- `programs` (Data program: Reguler, Privat, Tahsin, dll)
- `subjects` (Data mata pelajaran yang tersedia)
- `registrations` (Menampung *leads* atau data pendaftaran online dari website)
- `pricing` (Manajemen harga kursus per tingkatan agar dinamis tanpa mengubah koding)

Buat di dalam dashboard admin untuk mengelola websitenya, seperti berita, logo, banner, foto, nama kursus, harga, dll