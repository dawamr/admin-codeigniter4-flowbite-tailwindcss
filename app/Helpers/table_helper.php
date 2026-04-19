<?php

/**
 * Format pagination range info (e.g., "Showing 1-10 of 100")
 *
 * @param \CodeIgniter\Pager\Pager|null $pager
 * @return string
 */
function pagination_range_info($pager): string
{
    if ($pager === null) {
        return '';
    }

    $total   = $pager->getTotal();
    $perPage = $pager->getPerPage();
    $current = $pager->getCurrentPage();

    $start = (($current - 1) * $perPage) + 1;
    $end   = min($current * $perPage, $total);

    return sprintf(
        'Menampilkan <span class="font-semibold text-gray-900 dark:text-white">%d-%d</span> dari <span class="font-semibold text-gray-900 dark:text-white">%d</span>',
        $start,
        $end,
        $total
    );
}
