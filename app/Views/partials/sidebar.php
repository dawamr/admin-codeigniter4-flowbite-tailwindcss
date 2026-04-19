<?php
$current = service('uri')->getSegment(1);

$navItems = [
    [
        'segment' => 'dashboard',
        'label'   => 'Dashboard',
        'href'    => site_url('dashboard'),
        'icon'    => '<i data-lucide="layout-dashboard" class="w-[18px] h-[18px]"></i>',
    ],
    [
        'segment' => 'users',
        'label'   => 'Pengguna',
        'href'    => site_url('users'),
        'icon'    => '<i data-lucide="users" class="w-[18px] h-[18px]"></i>',
    ],
    [
        'segment' => 'components',
        'label'   => 'Komponen',
        'href'    => site_url('components'),
        'icon'    => '<i data-lucide="layers" class="w-[18px] h-[18px]"></i>',
    ],
    [
        'segment' => 'settings',
        'label'   => 'Pengaturan',
        'href'    => site_url('settings'),
        'icon'    => '<i data-lucide="settings" class="w-[18px] h-[18px]"></i>',
    ],
];
?>
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-900 dark:border-gray-800" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto flex flex-col justify-between">
        <div>
            <p class="px-3 pt-2 pb-3 text-[11px] font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">Menu</p>
            <ul class="space-y-0.5">
                <?php foreach ($navItems as $item): ?>
                    <?php $active = $item['segment'] === $current; ?>
                    <li>
                        <a href="<?= $item['href'] ?>"
                           class="relative flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors duration-150 <?= $active
                                ? 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 font-medium'
                                : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' ?>">
                            <span class="<?= $active ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 dark:text-gray-500' ?>">
                                <?= $item['icon'] ?>
                            </span>
                            <span class="flex-1"><?= esc($item['label']) ?></span>
                            <?php if ($active): ?>
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-800">
            <a href="<?= site_url('logout') ?>"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-300 hover:bg-red-50 hover:text-red-700 dark:hover:bg-red-500/10 dark:hover:text-red-400 transition-colors duration-150">
                <i data-lucide="log-out" class="w-[18px] h-[18px] text-gray-400 dark:text-gray-500"></i>
                <span>Keluar</span>
            </a>
        </div>
    </div>
</aside>
