# CI4 + Flowbite Admin Starter

Production-ready admin dashboard starter berbasis **CodeIgniter 4** dengan **Tailwind CSS + Flowbite** (via CDN) dan **SQLite**.

## Fitur

- Authentication (Login + Register) dengan session, CSRF, dan password hashing
- Dashboard overview (stat cards + recent users)
- User Management (CRUD + search + pagination)
- Application Settings (key-value)
- Route-level protection via `AuthFilter` / `GuestFilter`
- Dark mode toggle (persisted ke `localStorage`)
- Responsive sidebar + navbar (Flowbite)

## Requirements

- PHP 7.4+ / 8.x dengan ekstensi `sqlite3`, `intl`, `mbstring`
- Composer

## Quick Start

```bash
composer install
cp env .env                      # sesuaikan CI_ENVIRONMENT & app.baseURL bila perlu

# Siapkan database SQLite
touch writable/database.sqlite

# Jalankan migration + seeder
php spark migrate
php spark db:seed UserSeeder
php spark db:seed SettingSeeder

# Jalankan dev server
php spark serve
```

Buka `http://localhost:8080`.

**Default credentials:**
- Email: `admin@example.com`
- Password: `password`

## Struktur Folder Utama

```
app/
├── Controllers/      Auth, Dashboard, Users, Settings
├── Models/           UserModel, SettingModel
├── Filters/          AuthFilter, GuestFilter
├── Database/         Migrations + Seeds
├── Helpers/          setting_helper (fungsi `setting()`)
└── Views/
    ├── layouts/      app.php (sidebar+navbar), auth.php (centered)
    ├── partials/     sidebar, navbar, flash
    ├── auth/         login, register
    ├── dashboard/
    ├── users/        index, create, edit
    └── settings/
```

## Security

- **CSRF**: aktif global (`app/Config/Filters.php` -> `globals.before`). Semua form pakai `<?= csrf_field() ?>`.
- **Password**: `password_hash(PASSWORD_DEFAULT)` via callback `beforeInsert`/`beforeUpdate` di `UserModel`.
- **Validation**: rules eksplisit di controller (`$this->validate(...)`).
- **Route Protection**: group `['filter' => 'auth']` dan `['filter' => 'guest']` di `app/Config/Routes.php`.
- **Output escaping**: `esc()` di seluruh view.

## Menambah Menu Baru

1. Tambahkan route di `app/Config/Routes.php` (grup auth).
2. Buat controller di `app/Controllers/`.
3. Buat view (extend `layouts/app`).
4. Tambahkan link di `app/Views/partials/sidebar.php`.

## Catatan

- Tailwind + Flowbite di-load via **CDN** — cocok untuk starter & prototyping. Untuk produksi skala besar, disarankan migrasi ke Tailwind CLI untuk tree-shaking.
- SQLite default di `writable/database.sqlite`. Ubah ke MySQL dengan edit `app/Config/Database.php`.

---

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
