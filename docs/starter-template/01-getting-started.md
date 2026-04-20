# Getting Started

Panduan ini menjelaskan cara menjalankan starter template **CI4 + Flowbite Admin Starter** di environment lokal.

## Daftar Isi

- [Requirements](#requirements)
- [Instalasi](#instalasi)
- [Setup Environment](#setup-environment)
- [Setup Database SQLite](#setup-database-sqlite)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Default Login](#default-login)
- [Troubleshooting](#troubleshooting)

## Requirements

Project ini membutuhkan:

- PHP `7.4+` atau `8.x`
- Composer
- Ekstensi PHP:
  - `sqlite3`
  - `intl`
  - `mbstring`

## Instalasi

Jalankan perintah berikut dari root project:

```bash
composer install
cp env .env
```

Setelah itu, sesuaikan file `.env` bila perlu, terutama untuk:

- `CI_ENVIRONMENT`
- `app.baseURL`

## Setup Environment

Starter template ini menggunakan konfigurasi default CodeIgniter 4, dengan penyesuaian berikut:

- Locale default: `id`
- Timezone default: `Asia/Jakarta`
- Routing otomatis dinonaktifkan (`setAutoRoute(false)`)
- Proteksi route menggunakan filter `auth` dan `guest`

Konfigurasi utama bisa dilihat di file:

- `app/Config/App.php`
- `app/Config/Routes.php`
- `app/Config/Filters.php`
- `app/Config/Database.php`

## Setup Database SQLite

Project ini menggunakan SQLite secara default.

### 1. Buat file database

```bash
touch writable/database.sqlite
```

### 2. Jalankan migration

```bash
php spark migrate
```

### 3. Jalankan seeder

```bash
php spark db:seed UserSeeder
php spark db:seed SettingSeeder
```

Seeder akan membuat data awal seperti:

- akun admin
- konfigurasi aplikasi dasar

## Menjalankan Aplikasi

Gunakan development server bawaan CodeIgniter:

```bash
php spark serve
```

Aplikasi akan tersedia di:

```text
http://localhost:8080
```

## Default Login

Gunakan kredensial berikut untuk login awal:

- Email: `admin@example.com`
- Password: `password`

## Alur Akses Awal

Setelah aplikasi dibuka:

1. User belum login akan diarahkan ke `/login`
2. Setelah login berhasil, user diarahkan ke `/dashboard`
3. Semua route utama seperti `/users`, `/components`, dan `/settings` dilindungi filter `auth`

## Troubleshooting

### Migration gagal

Periksa apakah ekstensi `sqlite3` aktif di PHP.

### Login gagal dengan user default

Pastikan seeder `UserSeeder` sudah dijalankan ulang setelah migration.

### Aplikasi redirect terus ke login

Periksa session dan pastikan route berada di dalam grup `auth` / `guest` yang sesuai pada `app/Config/Routes.php`.

### Styling Tailwind / Flowbite tidak muncul

Pastikan koneksi internet aktif karena asset UI dimuat melalui CDN:

- Tailwind CSS CDN
- Flowbite CDN
- Lucide CDN
- Chart.js CDN
- Dropzone CDN
- Flatpickr CDN
- Swiper CDN

## Referensi Lanjutan

- Lihat `02-architecture.md` untuk memahami struktur project.
- Lihat `03-features.md` untuk daftar fitur starter template.
- Lihat `04-development-guide.md` untuk panduan pengembangan lanjutan.
