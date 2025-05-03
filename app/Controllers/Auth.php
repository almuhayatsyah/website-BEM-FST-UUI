<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LoginAttemptModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $loginAttemptModel;
    protected $maxAttempts = 5;
    protected $lockoutTime = 1; // dalam menit

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->loginAttemptModel = new LoginAttemptModel();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $ipAddress = $this->request->getIPAddress();
            $attemptsCount = $this->loginAttemptModel->getAttemptsCount($ipAddress, $this->lockoutTime);

            // Cek apakah sudah melebihi batas percobaan
            if ($attemptsCount >= $this->maxAttempts) {
                $lastAttempt = $this->loginAttemptModel->where('ip_address', $ipAddress)
                    ->orderBy('attempt_time', 'DESC')
                    ->first();

                if ($lastAttempt) {
                    $timeLeft = ceil((strtotime($lastAttempt['attempt_time']) + ($this->lockoutTime * 60) - time()) / 60);
                    if ($timeLeft > 0) {
                        return redirect()->back()->with('error', "Terlalu banyak percobaan login. Silakan coba lagi dalam {$timeLeft} menit.");
                    } else {
                        // Reset attempts jika waktu tunggu sudah habis
                        $this->loginAttemptModel->clearAttempts($ipAddress);
                    }
                }
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil, hapus riwayat percobaan
                $this->loginAttemptModel->clearAttempts($ipAddress);

                // Set session
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'logged_in' => true
                ]);

                return redirect()->to('/dashboard');
            } else {
                // Login gagal, tambahkan ke riwayat percobaan
                $this->loginAttemptModel->addAttempt($ipAddress);

                $attemptsLeft = $this->maxAttempts - ($attemptsCount + 1);
                if ($attemptsLeft > 0) {
                    return redirect()->back()->with('error', "Username atau password salah. Sisa percobaan: {$attemptsLeft}");
                } else {
                    return redirect()->back()->with('error', "Terlalu banyak percobaan login. Silakan coba lagi dalam {$this->lockoutTime} menit.");
                }
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }
        return view('user/edit', ['user' => $user]);
    }
}
