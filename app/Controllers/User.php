<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $allowedFields = ['username', 'password', 'level'];

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function createSuperAdmin()
    {
        // Cek apakah sudah ada super admin
        $superAdmin = $this->userModel->where('level', 'super_admin')->first();

        if ($superAdmin) {
            return redirect()->to('/dashboard')->with('error', 'Super admin sudah ada');
        }

        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'level' => 'super_admin'
        ];

        try {
            if ($this->userModel->insert($data)) {
                // Log data yang diinsert
                log_message('info', 'Super admin created: ' . json_encode($data));
                return redirect()->to('/dashboard')->with('success', 'Super admin berhasil dibuat');
            } else {
                // Log error
                log_message('error', 'Failed to create super admin: ' . json_encode($this->userModel->errors()));
                return redirect()->to('/dashboard')->with('error', 'Gagal membuat super admin: ' . json_encode($this->userModel->errors()));
            }
        } catch (\Exception $e) {
            // Log exception
            log_message('error', 'Exception while creating super admin: ' . $e->getMessage());
            return redirect()->to('/dashboard')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function index()
    {
        if (!session()->get('logged_in') || session()->get('level') != 'super_admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Manajemen User',
            'users' => $this->userModel->findAll(),
            'user' => [
                'username' => session()->get('username'),
                'level' => session()->get('level')
            ]
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        if (!session()->get('logged_in') || session()->get('level') != 'super_admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah User',
            'user' => [
                'username' => session()->get('username'),
                'level' => session()->get('level')
            ]
        ];

        return view('user/create', $data);
    }

    public function store()
    {
        if (!session()->get('logged_in') || session()->get('level') != 'super_admin') {
            return redirect()->to('/login');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level')
        ];

        log_message('debug', 'Level yang dikirim: ' . $this->request->getPost('level'));

        if ($this->userModel->insert($data)) {
            return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
    }

    public function delete($id)
    {
        if (!session()->get('logged_in') || session()->get('level') != 'super_admin') {
            return redirect()->to('/login');
        }

        // Prevent deleting own account
        if ($id == session()->get('user_id')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun yang sedang digunakan');
        }

        // Check if user exists
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        // Prevent deleting last super admin
        if ($user['level'] == 'super_admin') {
            $superAdminCount = $this->userModel->where('level', 'super_admin')->countAllResults();
            if ($superAdminCount <= 1) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus super admin terakhir');
            }
        }

        if ($this->userModel->delete($id)) {
            return redirect()->back()->with('success', 'User berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus user');
    }

    public function edit($id)
    {
        if (!session()->get('logged_in') || session()->get('level') != 'super_admin') {
            return redirect()->to('/login');
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }
        $data = [
            'title' => 'Edit User',
            'user' => $user
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('logged_in') || session()->get('level') != 'super_admin') {
            return redirect()->to('/login');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level')
        ];

        log_message('debug', 'Level yang dikirim: ' . $this->request->getPost('level'));

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/user')->with('success', 'User berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
    }
}
