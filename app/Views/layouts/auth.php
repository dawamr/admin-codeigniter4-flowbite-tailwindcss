<?php
/** @var string $title */
$appName = setting('app_name', 'CI4 Admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc(($title ?? 'Auth') . ' - ' . $appName) ?></title>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Geist', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'sans-serif'],
                    }
                }
            }
        };
        (function () {
            const stored = localStorage.getItem('color-theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <a href="<?= site_url('/') ?>" class="flex items-center justify-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <i data-lucide="zap" class="w-8 h-8 mr-2 text-blue-600"></i>
            <?= esc($appName) ?>
        </a>
        <div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 sm:p-8">
                <?= $this->include('partials/flash') ?>
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
</body>
</html>
