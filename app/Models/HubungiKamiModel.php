<?php

namespace App\Models;

use CodeIgniter\Model;

class HubungikamiModel extends Model
{
  protected $table = 'hubungi_kami';
  protected $primaryKey = 'id';
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $allowedFields = [
    'instagram',
    'tiktok',
    'whatsapp'
  ];

  // Validasi
  protected $validationRules = [
    'instagram' => 'required',
    'tiktok' => 'required',
    'whatsapp' => 'required'
  ];

  protected $validationMessages = [
    'instagram' => [
      'required' => 'Username Instagram harus diisi'
    ],
    'tiktok' => [
      'required' => 'Username TikTok harus diisi'
    ],
    'whatsapp' => [
      'required' => 'Nomor WhatsApp harus diisi'
    ]
  ];
}
