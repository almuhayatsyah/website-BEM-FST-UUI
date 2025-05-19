<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramKerjaModel extends Model
{
  protected $table = 'program_kerja';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected $allowedFields = [
    'nama_program_kerja',
    'tujuan_kegiatan',
    'sasaran',
    'target_pelaksanaan',
    'keterangan',
    'created_at',
    'updated_at'
  ];
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  protected $validationRules = [
    'nama_program_kerja' => 'required|min_length[3]',
    'tujuan_kegiatan' => 'required',
    'sasaran' => 'required',
    'target_pelaksanaan' => 'required',
    'keterangan' => 'required',
  ];

  protected $validationMessages = [
    'nama_program_kerja' => [
      'required' => 'Nama program kerja harus diisi',
      'min_length' => 'Nama program kerja minimal 3 karakter'
    ],
    'tujuan_kegiatan' => [
      'required' => 'Tujuan kegiatan harus diisi'
    ],
    'sasaran' => [
      'required' => 'Sasaran harus diisi'
    ],
    'target_pelaksanaan' => [
      'required' => 'Target pelaksanaan harus diisi'
    ],
    'keterangan' => [
      'required' => 'Keterangan harus diisi'
    ]
  ];
}
