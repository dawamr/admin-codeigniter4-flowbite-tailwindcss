<?php
$success = session()->getFlashdata('success');
$error   = session()->getFlashdata('error');
$errors  = session()->getFlashdata('errors');
?>
<?php if ($success) : ?>
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <i data-lucide="circle-check" class="shrink-0 inline w-4 h-4 me-3"></i>
        <span class="sr-only">Success</span>
        <div><?= esc($success) ?></div>
    </div>
<?php endif; ?>

<?php if ($error) : ?>
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <i data-lucide="circle-alert" class="shrink-0 inline w-4 h-4 me-3"></i>
        <div><?= esc($error) ?></div>
    </div>
<?php endif; ?>

<?php if (is_array($errors) && $errors) : ?>
    <div class="p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <span class="font-medium">Ada kesalahan pada input:</span>
        <ul class="mt-1.5 list-disc list-inside">
            <?php foreach ($errors as $err) : ?>
                <li><?= esc($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
