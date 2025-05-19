<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
  protected $table = 'berita';
  protected $primaryKey = 'id';
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $allowedFields = [
    'judul',
    'deskripsi',
    'upload',
    'tgl_input'
  ];

  // Validasi
  protected $validationRules = [
    'judul' => 'required',
    'deskripsi' => 'required',
    'upload' => 'required'
  ];

  protected $validationMessages = [
    'judul' => [
      'required' => 'Judul berita harus diisi'
    ],
    'deskripsi' => [
      'required' => 'Deskripsi berita harus diisi'
    ],
    'upload' => [
      'required' => 'Gambar berita harus diupload'
    ]
  ];
}
