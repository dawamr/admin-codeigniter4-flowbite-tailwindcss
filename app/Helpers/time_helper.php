<?php

if (! function_exists('time_ago')) {
    /**
     * Returns a human-readable relative time string in Indonesian.
     *
     * @param string|int|\DateTimeInterface|null $datetime
     */
    function time_ago($datetime): string
    {
        if (empty($datetime)) {
            return '-';
        }

        try {
            $ts = $datetime instanceof \DateTimeInterface
                ? $datetime->getTimestamp()
                : (is_numeric($datetime) ? (int) $datetime : strtotime((string) $datetime));

            if ($ts === false) {
                return (string) $datetime;
            }

            $diff = time() - $ts;

            if ($diff < 0) {
                return 'baru saja';
            }
            if ($diff < 60) {
                return 'baru saja';
            }
            if ($diff < 3600) {
                $m = (int) floor($diff / 60);
                return $m . ' menit yang lalu';
            }
            if ($diff < 86400) {
                $h = (int) floor($diff / 3600);
                return $h . ' jam yang lalu';
            }
            if ($diff < 604800) {
                $d = (int) floor($diff / 86400);
                return $d === 1 ? 'kemarin' : $d . ' hari yang lalu';
            }
            if ($diff < 2592000) {
                $w = (int) floor($diff / 604800);
                return $w . ' minggu yang lalu';
            }
            if ($diff < 31536000) {
                $mo = (int) floor($diff / 2592000);
                return $mo . ' bulan yang lalu';
            }

            $y = (int) floor($diff / 31536000);
            return $y . ' tahun yang lalu';
        } catch (\Throwable $e) {
            return (string) $datetime;
        }
    }
}

if (! function_exists('format_datetime')) {
    /**
     * Formats a datetime in Indonesian locale.
     *
     * @param string|int|\DateTimeInterface|null $datetime
     */
    function format_datetime($datetime, string $format = 'd M Y, H:i'): string
    {
        if (empty($datetime)) {
            return '-';
        }

        $ts = $datetime instanceof \DateTimeInterface
            ? $datetime->getTimestamp()
            : (is_numeric($datetime) ? (int) $datetime : strtotime((string) $datetime));

        if ($ts === false) {
            return (string) $datetime;
        }

        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des',
        ];

        $formatted = date($format, $ts);
        $month = (int) date('n', $ts);

        return str_replace(date('M', $ts), $months[$month], $formatted);
    }
}

if (! function_exists('initials')) {
    /**
     * Returns up to 2 uppercase initials from a name.
     */
    function initials(?string $name): string
    {
        $name = trim((string) $name);
        if ($name === '') {
            return '?';
        }

        $parts = preg_split('/\s+/', $name);
        $first = mb_strtoupper(mb_substr($parts[0] ?? '', 0, 1));
        $second = isset($parts[1]) ? mb_strtoupper(mb_substr($parts[1], 0, 1)) : '';

        return $first . $second;
    }
}
