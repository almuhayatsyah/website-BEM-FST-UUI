<?php

namespace App\Controllers;

use App\Models\ProgramKerjaModel;

class Home extends BaseController
{
    public function index()
    {
        $programKerjaModel = new ProgramKerjaModel();
        $program_kerja = $programKerjaModel->findAll();

        return view('home/index', [
            'program_kerja' => $program_kerja
        ]);
    }
}
