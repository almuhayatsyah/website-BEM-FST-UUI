<?php

namespace App\Controllers;

use App\Models\SejarahModel;
use App\Models\VisiMisiModel;

class SejarahController extends BaseController
{
  protected $sejarahModel;
  protected $visiMisiModel;

  public function __construct()
  {
    $this->sejarahModel = new SejarahModel();
    $this->visiMisiModel = new VisiMisiModel();
  }

  public function index()
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login');
    }

    $data = [
      'title' => 'Sejarah & Visi Misi',
      'sejarah' => $this->sejarahModel->first(),
      'visimisi' => $this->visiMisiModel->first(),
      'user' => [
        'username' => session()->get('username'),
        'level' => session()->get('level')
      ]
    ];

    // Menggunakan path view yang benar
    return view('dashboard/sejarah/index', $data);
  }

  public function update()
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login');
    }

    $id = $this->request->getPost('id');
    $data = [
      'sejarah' => $this->request->getPost('sejarah')
    ];

    // Handle logo upload
    $logo = $this->request->getFile('upload_logo');
    if ($logo && $logo->isValid() && !$logo->hasMoved()) {
      $newName = $logo->getRandomName();
      $logo->move('./uploads/sejarah', $newName);
      $data['upload_logo'] = $newName;
    }

    $this->sejarahModel->save($data); // menggunakan save() daripada update()
    return redirect()->to('/admin/sejarah')->with('success', 'Sejarah berhasil diupdate');
  }
}
