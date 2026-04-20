# Features & UI Components

Dokumen ini merangkum fitur utama starter template, komponen UI yang digunakan, serta helper dan library frontend yang sudah terintegrasi.

## Daftar Isi

- [Authentication](#authentication)
- [Dashboard](#dashboard)
- [User Management](#user-management)
- [Application Settings](#application-settings)
- [UI System](#ui-system)
- [Integrated Libraries](#integrated-libraries)
- [Helper Functions](#helper-functions)

## Authentication

Fitur autentikasi ditangani oleh `app/Controllers/Auth.php`.

### Fitur yang tersedia

- Login
- Register
- Logout
- Session-based authentication
- Validasi input login dan register
- Flash message untuk feedback user

### Session yang disimpan saat login

Saat login berhasil, aplikasi menyimpan:

- `userId`
- `userName`
- `userEmail`
- `isLoggedIn`

### Proteksi route

Route login dan register hanya untuk guest, sedangkan dashboard dan seluruh area admin hanya bisa diakses user login.

## Dashboard

Halaman dashboard dirancang sebagai ringkasan cepat kondisi aplikasi.

### Isi dashboard

- stat cards modern
- quick actions
- recent users / activity feed
- informasi sistem

Dashboard menggunakan layout visual yang konsisten dengan Flowbite + Tailwind dan mendukung dark mode.

## User Management

Halaman users tersedia di route `/users` dan dikendalikan oleh `app/Controllers/Users.php`.

### Fitur utama

- daftar user
- pencarian berdasarkan nama atau email
- pagination berdasarkan setting `items_per_page`
- tambah user
- edit user
- hapus user
- proteksi agar user tidak bisa menghapus akun yang sedang login

### UI users table

Table users telah ditingkatkan dengan:

- avatar initials
- checkbox select-all dan row checkbox
- empty state yang informatif
- custom pagination range info
- styling table yang konsisten dengan Flowbite
- dark mode support

## Application Settings

Halaman pengaturan tersedia di route `/settings`.

### Pengaturan yang tersedia

- `app_name`
- `app_description`
- `timezone`
- `items_per_page`

Semua data setting disimpan dengan pola key-value melalui `SettingModel`.

## UI System

Starter template ini menggunakan kombinasi berikut:

- **Tailwind CSS** via CDN
- **Flowbite** via CDN
- **Geist** sebagai font utama
- **Lucide** sebagai icon set utama

### Layout utama

UI admin dibangun dari komponen berikut:

- `layouts/app.php`
- `partials/navbar.php`
- `partials/sidebar.php`
- `partials/flash.php`

### Dark Mode

Dark mode disimpan di `localStorage` dengan key:

```text
color-theme
```

Saat halaman dimuat, class `dark` akan dipasang lebih awal untuk menghindari flash style.

### Sidebar

Sidebar mendukung:

- menu aktif dengan indicator dot
- ikon Lucide
- tampilan responsif
- menu utama: Dashboard, Pengguna, Komponen, Pengaturan

### Icons

Icon menggunakan sintaks seperti berikut:

```html
<i data-lucide="users" class="w-4 h-4"></i>
```

Inisialisasi icon dilakukan di layout utama dengan:

```javascript
lucide.createIcons();
```

## Integrated Libraries

Library frontend dimuat global melalui `app/Views/layouts/app.php`.

### Chart.js

Digunakan untuk demo grafik di halaman `/components`.

Varian yang sudah dicontohkan:

- line chart
- bar chart
- area chart
- doughnut chart
- radar chart

### Dropzone

Digunakan untuk demo upload area drag-and-drop.

Catatan:

- `Dropzone.autoDiscover = false;`
- demo saat ini hanya client-side

### Flatpickr

Digunakan untuk pemilihan tanggal dan waktu.

Implementasi demo meliputi:

- tanggal tunggal
- tanggal + waktu
- range tanggal
- locale Indonesia

### Swiper

Digunakan untuk carousel demo.

Implementasi demo meliputi:

- image carousel
- cards carousel
- autoplay, navigation, pagination
- responsive breakpoints

## Helper Functions

### `setting()`

Mengambil nilai setting dari penyimpanan key-value.

### `time_ago()`

Mengubah datetime menjadi format relatif bahasa Indonesia.

Contoh:

- `baru saja`
- `5 menit yang lalu`
- `kemarin`

### `format_datetime()`

Memformat tanggal/waktu ke format yang lebih ramah pengguna dengan nama bulan Indonesia.

### `initials()`

Menghasilkan inisial maksimal 2 huruf dari nama user.

Contoh:

- `Dawam Raja` → `DR`
- `Admin` → `A`

### `pagination_range_info()`

Membantu menampilkan informasi pagination seperti:

```text
Menampilkan 1-10 dari 100
```

## Referensi Lanjutan

- Lihat `02-architecture.md` untuk memahami struktur teknis aplikasi.
- Lihat `04-development-guide.md` untuk cara menambah fitur baru.
