<?php

use App\Models\SettingModel;

if (! function_exists('setting')) {
    /**
     * Ambil nilai setting dari tabel settings dengan cache runtime.
     *
     * @param mixed $default
     *
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        static $cache = null;

        if ($cache === null) {
            try {
                $cache = (new SettingModel())->all();
            } catch (\Throwable $e) {
                $cache = [];
            }
        }

        return $cache[$key] ?? $default;
    }
}
