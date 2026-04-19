<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="mb-6">
    <h1 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Pengaturan</h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Konfigurasi umum aplikasi Anda.</p>
</div>

<div class="max-w-3xl bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700">
    <form action="<?= site_url('settings') ?>" method="post">
        <?= csrf_field() ?>
        <div class="p-6 space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label for="app_name" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Nama Aplikasi</label>
                    <input type="text" name="app_name" id="app_name" value="<?= esc(old('app_name', $settings['app_name'] ?? '')) ?>" required
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ditampilkan di header, sidebar, dan title browser.</p>
                </div>
                <div class="md:col-span-2">
                    <label for="app_description" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea name="app_description" id="app_description" rows="3"
                              class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition"><?= esc(old('app_description', $settings['app_description'] ?? '')) ?></textarea>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Deskripsi singkat aplikasi untuk meta tags.</p>
                </div>
                <div>
                    <label for="timezone" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Zona Waktu</label>
                    <input type="text" name="timezone" id="timezone" value="<?= esc(old('timezone', $settings['timezone'] ?? '')) ?>" required
                           list="tz-list"
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <datalist id="tz-list">
                        <option value="Asia/Jakarta"></option>
                        <option value="Asia/Makassar"></option>
                        <option value="Asia/Jayapura"></option>
                        <option value="UTC"></option>
                    </datalist>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format IANA (contoh: Asia/Jakarta).</p>
                </div>
                <div>
                    <label for="items_per_page" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Item / Halaman</label>
                    <input type="number" name="items_per_page" id="items_per_page" min="1" max="100"
                           value="<?= esc(old('items_per_page', $settings['items_per_page'] ?? 10)) ?>" required
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Jumlah item per halaman pada daftar.</p>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/30 border-t border-gray-100 dark:border-gray-700 rounded-b-xl flex items-center justify-end gap-2">
            <button type="submit" class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">
                <i data-lucide="check" class="w-4 h-4"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
