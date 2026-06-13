# Platform Blog - Content Management System (CMS)

**Pengembang:** Aldza Salwatul Aisy  
**NIM:** 240605110228  
**Mata Kuliah:** Pemrograman Aplikasi Web  
**Institusi:** UIN Maulana Malik Ibrahim Malang  

---

## Ringkasan Proyek

Project ini merupakan sebuah sistem manajemen konten (CMS) berbasis website untuk mengelola web blog yang dirancang menggunakan framework Laravel. Sistem ini memisahkan hak akses dan fungsionalitas menjadi dua bagian utama:

1. **Dashboard CMS (Sisi Administrator)** — Area backend khusus yang mewajibkan proses autentikasi (login) bagi penulis. Di halaman ini, admin atau penulis memiliki kendali penuh untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada manajemen data artikel, biodata penulis, serta pengelompokan kategori.
2. **Portal Publik (Sisi Pengunjung)** — Halaman depan yang bersifat terbuka untuk khalayak umum tanpa restriksi login. Halaman ini menyajikan kompilasi 5 postingan artikel paling mutakhir, komponen widget filter kategori, serta halaman khusus untuk membaca detail artikel lengkap dengan rekomendasi konten terkait.

---

## Spesifikasi Teknologi

Konten dan sistem web ini berjalan di atas ekosistem teknologi berikut:
- PHP 8.2
- Framework Laravel 12
- Database MySQL
- Bootstrap 5 (Front-end Framework)
- XAMPP Developer Environment

---

## Panduan Instalasi dan Deployment Lokal

### Kebutuhan Sistem
Pastikan perangkat lokal Anda telah terpasang software pendukung berikut sebelum memulai instalasi:
- XAMPP Control Panel (termasuk PHP 8.2 & MySQL Server)
- Composer Package Manager
- Git CLI

### Prosedur Pemasangan

**1. Pengunduhan Repositori Project**

Buka terminal atau Git Bash, lalu jalankan perintah cloning dan masuk ke direktori kerja utama:

```bash
git clone https://github.com/aldza267/aplikasi-blog-240605110228.git
cd aplikasi-blog-240605110228
```

**2. Pemasangan Package Dependencies**

Unduh seluruh pustaka framework yang dibutuhkan menggunakan Composer:

`ash
composer install
`

**3. Inisialisasi Environment File**

Duplikat file konfigurasi bawaan, kemudian generate security key aplikasi Anda:

`ash
cp .env.example .env
php artisan key:generate
`

**4. Penyelarasan Konfigurasi Basis Data**

Akses file .env menggunakan kode editor pilihan Anda (seperti VS Code), lalu sesuaikan baris konfigurasi database berikut:

`
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
`

**5. Inisialisasi Database via phpMyAdmin**

Buka kontrol panel phpMyAdmin Anda di browser, buat database baru dengan nama db_blog, kemudian lakukan proses import file db_blog.sql yang berada di dalam folder root project ini.

**6. Eksekusi Skema Migrasi**

Sinkronkan struktur tabel sistem dengan menjalankan perintah database migration:

`ash
php artisan migrate
`

**7. Menghubungkan Direktori Media (Storage Link)**

Buat tautan simbolis agar aset gambar atau foto profil penulis yang diunggah dapat diakses oleh publik:

`ash
php artisan storage:link
`

**8. Menjalankan Server Lokal**

Aktifkan local development server Laravel dengan mengetikkan perintah:

`ash
php artisan serve
`

**9. Akses Aplikasi**

Buka browser kesayangan Anda dan kunjungi alamat URL: http://localhost:8000

---

## Kredensial Login Administrator

Gunakan akun di bawah ini untuk menguji fungsionalitas menu backend CMS:

| Email / Username | Password |
|------------------|----------|
| aldzaaisy@blog.com | admin123 |

---

## Dokumentasi Video Demonstrasi

Seluruh alur jalannya sistem mulai dari manajemen data admin, posting artikel, hingga pengujian filter di halaman utama dapat Anda saksikan melalui tautan video berikut:

👉 [Link Video yt Demonstrasi](https://youtu.be/mujrOn4cXrA?si=nfhOTWAGwJNwgbR4)
