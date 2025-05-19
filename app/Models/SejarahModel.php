<?php

namespace App\Models;

use CodeIgniter\Model;

class SejarahModel extends Model
{
  protected $table = 'sejarah';
  protected $primaryKey = 'id';
  protected $allowedFields = ['sejarah', 'upload_logo', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';

  protected $validationRules = [
    'sejarah' => 'required'
  ];
}
