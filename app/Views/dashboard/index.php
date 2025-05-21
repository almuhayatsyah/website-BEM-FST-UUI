<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - WEB BEM FST</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: rgb(152, 35, 35);
            color: white;
        }

        .sidebar .nav-link {
            color: rgba(230, 9, 9, 0.8);
            padding: 0.8rem 1rem;
            margin: 0.2rem 0;
            border-radius: 0.25rem;
        }

        .sidebar .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link.active {
            color: white;
            background-color: #007bff;
        }

        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .nav-login-btn {
            background-color: #007bff;
            color: white !important;
            border-radius: 5px;
            padding: 8px 20px;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .nav-login-btn:hover {
            background-color: #0056b3;
            color: white !important;
            transform: translateY(-2px);
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
        }

        .main-footer {
            margin-top: auto;
            padding: 1rem;
            background: #fff;
            border-top: 1px solid #dee2e6;
        }

        /* Footer styling for all pages */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1 0 auto;
        }

        .main-footer {
            flex-shrink: 0;
            padding: 1rem;
            background: #fff;
            border-top: 1px solid #dee2e6;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-lin btn btn-danger mr-2" href="<?= base_url('/') ?>" target="_blank">
                        <i class="fas fa-globe"></i> Lihat Website
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-lin btn btn-danger mr-2" href="<?= base_url('logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard') ?>" class="brand-link">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="BEM FST Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Panel BEM FST</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('username') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= current_url() == base_url('dashboard') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <?php if (session()->get('level') == 'super_admin') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('user') ?>" class="nav-link <?= strpos(current_url(), 'user') !== false ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Manajemen User</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/berita') ?>" class="nav-link" <?= strpos(current_url(), 'berita') !== false ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/galeri') ?>" class="nav-link <?= strpos(current_url(), 'galeri') !== false ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-images"></i>
                                <p>Galeri</p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="<?= base_url('admin/program-kerja') ?>" class="nav-link <?= strpos(current_url(), 'program-kerja') !== false ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>Program Kerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/hubungi-kami') ?>" class="nav-link <?= strpos(current_url(), 'hubungi-kami') !== false ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-share-alt"></i>
                                <p>Hubungi Kami</p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="<?= base_url('admin/struktur-organisasi') ?>" class="nav-link <?= strpos(current_url(), 'struktur-organisasi') !== false ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>Struktur Organisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/sejarah') ?>" class="nav-link <?= strpos(current_url(), 'sejarah') !== false ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-history"></i>
                                <p>Sejarah & Visi Misi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2024 <a href="#">BEM FST</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>