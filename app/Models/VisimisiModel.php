<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
  protected $table = 'visi_misi';
  protected $primaryKey = 'id';
  protected $allowedFields = ['visi', 'misi', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';

  protected $validationRules = [
    'visi' => 'required',
    'misi' => 'required'
  ];
}
