<?php

namespace App\Controllers;

class StrukturOrganisasi extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Struktur Organisasi',
            'user' => [
                'username' => session()->get('username'),
                'level' => session()->get('level')
            ]
        ];

        return view('struktur_organisasi/index', $data);
    }
} 