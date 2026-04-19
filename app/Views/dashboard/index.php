<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php
$stats = [
    [
        'label'    => 'Total Pengguna',
        'value'    => number_format((int) $totalUsers, 0, ',', '.'),
        'trend'    => '+100%',
        'trendUp'  => true,
        'sub'      => 'Semua akun aktif',
        'gradient' => 'from-blue-500 to-blue-600',
        'icon'     => '<i data-lucide="users" class="w-5 h-5 text-white"></i>',
    ],
    [
        'label'    => 'Sesi Aktif',
        'value'    => '1',
        'trend'    => 'live',
        'trendUp'  => true,
        'sub'      => 'Pengguna online',
        'gradient' => 'from-emerald-500 to-teal-600',
        'icon'     => '<i data-lucide="activity" class="w-5 h-5 text-white"></i>',
    ],
    [
        'label'    => 'Aplikasi',
        'value'    => esc(setting('app_name', 'CI4 Admin')),
        'sub'      => 'v' . \CodeIgniter\CodeIgniter::CI_VERSION,
        'gradient' => 'from-purple-500 to-pink-600',
        'icon'     => '<i data-lucide="monitor" class="w-5 h-5 text-white"></i>',
    ],
    [
        'label'    => 'Items / Halaman',
        'value'    => esc(setting('items_per_page', '10')),
        'sub'      => 'Pengaturan paginasi',
        'gradient' => 'from-amber-500 to-orange-600',
        'icon'     => '<i data-lucide="list" class="w-5 h-5 text-white"></i>',
    ],
];
?>

<!-- Page Header -->
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Selamat datang kembali, <?= esc(session('userName') ?? 'User') ?>.</p>
    </div>
    <div class="flex items-center gap-2">
        <a href="<?= site_url('users/create') ?>"
           class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">
            <i data-lucide="user-plus" class="w-4 h-4"></i>
            Pengguna Baru
        </a>
        <a href="<?= site_url('settings') ?>"
           class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
            <i data-lucide="settings" class="w-4 h-4"></i>
            Pengaturan
        </a>
    </div>
</div>

<!-- Stat Cards -->
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-6">
    <?php foreach ($stats as $s): ?>
        <div class="group relative p-5 bg-white border border-gray-200 rounded-xl shadow-card hover:shadow-card-hover dark:bg-gray-800 dark:border-gray-700 transition-all duration-200">
            <div class="flex items-start justify-between">
                <div class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br <?= $s['gradient'] ?> shadow-sm">
                    <?= $s['icon'] ?>
                </div>
                <?php if (! empty($s['trend'])): ?>
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-medium rounded-full
                        <?= $s['trendUp']
                            ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'
                            : 'bg-rose-50 text-rose-700 dark:bg-rose-500/10 dark:text-rose-400' ?>">
                        <?= esc($s['trend']) ?>
                    </span>
                <?php endif; ?>
            </div>
            <p class="mt-4 text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400"><?= esc($s['label']) ?></p>
            <p class="mt-1 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white truncate"><?= $s['value'] ?></p>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400"><?= esc($s['sub']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<!-- Main Content Grid -->
<div class="grid gap-4 lg:grid-cols-3">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700">
        <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <div>
                <h2 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-white">Pengguna Terbaru</h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">5 pengguna yang baru bergabung</p>
            </div>
            <a href="<?= site_url('users') ?>" class="text-xs font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                Lihat semua →
            </a>
        </div>

        <?php if (empty($recentUsers)): ?>
            <div class="px-5 py-12 text-center">
                <div class="mx-auto w-12 h-12 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                    <i data-lucide="users" class="w-6 h-6 text-gray-400"></i>
                </div>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Belum ada pengguna.</p>
            </div>
        <?php else: ?>
            <ul class="divide-y divide-gray-100 dark:divide-gray-700">
                <?php
                $palette = ['bg-blue-500', 'bg-emerald-500', 'bg-purple-500', 'bg-amber-500', 'bg-rose-500'];
                foreach ($recentUsers as $i => $u): ?>
                    <li class="flex items-center gap-4 px-5 py-3.5 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex-shrink-0 w-9 h-9 rounded-full <?= $palette[$i % count($palette)] ?> text-white text-xs font-semibold flex items-center justify-center">
                            <?= esc(initials($u['name'] ?? '?')) ?>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate"><?= esc($u['name']) ?></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate"><?= esc($u['email']) ?></p>
                        </div>
                        <div class="hidden sm:flex flex-col items-end text-right">
                            <span class="text-xs text-gray-500 dark:text-gray-400"><?= esc(time_ago($u['created_at'] ?? null)) ?></span>
                            <span class="mt-0.5 inline-flex items-center gap-1 text-[11px] text-emerald-700 dark:text-emerald-400">
                                <span class="w-1 h-1 rounded-full bg-emerald-500"></span>
                                User baru
                            </span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <!-- System Info -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700">
        <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
            <h2 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-white">Informasi Sistem</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Status lingkungan aplikasi</p>
        </div>
        <dl class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
            <div class="flex items-center justify-between px-5 py-3">
                <dt class="text-gray-500 dark:text-gray-400">Environment</dt>
                <dd>
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-medium rounded-full
                        <?= ENVIRONMENT === 'production'
                            ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400'
                            : 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400' ?>">
                        <span class="w-1.5 h-1.5 rounded-full <?= ENVIRONMENT === 'production' ? 'bg-emerald-500' : 'bg-amber-500' ?>"></span>
                        <?= esc(ENVIRONMENT) ?>
                    </span>
                </dd>
            </div>
            <div class="flex items-center justify-between px-5 py-3">
                <dt class="text-gray-500 dark:text-gray-400">CodeIgniter</dt>
                <dd class="font-medium text-gray-900 dark:text-white">v<?= \CodeIgniter\CodeIgniter::CI_VERSION ?></dd>
            </div>
            <div class="flex items-center justify-between px-5 py-3">
                <dt class="text-gray-500 dark:text-gray-400">PHP</dt>
                <dd class="font-medium text-gray-900 dark:text-white"><?= PHP_VERSION ?></dd>
            </div>
            <div class="flex items-center justify-between px-5 py-3">
                <dt class="text-gray-500 dark:text-gray-400">Timezone</dt>
                <dd class="font-medium text-gray-900 dark:text-white"><?= esc(app_timezone()) ?></dd>
            </div>
            <div class="flex items-center justify-between px-5 py-3">
                <dt class="text-gray-500 dark:text-gray-400">Database</dt>
                <dd class="font-medium text-gray-900 dark:text-white">SQLite</dd>
            </div>
        </dl>
    </div>
</div>
<?= $this->endSection() ?>
