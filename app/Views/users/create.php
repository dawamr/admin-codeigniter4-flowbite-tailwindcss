<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="mb-6">
    <a href="<?= site_url('users') ?>" class="inline-flex items-center gap-1 text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
        Kembali ke daftar pengguna
    </a>
    <h1 class="mt-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Tambah Pengguna</h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Buat akun pengguna baru untuk mengakses aplikasi.</p>
</div>

<div class="max-w-2xl bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700">
    <form action="<?= site_url('users') ?>" method="post">
        <?= csrf_field() ?>
        <div class="p-6 space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label for="name" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="<?= esc(old('name')) ?>" required
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Nama akan ditampilkan di profil dan navigasi.</p>
                </div>
                <div class="md:col-span-2">
                    <label for="email" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="<?= esc(old('email')) ?>" required
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Digunakan untuk login. Harus unik.</p>
                </div>
                <div>
                    <label for="password" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Minimal 8 karakter.</p>
                </div>
                <div>
                    <label for="password_confirm" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" required
                           class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ketik ulang password.</p>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/30 border-t border-gray-100 dark:border-gray-700 rounded-b-xl flex items-center justify-end gap-2">
            <a href="<?= site_url('users') ?>" class="px-3.5 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">Batal</a>
            <button type="submit" class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">
                <i data-lucide="check" class="w-4 h-4"></i>
                Simpan Pengguna
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
