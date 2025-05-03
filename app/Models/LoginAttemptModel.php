<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginAttemptModel extends Model
{
  protected $table = 'login_attempts';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $allowedFields = ['ip_address', 'attempt_time'];

  public function addAttempt($ipAddress)
  {
    $data = [
      'ip_address' => $ipAddress,
      'attempt_time' => date('Y-m-d H:i:s')
    ];
    return $this->insert($data);
  }

  public function getAttemptsCount($ipAddress, $minutes = 1)
  {
    $time = date('Y-m-d H:i:s', strtotime("-{$minutes} minutes"));
    return $this->where('ip_address', $ipAddress)
      ->where('attempt_time >=', $time)
      ->countAllResults();
  }

  public function clearAttempts($ipAddress)
  {
    return $this->where('ip_address', $ipAddress)->delete();
  }
}
