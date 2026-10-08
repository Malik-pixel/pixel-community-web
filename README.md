# Web Pixel Community

Web Pixel Community adalah sebuah platform e-learning modern yang dibangun dengan menggunakan kerangka kerja (framework) Laravel, Tailwind CSS, dan Alpine.js. Platform ini dirancang untuk memberikan pengalaman belajar yang interaktif dan intuitif bagi penggunanya.

## 🚀 Fitur Utama

- **Autentikasi Pengguna**: Login, registrasi, dan manajemen profil yang aman menggunakan Laravel Breeze.
- **Dashboard Interaktif**: Halaman ringkasan yang menampilkan kemajuan belajar dan aktivitas pengguna.
- **Katalog Kelas (Courses)**: Daftar kelas yang tersedia dengan fitur filter dan pencarian.
- **Detail Kelas**: Halaman informasi lengkap mengenai kelas, instruktur, silabus, dan ulasan.
- **Antarmuka Belajar (Learn & Videos)**: Halaman khusus untuk menonton video pembelajaran dan mengakses materi kursus.
- **Desain Responsif**: Tampilan yang dioptimalkan untuk berbagai perangkat (desktop, tablet, maupun mobile) menggunakan Tailwind CSS.

## 🛠️ Tech Stack

- **Backend**: [Laravel 10](https://laravel.com/) (PHP 8.1+)
- **Frontend**: [Tailwind CSS 3](https://tailwindcss.com/), [Alpine.js](https://alpinejs.dev/)
- **Bundler**: [Vite](https://vitejs.dev/)
- **Database**: MySQL / PostgreSQL (didukung oleh Eloquent ORM)

## 📋 Prasyarat

Sebelum memulai instalasi, pastikan sistem Anda memiliki beberapa perangkat lunak berikut:

- PHP >= 8.1
- Composer
- Node.js & NPM
- Database (MySQL/MariaDB/PostgreSQL)

## ⚙️ Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di mesin lokal Anda:

1. **Clone repository ini**
   ```bash
   git clone https://github.com/username-anda/web-pixel-community.git
   cd web-pixel-community
   ```

2. **Install dependensi PHP**
   ```bash
   composer install
   ```

3. **Install dependensi Node.js**
   ```bash
   npm install
   ```

4. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` lalu sesuaikan konfigurasi database Anda.
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database** (opsional: jika ada seeder, gunakan `php artisan migrate --seed`)
   ```bash
   php artisan migrate
   ```

7. **Kompilasi Aset Frontend**
   Untuk tahap pengembangan (development):
   ```bash
   npm run dev
   ```
   Untuk produksi (production):
   ```bash
   npm run build
   ```

8. **Jalankan Local Server**
   ```bash
   php artisan serve
   ```

Aplikasi dapat diakses melalui browser pada `http://localhost:8000`.

## 📸 Tampilan Layar (Screenshots)

*(Tambahkan beberapa screenshot halaman utama seperti Dashboard, Katalog Kelas, dan Halaman Video di sini)*

## 📄 Lisensi

Proyek ini merupakan perangkat lunak sumber terbuka (open-source) yang dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).
