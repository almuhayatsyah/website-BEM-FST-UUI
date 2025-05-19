<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class BeritaController extends BaseController
{
  protected $beritaModel;

  public function __construct()
  {
    $this->beritaModel = new BeritaModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Berita',
      'berita' => $this->beritaModel->findAll()
    ];

    return view('berita/index', $data);
  }

  public function create()
  {
    return view('berita/create', ['title' => 'Tambah Berita']);
  }

  public function store()
  {
    $rules = [
      'judul' => 'required',
      'deskripsi' => 'required',
      'upload' => 'uploaded[upload]|max_size[upload,2048]|is_image[upload]|mime_in[upload,image/jpg,image/jpeg,image/png]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $foto = $this->request->getFile('upload');
    $namaFoto = $foto->getRandomName();
    $foto->move('uploads/berita', $namaFoto);

    $this->beritaModel->save([
      'judul' => $this->request->getPost('judul'),
      'deskripsi' => $this->request->getPost('deskripsi'),
      'upload' => $namaFoto,
      'tgl_input' => date('Y-m-d H:i:s')
    ]);

    return redirect()->to('berita')->with('success', 'Berita berhasil ditambahkan');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Edit Berita',
      'berita' => $this->beritaModel->find($id)
    ];

    return view('berita/edit', $data);
  }

  public function update($id)
  {
    $rules = [
      'judul' => 'required',
      'deskripsi' => 'required',
      'upload' => 'max_size[upload,2048]|is_image[upload]|mime_in[upload,image/jpg,image/jpeg,image/png]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
      'judul' => $this->request->getPost('judul'),
      'deskripsi' => $this->request->getPost('deskripsi')
    ];

    $foto = $this->request->getFile('upload');
    if ($foto->isValid() && !$foto->hasMoved()) {
      $oldBerita = $this->beritaModel->find($id);
      if ($oldBerita['upload'] && file_exists('uploads/berita/' . $oldBerita['upload'])) {
        unlink('uploads/berita/' . $oldBerita['upload']);
      }

      $namaFoto = $foto->getRandomName();
      $foto->move('uploads/berita', $namaFoto);
      $data['upload'] = $namaFoto;
    }

    $this->beritaModel->update($id, $data);
    return redirect()->to('/berita')->with('success', 'Berita berhasil diupdate');
  }

  public function delete($id)
  {
    $berita = $this->beritaModel->find($id);

    if ($berita['upload'] && file_exists('uploads/berita/' . $berita['upload'])) {
      unlink('uploads/berita/' . $berita['upload']);
    }

    $this->beritaModel->delete($id);
    return redirect()->to('/berita')->with('success', 'Berita berhasil dihapus');
  }
}
