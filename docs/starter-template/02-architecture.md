# Architecture & Project Structure

Dokumen ini menjelaskan struktur project, pola MVC, dan alur request pada starter template ini.

## Daftar Isi

- [Ringkasan Arsitektur](#ringkasan-arsitektur)
- [Struktur Folder](#struktur-folder)
- [Konfigurasi Penting](#konfigurasi-penting)
- [Alur Request](#alur-request)
- [Database Overview](#database-overview)

## Ringkasan Arsitektur

Starter template ini dibangun di atas **CodeIgniter 4** dengan pola **MVC**:

- **Model** menangani akses data
- **View** menangani tampilan
- **Controller** mengatur alur request dan response

Di atas fondasi tersebut, template ini menambahkan:

- autentikasi berbasis session
- route protection dengan filter
- helper global untuk setting, waktu, dan tabel
- UI admin berbasis Tailwind CSS + Flowbite

## Struktur Folder

Berikut struktur utama di dalam folder `app/`:

```text
app/
├── Config/
├── Controllers/
├── Database/
├── Filters/
├── Helpers/
├── Models/
├── Views/
└── docs/
```

### `app/Controllers/`

Berisi controller utama aplikasi:

- `Auth.php` — login, register, logout
- `Dashboard.php` — halaman ringkasan dashboard
- `Users.php` — CRUD pengguna
- `Settings.php` — pengaturan aplikasi
- `Components.php` — demo komponen/library UI
- `BaseController.php` — helper global dan init controller

### `app/Models/`

Model utama:

- `UserModel` — data user
- `SettingModel` — konfigurasi key-value

### `app/Filters/`

Filter route:

- `AuthFilter` — hanya untuk user login
- `GuestFilter` — hanya untuk guest

### `app/Helpers/`

Helper yang dipakai aplikasi:

- `setting_helper.php`
- `time_helper.php`
- `table_helper.php`

### `app/Views/`

Susunan view dibagi menjadi beberapa bagian:

- `layouts/` — layout utama app dan auth
- `partials/` — navbar, sidebar, flash message
- `auth/` — login dan register
- `dashboard/` — halaman dashboard
- `users/` — index, create, edit
- `settings/` — halaman pengaturan
- `components/` — demo komponen frontend

## Konfigurasi Penting

### `app/Config/App.php`

File ini mengatur konfigurasi dasar aplikasi seperti:

- timezone
- locale
- base URL

Starter ini diset untuk:

- timezone: `Asia/Jakarta`
- locale: `id`

### `app/Config/Routes.php`

Routing disusun eksplisit dan **auto route dimatikan**:

```php
$routes->setAutoRoute(false);
```

Route dibagi menjadi 2 grup utama:

- grup `guest` untuk login/register
- grup `auth` untuk dashboard, users, components, settings, logout

### `app/Config/Filters.php`

Digunakan untuk mendaftarkan alias filter dan mengaktifkan CSRF.

### `app/Config/Database.php`

Default koneksi diarahkan ke SQLite di file `writable/database.sqlite`.

## Alur Request

Alur request secara umum:

```text
Browser Request
→ Routes
→ Filter (auth/guest/csrf)
→ Controller
→ Model (jika perlu)
→ View
→ Response ke browser
```

Contoh alur untuk halaman users:

```text
GET /users
→ auth filter
→ Users::index()
→ UserModel + paginate + search
→ view('users/index')
→ HTML response
```

## Layout Arsitektur UI

Layout utama aplikasi menggunakan:

- `app/Views/layouts/app.php`
- `app/Views/partials/navbar.php`
- `app/Views/partials/sidebar.php`
- `app/Views/partials/flash.php`

Sedangkan halaman auth menggunakan layout terpisah:

- `app/Views/layouts/auth.php`

## Database Overview

Starter template ini minimal memiliki dua area data utama:

### Tabel `users`

Digunakan untuk autentikasi dan manajemen user.

Field penting umumnya mencakup:

- `id`
- `name`
- `email`
- `password`
- `created_at`
- `updated_at`

### Tabel `settings`

Digunakan untuk menyimpan konfigurasi aplikasi model key-value.

Contoh key:

- `app_name`
- `app_description`
- `timezone`
- `items_per_page`

## Inisialisasi Global

`BaseController` memuat helper global berikut:

- `form`
- `url`
- `setting`
- `time`
- `table`

Artinya helper-helper ini dapat digunakan langsung di controller/view tanpa load manual berulang.

## Referensi Lanjutan

- Lihat `01-getting-started.md` untuk setup awal.
- Lihat `03-features.md` untuk penjelasan fitur.
- Lihat `04-development-guide.md` untuk cara mengembangkan starter template.
