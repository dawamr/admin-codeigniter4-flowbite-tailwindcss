<?php
/** @var string $title */
$appName = setting('app_name', 'CI4 Admin');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title><?= esc(($title ?? 'Dashboard') . ' - ' . $appName) ?></title>

    <link rel="icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Geist', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 1px 2px 0 rgb(0 0 0 / 0.04), 0 1px 3px 0 rgb(0 0 0 / 0.06)',
                        'card-hover': '0 4px 12px -2px rgb(0 0 0 / 0.08), 0 2px 4px -2px rgb(0 0 0 / 0.04)',
                    }
                }
            }
        };
        // Apply dark mode preference ASAP to avoid flash
        (function () {
            const stored = localStorage.getItem('color-theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased">

<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<main class="p-4 sm:ml-64 pt-20">
    <div class="mx-auto max-w-7xl">
        <?= $this->include('partials/flash') ?>
        <?= $this->renderSection('content') ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>Dropzone.autoDiscover = false;</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    // Dark mode toggle
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('theme-toggle');
        if (!toggle) return;
        const iconDark = document.getElementById('theme-toggle-dark-icon');
        const iconLight = document.getElementById('theme-toggle-light-icon');
        const isDark = document.documentElement.classList.contains('dark');
        (isDark ? iconLight : iconDark)?.classList.remove('hidden');

        toggle.addEventListener('click', function () {
            document.documentElement.classList.toggle('dark');
            iconDark?.classList.toggle('hidden');
            iconLight?.classList.toggle('hidden');
            localStorage.setItem('color-theme',
                document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        });
    });
</script>
<?= $this->renderSection('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
</body>
</html>
