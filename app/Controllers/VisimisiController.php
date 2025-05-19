<?php

namespace App\Controllers;

use App\Models\VisiMisiModel;
use CodeIgniter\Controller;

class VisiMisiController extends Controller
{
  protected $visiMisiModel;

  public function __construct()
  {
    $this->visiMisiModel = new VisiMisiModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Visi & Misi',
      'visimisi' => $this->visiMisiModel->first()
    ];
    return view('dashboard/visimisi/index', $data);
  }

  public function update()
  {
    $id = $this->request->getPost('id');
    $data = [
      'visi' => $this->request->getPost('visi'),
      'misi' => $this->request->getPost('misi')
    ];

    $this->visiMisiModel->update($id, $data);
    return redirect()->to('/visimisi')->with('success', 'Visi & Misi berhasil diupdate');
  }
}
