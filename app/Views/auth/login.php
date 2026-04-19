<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
    Sign in to your account
</h1>
<form class="space-y-4 md:space-y-6" action="<?= site_url('login') ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" name="email" id="email" value="<?= esc(old('email')) ?>"
               class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
               placeholder="name@company.com" required>
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••"
               class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
        Sign in
    </button>
    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Belum punya akun? <a href="<?= site_url('register') ?>" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Register</a>
    </p>
</form>
<?= $this->endSection() ?>
