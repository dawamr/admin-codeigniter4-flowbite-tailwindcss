<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['name', 'email', 'password', 'avatar'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'     => 'required|min_length[2]|max_length[100]',
        'email'    => 'required|valid_email|max_length[150]|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[6]|max_length[255]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email sudah terdaftar.',
        ],
    ];

    protected $skipValidation = false;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hash password sebelum insert/update bila field password ada & belum di-hash.
     */
    protected function hashPassword(array $data): array
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $password = $data['data']['password'];

        // Cek apakah sudah hash (bcrypt/argon start dengan $)
        if (is_string($password) && strlen($password) > 0 && $password[0] !== '$') {
            $data['data']['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        return $data;
    }

    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }
}
