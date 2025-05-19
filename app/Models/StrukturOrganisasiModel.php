<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturOrganisasiModel extends Model
{
  protected $table = 'struktur_organisasi';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'gambar',
    'nama',
    'jabatan',
    'divisi',
    'created_at',
    'updated_at'
  ];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
