<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = ['key', 'value'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Ambil value berdasarkan key.
     */
    public function get(string $key, $default = null)
    {
        $row = $this->where('key', $key)->first();

        return $row['value'] ?? $default;
    }

    /**
     * Ambil semua settings sebagai associative array [key => value].
     */
    public function all(): array
    {
        $rows   = $this->findAll();
        $result = [];

        foreach ($rows as $row) {
            $result[$row['key']] = $row['value'];
        }

        return $result;
    }

    /**
     * Set / update value by key.
     */
    public function setValue(string $key, $value): bool
    {
        $existing = $this->where('key', $key)->first();

        if ($existing) {
            return $this->update($existing['id'], ['value' => $value]) !== false;
        }

        return $this->insert(['key' => $key, 'value' => $value]) !== false;
    }
}
