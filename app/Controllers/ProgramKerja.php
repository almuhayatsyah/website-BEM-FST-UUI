<?php

namespace App\Controllers;

use App\Models\ProgramKerjaModel;

class ProgramKerja extends BaseController
{
  protected $programKerjaModel;

  public function __construct()
  {
    $this->programKerjaModel = new ProgramKerjaModel();
  }

  public function index()
  {
    // Hilangkan pengecekan session jika ingin halaman publik (frontend) bisa akses
    $data = [
      'title' => 'Program Kerja',
      'program_kerja' => $this->programKerjaModel->findAll()
    ];
    return view('program_kerja/index', $data);
  }

  public function create()
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login');
    }
    $data = [
      'title' => 'Tambah Program Kerja'
    ];
    return view('program_kerja/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->programKerjaModel->validationRules, $this->programKerjaModel->validationMessages)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
      'nama_program_kerja' => $this->request->getPost('nama_program_kerja'),
      'tujuan_kegiatan' => $this->request->getPost('tujuan_kegiatan'),
      'sasaran' => $this->request->getPost('sasaran'),
      'target_pelaksanaan' => $this->request->getPost('target_pelaksanaan'),
      'keterangan' => $this->request->getPost('keterangan')
    ];

    $this->programKerjaModel->insert($data);
    return redirect()->to('/program-kerja')->with('success', 'Program kerja berhasil ditambahkan');
  }

  public function edit($id)
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login');
    }
    $data = [
      'title' => 'Edit Program Kerja',
      'program_kerja' => $this->programKerjaModel->find($id)
    ];
    if (!$data['program_kerja']) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Program kerja tidak ditemukan');
    }
    return view('program_kerja/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->programKerjaModel->validationRules, $this->programKerjaModel->validationMessages)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
      'nama_program_kerja' => $this->request->getPost('nama_program_kerja'),
      'tujuan_kegiatan' => $this->request->getPost('tujuan_kegiatan'),
      'sasaran' => $this->request->getPost('sasaran'),
      'target_pelaksanaan' => $this->request->getPost('target_pelaksanaan'),
      'keterangan' => $this->request->getPost('keterangan')
    ];

    $this->programKerjaModel->update($id, $data);
    return redirect()->to('/program-kerja')->with('success', 'Program kerja berhasil diperbarui');
  }

  public function delete($id)
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login');
    }
    $this->programKerjaModel->delete($id);
    return redirect()->to('/program-kerja')->with('success', 'Program kerja berhasil dihapus');
  }
}
