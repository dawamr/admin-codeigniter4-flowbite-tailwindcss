<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php $palette = ['bg-blue-500', 'bg-emerald-500', 'bg-purple-500', 'bg-amber-500', 'bg-rose-500', 'bg-indigo-500']; ?>

<!-- Page Header -->
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Pengguna</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola pengguna aplikasi Anda.</p>
    </div>
    <a href="<?= site_url('users/create') ?>"
       class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Pengguna Baru
    </a>
</div>

<!-- Table Container -->
<div class="relative overflow-x-auto bg-white shadow-sm rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <!-- Toolbar -->
    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
        <form method="get" action="<?= site_url('users') ?>" class="flex items-center gap-2">
            <div class="relative flex-1 max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                </div>
                <input type="text" name="q" value="<?= esc($search) ?>" placeholder="Cari nama atau email..."
                       class="w-full pl-9 pr-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 transition">
            </div>
            <button type="submit" class="inline-flex items-center px-3.5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">Cari</button>
            <?php if ($search !== ''): ?>
                <a href="<?= site_url('users') ?>" class="inline-flex items-center px-3 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Table / Empty State -->
    <?php if (empty($users)): ?>
        <div class="px-6 py-16 text-center">
            <div class="mx-auto w-14 h-14 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                <i data-lucide="users" class="w-7 h-7 text-gray-400"></i>
            </div>
            <h3 class="mt-4 text-sm font-semibold text-gray-900 dark:text-white">
                <?= $search !== '' ? 'Tidak ada hasil' : 'Belum ada pengguna' ?>
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?= $search !== ''
                    ? 'Coba ubah kata kunci pencarian Anda.'
                    : 'Mulai dengan menambahkan pengguna pertama Anda.' ?>
            </p>
            <?php if ($search === ''): ?>
                <a href="<?= site_url('users/create') ?>"
                   class="mt-4 inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Tambah Pengguna
                </a>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <thead class="text-sm text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 rounded bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
                            <label for="checkbox-all" class="sr-only">Pilih semua</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">Pengguna</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Bergabung</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $i => $u): ?>
                    <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-<?= $u['id'] ?>" type="checkbox" value="<?= $u['id'] ?>" class="w-4 h-4 rounded bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 row-checkbox">
                                <label for="checkbox-<?= $u['id'] ?>" class="sr-only">Pilih <?= esc($u['name']) ?></label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full <?= $palette[$i % count($palette)] ?> text-white text-xs font-semibold flex items-center justify-center">
                                    <?= esc(initials($u['name'] ?? '?')) ?>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-medium text-gray-900 dark:text-white whitespace-nowrap truncate"><?= esc($u['name']) ?></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">ID #<?= esc($u['id']) ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4"><?= esc($u['email']) ?></td>
                        <td class="px-6 py-4">
                            <span title="<?= esc($u['created_at']) ?>"><?= esc(time_ago($u['created_at'] ?? null)) ?></span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="<?= site_url('users/' . $u['id'] . '/edit') ?>" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php if ($pager && $pager->getPageCount() > 1): ?>
            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                    <?= pagination_range_info($pager) ?>
                </span>
                <ul class="flex -space-x-px text-sm">
                    <!-- Previous -->
                    <?php if ($pager->getCurrentPage() > 1): ?>
                        <li>
                            <a href="<?= $pager->getPreviousPageURI() ?>" class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 hover:bg-gray-50 hover:text-gray-700 font-medium rounded-l-lg text-sm px-3 h-9 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                Previous
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <span class="flex items-center justify-center text-gray-300 bg-white border border-gray-200 cursor-not-allowed font-medium rounded-l-lg text-sm px-3 h-9 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-600">
                                Previous
                            </span>
                        </li>
                    <?php endif; ?>

                    <!-- Page Numbers -->
                    <?php
                    $currentPage = $pager->getCurrentPage();
                    $pageCount = $pager->getPageCount();
                    $start = max(1, min($currentPage - 2, $pageCount - 4));
                    $end = min($pageCount, max(5, $currentPage + 2));

                    if ($start > 1): ?>
                        <li>
                            <a href="<?= $pager->getPageURI(1) ?>" class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 hover:bg-gray-50 hover:text-gray-700 font-medium text-sm w-9 h-9 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <?php if ($start > 2): ?>
                            <li>
                                <span class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 font-medium text-sm w-9 h-9 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">...</span>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php for ($page = $start; $page <= $end; $page++): ?>
                        <?php if ($page == $currentPage): ?>
                            <li>
                                <span aria-current="page" class="flex items-center justify-center text-blue-600 bg-blue-50 border border-blue-200 font-medium text-sm w-9 h-9 focus:outline-none dark:bg-blue-900/20 dark:border-blue-800 dark:text-blue-400"><?= $page ?></span>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?= $pager->getPageURI($page) ?>" class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 hover:bg-gray-50 hover:text-gray-700 font-medium text-sm w-9 h-9 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $page ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($end < $pageCount): ?>
                        <?php if ($end < $pageCount - 1): ?>
                            <li>
                                <span class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 font-medium text-sm w-9 h-9 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">...</span>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?= $pager->getPageURI($pageCount) ?>" class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 hover:bg-gray-50 hover:text-gray-700 font-medium text-sm w-9 h-9 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $pageCount ?></a>
                        </li>
                    <?php endif; ?>

                    <!-- Next -->
                    <?php if ($pager->getCurrentPage() < $pager->getPageCount()): ?>
                        <li>
                            <a href="<?= $pager->getNextPageURI() ?>" class="flex items-center justify-center text-gray-500 bg-white border border-gray-200 hover:bg-gray-50 hover:text-gray-700 font-medium rounded-r-lg text-sm px-3 h-9 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                Next
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <span class="flex items-center justify-center text-gray-300 bg-white border border-gray-200 cursor-not-allowed font-medium rounded-r-lg text-sm px-3 h-9 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-600">
                                Next
                            </span>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxAll = document.getElementById('checkbox-all');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');

    if (checkboxAll) {
        checkboxAll.addEventListener('change', function() {
            rowCheckboxes.forEach(cb => cb.checked = this.checked);
        });
    }
});
</script>
<?= $this->endSection() ?>
