<?php

namespace App\Controllers;

use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Galeri',
            'galeri' => $this->galeriModel->findAll()
        ];

        return view('galeri/index', $data);
    }

    public function create()
    {
        return view('galeri/create', ['title' => 'Tambah Galeri']);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'upload' => 'uploaded[upload]|max_size[upload,2048]|is_image[upload]|mime_in[upload,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload file
        $foto = $this->request->getFile('upload');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/galeri', $namaFoto);

        // Simpan data
        $this->galeriModel->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'upload' => $namaFoto
        ]);

        return redirect()->to('admin/galeri')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Hilangkan pengecekan session jika ingin halaman publik (frontend) bisa akses

        $data = [
            'title' => 'Edit Galeri',
            'galeri' => $this->galeriModel->find($id)
        ];

        return view('galeri/edit', $data);
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

        // Handle file upload if new file exists
        $foto = $this->request->getFile('upload');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Delete old file
            $oldGaleri = $this->galeriModel->find($id);
            if ($oldGaleri['upload'] && file_exists('uploads/galeri/' . $oldGaleri['upload'])) {
                unlink('uploads/galeri/' . $oldGaleri['upload']);
            }

            // Save new file
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/galeri', $namaFoto);
            $data['upload'] = $namaFoto;
        }

        $this->galeriModel->update($id, $data);
        return redirect()->to('/galeri')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        // Ambil data galeri
        $galeri = $this->galeriModel->find($id);

        // Hapus file gambar jika ada
        if ($galeri['upload'] && file_exists('uploads/galeri/' . $galeri['upload'])) {
            unlink('uploads/galeri/' . $galeri['upload']);
        }

        // Hapus data dari database
        $this->galeriModel->delete($id);

        return redirect()->to('/galeri')->with('success', 'Data berhasil dihapus');
    }

    // Method untuk tampilan frontend
    public function show_galeri()
    {
        $data = [
            'title' => 'Galeri BEM FST',
            'galeri' => $this->galeriModel->orderBy('tgl_input', 'DESC')->findAll()
        ];
        return view('home/page_galeri', $data);
    }

    public function detail($id)
    {
        $galeri = $this->galeriModel->find($id);

        if (!$galeri) {
            return redirect()->to('/galeri')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'title' => $galeri['judul'],
            'galeri' => $galeri
        ];
        return view('home/detail_galeri', $data);
    }
}
