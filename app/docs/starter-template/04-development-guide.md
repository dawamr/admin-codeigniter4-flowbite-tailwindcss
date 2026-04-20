# Development Guide

Dokumen ini berisi panduan praktis untuk mengembangkan starter template dan menambahkan fitur baru dengan pola yang konsisten.

## Daftar Isi

- [Menambah Menu Baru](#menambah-menu-baru)
- [Membuat CRUD Baru](#membuat-crud-baru)
- [Menambahkan Helper Baru](#menambahkan-helper-baru)
- [Menyesuaikan Layout dan View](#menyesuaikan-layout-dan-view)
- [Menambahkan Library Frontend](#menambahkan-library-frontend)
- [Best Practices](#best-practices)

## Menambah Menu Baru

Untuk menambah halaman baru di admin panel, ikuti pola berikut.

### 1. Tambahkan route

Edit `app/Config/Routes.php` dan tambahkan route di grup `auth` jika halaman hanya untuk user login.

Contoh:

```php
$routes->get('reports', 'Reports::index');
```

### 2. Buat controller

Buat file controller baru di `app/Controllers/`.

Contoh sederhana:

```php
<?php

namespace App\Controllers;

class Reports extends BaseController
{
    public function index()
    {
        return view('reports/index', [
            'title' => 'Reports',
        ]);
    }
}
```

### 3. Buat view

Buat file `app/Views/reports/index.php` dan gunakan layout utama:

```php
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<h1>Reports</h1>
<?= $this->endSection() ?>
```

### 4. Tambahkan menu ke sidebar

Edit `app/Views/partials/sidebar.php` dan tambahkan item ke array `$navItems`.

## Membuat CRUD Baru

Pola CRUD di starter template ini mengikuti struktur seperti modul users.

### Langkah umum

1. Buat migration
2. Buat model
3. Buat controller
4. Buat routes
5. Buat views (`index`, `create`, `edit`)
6. Tambahkan menu jika diperlukan

### Struktur controller CRUD

Umumnya controller memiliki method berikut:

- `index()`
- `create()`
- `store()`
- `edit($id)`
- `update($id)`
- `delete($id)`

### Search dan pagination

Gunakan pola seperti di `Users::index()`:

- ambil query dari `getGet('q')`
- gunakan `like()` / `orLike()`
- gunakan `paginate()`
- kirim `pager` ke view

### Validasi form

Gunakan `$this->validate()` dengan rules yang eksplisit.

Contoh:

```php
$rules = [
    'name' => 'required|min_length[2]|max_length[100]',
];
```

## Menambahkan Helper Baru

Helper baru diletakkan di `app/Helpers/`.

### Contoh langkah

1. Buat file helper baru, misalnya `report_helper.php`
2. Tambahkan function yang dibutuhkan
3. Register helper di `BaseController` bila ingin auto-load

Contoh:

```php
protected $helpers = ['form', 'url', 'setting', 'time', 'table', 'report'];
```

## Menyesuaikan Layout dan View

### Layout utama

Gunakan `layouts/app.php` untuk halaman admin.

### Layout auth

Gunakan `layouts/auth.php` untuk halaman seperti login dan register.

### Section yang tersedia

Umumnya view menggunakan:

- `content`
- `scripts`

### Flash message

Feedback success/error ditampilkan melalui partial:

- `app/Views/partials/flash.php`

## Menambahkan Library Frontend

Semua library frontend saat ini di-load global melalui `app/Views/layouts/app.php`.

### Langkah umum

1. Tambahkan CDN CSS di `<head>` bila diperlukan
2. Tambahkan CDN JS sebelum `renderSection('scripts')`
3. Inisialisasi library di view yang relevan
4. Pastikan dark mode compatibility jika perlu styling tambahan

### Contoh library yang sudah terpasang

- Flowbite
- Chart.js
- Dropzone
- Flatpickr
- Swiper
- Lucide

## Best Practices

### Routing

- Gunakan route eksplisit
- Hindari mengaktifkan auto route jika tidak dibutuhkan
- Kelompokkan route berdasarkan filter `auth` dan `guest`

### Security

- Gunakan `csrf_field()` di semua form POST
- Gunakan `esc()` untuk output di view
- Validasi semua input dengan rule yang jelas
- Hash password melalui model hook / callback

### UI Consistency

- Gunakan komponen Tailwind + Flowbite yang konsisten
- Gunakan Geist sebagai font utama
- Gunakan Lucide untuk semua icon
- Pastikan dark mode tetap rapi

### File Organization

- Simpan logika bisnis di controller/model, bukan di view
- Gunakan helper untuk fungsi utilitas berulang
- Pisahkan layout, partial, dan halaman agar mudah dirawat

## Rekomendasi Pengembangan Lanjutan

Beberapa pengembangan yang mudah ditambahkan dari starter ini:

- role & permission
- profile page
- audit log
- media manager
- API endpoint terproteksi
- reusable form component

## Referensi Lanjutan

- `01-getting-started.md`
- `02-architecture.md`
- `03-features.md`
