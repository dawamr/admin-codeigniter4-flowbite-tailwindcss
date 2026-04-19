<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data = [
            'title'        => 'Dashboard',
            'totalUsers'   => $userModel->countAllResults(),
            'recentUsers'  => $userModel->orderBy('created_at', 'DESC')->findAll(5),
        ];

        return view('dashboard/index', $data);
    }
}
