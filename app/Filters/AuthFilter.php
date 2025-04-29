<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login');
    }

    // Jika route membutuhkan super_admin
    if (in_array('super_admin', $arguments ?? [])) {
      if (session()->get('level') !== 'super_admin') {
        return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Anda bukan super admin.');
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do nothing
  }
}
