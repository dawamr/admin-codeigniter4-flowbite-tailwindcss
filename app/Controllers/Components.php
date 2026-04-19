<?php

namespace App\Controllers;

class Components extends BaseController
{
    public function index()
    {
        return view('components/index', [
            'title' => 'Komponen',
        ]);
    }
}
