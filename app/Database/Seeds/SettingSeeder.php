<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $defaults = [
            'app_name'        => 'CI4 Admin',
            'app_description' => 'CodeIgniter 4 + Flowbite Admin Starter',
            'timezone'        => 'Asia/Jakarta',
            'items_per_page'  => '10',
        ];

        foreach ($defaults as $key => $value) {
            $this->db->table('settings')->ignore(true)->insert([
                'key'        => $key,
                'value'      => $value,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
