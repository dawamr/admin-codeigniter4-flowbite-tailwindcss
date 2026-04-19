<?php

namespace App\Controllers;

use App\Models\SettingModel;

class Settings extends BaseController
{
    /** @var SettingModel */
    protected $settings;

    public function __construct()
    {
        $this->settings = new SettingModel();
    }

    public function index()
    {
        return view('settings/index', [
            'title'    => 'Settings',
            'settings' => $this->settings->all(),
        ]);
    }

    public function update()
    {
        $rules = [
            'app_name'        => 'required|max_length[100]',
            'app_description' => 'permit_empty|max_length[255]',
            'timezone'        => 'required|max_length[50]',
            'items_per_page'  => 'required|integer|greater_than[0]|less_than[101]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        foreach (['app_name', 'app_description', 'timezone', 'items_per_page'] as $key) {
            $this->settings->setValue($key, (string) $this->request->getPost($key));
        }

        return redirect()->to('/settings')->with('success', 'Settings berhasil diperbarui.');
    }
}
