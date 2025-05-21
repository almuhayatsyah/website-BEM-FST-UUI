<?php

namespace App\Controllers;

use App\Models\StrukturOrganisasiModel;

class StrukturOrganisasiController extends BaseController
{
  protected $strukturOrganisasiModel;

  public function __construct()
  {
    $this->strukturOrganisasiModel = new StrukturOrganisasiModel();
  }

  public function index()
  {
    // Hilangkan pengecekan session jika ingin halaman publik (frontend) bisa akses
    $data = [
      'title' => 'Struktur Organisasi',
      'struktur_organisasi' => $this->strukturOrganisasiModel->findAll()
    ];
    return view('struktur_organisasi/index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Anggota',
    ];
    return view('struktur_organisasi/create', $data);
  }

  public function store()
  {
    $validation = \Config\Services::validation();
    $rules = [
      'nama' => 'required|min_length[3]',
      'jabatan' => 'required|min_length[3]',
      'divisi' => 'required',
      'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $file = $this->request->getFile('gambar');
    $namaFoto = $file->getRandomName();
    $uploadPath = FCPATH . 'uploads/struktur_organisasi';
    if (!is_dir($uploadPath)) {
      mkdir($uploadPath, 0777, true);
    }
    $file->move($uploadPath, $namaFoto);

    $data = [
      'nama' => $this->request->getPost('nama'),
      'jabatan' => $this->request->getPost('jabatan'),
      'divisi' => $this->request->getPost('divisi'),
      'gambar' => $namaFoto
    ];
    $this->strukturOrganisasiModel->save($data);

    return redirect()->to('/admin/struktur-organisasi')->with('success', 'Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Edit Anggota',
      'struktur' => $this->strukturOrganisasiModel->find($id)
    ];
    return view('struktur_organisasi/edit', $data);
  }

  public function update($id)
  {
    $validation = \Config\Services::validation();
    $rules = [
      'nama' => 'required|min_length[3]',
      'jabatan' => 'required|min_length[3]',
      'divisi' => 'required',
      'gambar' => 'permit_empty|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $data = [
      'id' => $id,
      'nama' => $this->request->getPost('nama'),
      'jabatan' => $this->request->getPost('jabatan'),
      'divisi' => $this->request->getPost('divisi')
    ];

    $file = $this->request->getFile('gambar');
    if ($file && $file->isValid() && !$file->hasMoved()) {
      $namaFoto = $file->getRandomName();
      $uploadPath = FCPATH . 'uploads/struktur_organisasi';
      if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
      }
      $file->move($uploadPath, $namaFoto);

      // Hapus file lama jika ada
      $oldData = $this->strukturOrganisasiModel->find($id);
      if ($oldData && !empty($oldData['gambar'])) {
        $oldFile = $uploadPath . '/' . $oldData['gambar'];
        if (file_exists($oldFile)) {
          unlink($oldFile);
        }
      }
      $data['gambar'] = $namaFoto;
    }
    $this->strukturOrganisasiModel->save($data);

    return redirect()->to('/admin/struktur-organisasi')->with('success', 'Data berhasil diupdate');
  }

  public function delete($id)
  {
    $oldData = $this->strukturOrganisasiModel->find($id);
    if ($oldData && !empty($oldData['gambar'])) {
      $oldFile = FCPATH . 'uploads/struktur_organisasi/' . $oldData['gambar'];
      if (file_exists($oldFile)) {
        unlink($oldFile);
      }
    }

    $this->strukturOrganisasiModel->delete($id);
    return redirect()->to('/admin/struktur-organisasi')->with('success', 'Data berhasil dihapus');
  }

  public function detail($id)
  {
    $data = [
      'title' => 'Detail Anggota',
      'struktur' => $this->strukturOrganisasiModel->find($id)
    ];
    return view('struktur_organisasi/detail', $data);
  }
}
