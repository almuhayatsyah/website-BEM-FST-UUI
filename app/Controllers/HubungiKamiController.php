<?php

namespace App\Controllers;

use App\Models\HubungikamiModel;

class HubungiKamiController extends BaseController
{
  protected $hubungiKamiModel;

  public function __construct()
  {
    $this->hubungiKamiModel = new HubungikamiModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Hubungi Kami',
      'hubungi_kami' => $this->hubungiKamiModel->findAll()
    ];

    return view('hubungi_kami/index', $data);
  }

  public function create()
  {
    return view('hubungi_kami/create', ['title' => 'Tambah Social Media']);
  }

  public function store()
  {
    $rules = [
      'instagram' => 'required',
      'tiktok' => 'required',
      'whatsapp' => 'required'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->hubungiKamiModel->save([
      'instagram' => $this->request->getPost('instagram'),
      'tiktok' => $this->request->getPost('tiktok'),
      'whatsapp' => $this->request->getPost('whatsapp')
    ]);

    return redirect()->to('hubungi-kami')->with('success', 'Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Edit Social Media',
      'hubungi_kami' => $this->hubungiKamiModel->find($id)
    ];

    return view('hubungi_kami/edit', $data);
  }

  public function update($id)
  {
    $rules = [
      'instagram' => 'required',
      'tiktok' => 'required',
      'whatsapp' => 'required'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->hubungiKamiModel->update($id, [
      'instagram' => $this->request->getPost('instagram'),
      'tiktok' => $this->request->getPost('tiktok'),
      'whatsapp' => $this->request->getPost('whatsapp')
    ]);

    return redirect()->to('/hubungi-kami')->with('success', 'Data berhasil diupdate');
  }

  public function delete($id)
  {
    $this->hubungiKamiModel->delete($id);
    return redirect()->to('/hubungi-kami')->with('success', 'Data berhasil dihapus');
  }
}
