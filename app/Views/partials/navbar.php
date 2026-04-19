<?php
$appName  = setting('app_name', 'CI4 Admin');
$userName = session('userName') ?? 'User';
?>
<nav class="fixed top-0 z-50 w-full bg-white/80 backdrop-blur border-b border-gray-200 dark:bg-gray-900/80 dark:border-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-700 transition-colors">
                    <span class="sr-only">Open sidebar</span>
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <a href="<?= site_url('dashboard') ?>" class="flex items-center ms-2 md:me-24">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 shadow-sm me-2.5">
                        <i data-lucide="zap" class="w-4 h-4 text-white"></i>
                    </span>
                    <span class="self-center text-base font-semibold tracking-tight text-gray-900 dark:text-white whitespace-nowrap"><?= esc($appName) ?></span>
                </a>
            </div>

            <div class="flex items-center gap-1">
                <button id="theme-toggle" type="button" class="inline-flex items-center justify-center w-9 h-9 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors">
                    <i data-lucide="moon" id="theme-toggle-dark-icon" class="hidden w-[18px] h-[18px]"></i>
                    <i data-lucide="sun" id="theme-toggle-light-icon" class="hidden w-[18px] h-[18px]"></i>
                    <span class="sr-only">Toggle dark mode</span>
                </button>

                <div class="relative ms-1">
                    <button type="button"
                            class="flex items-center gap-2 p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 text-white text-xs font-semibold">
                            <?= esc(initials($userName)) ?>
                        </span>
                    </button>
                    <div class="z-50 hidden my-2 w-56 text-sm list-none bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden" id="dropdown-user">
                        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate"><?= esc($userName) ?></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate"><?= esc(session('userEmail')) ?></p>
                        </div>
                        <ul class="py-1">
                            <li>
                                <a href="<?= site_url('settings') ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                                    <i data-lucide="settings" class="w-4 h-4 text-gray-400"></i>
                                    Pengaturan
                                </a>
                            </li>
                        </ul>
                        <div class="border-t border-gray-100 dark:border-gray-700 py-1">
                            <a href="<?= site_url('logout') ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10 transition-colors">
                                <i data-lucide="log-out" class="w-4 h-4"></i>
                                Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
