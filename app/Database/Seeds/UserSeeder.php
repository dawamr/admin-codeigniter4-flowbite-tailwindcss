<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $this->db->table('users')->ignore(true)->insert([
            'name'       => 'Administrator',
            'email'      => 'admin@example.com',
            'password'   => password_hash('password', PASSWORD_DEFAULT),
            'avatar'     => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
