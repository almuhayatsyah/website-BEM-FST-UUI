<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEM FST - Universitas Ubudiyah Indonesia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar-brand {
            font-weight: bold;
        }

        .navbar-brand span {
            line-height: 1.1;
            display: inline-block;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('assets/img/hero-bg.jpg') ?>') no-repeat center center;
            background-size: cover;
            width: 100%;
            display: flex;
            align-items: center;
            color: white;
            padding: 60px 0;
        }

        .section-title {
            position: relative;
            margin-bottom: 30px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="#" style="font-size: 1.1rem;">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="BEM FST Logo" style="width: 40px; height: 40px;">
                <span>
                    FAKULTAS SAINS<br>
                    DAN TEKNOLOGI
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="#">Program Kerja</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="strukturDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Struktur Organisasi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dewan Pengurus Harian</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Agama</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Humas</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Kominfo</a></li>
                            <li><a class="dropdown-item" href="#">Bidang Kesekretariatan</a></li>
                            <li><a class="dropdown-item" href="#">Bidang PSDM</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Hubungi Kami</a>
                    </li>
                    <!-- Menu Login -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('login') ?>">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('<?= base_url('assets/img/hero-bg.jpg') ?>') no-repeat center center; background-size: cover; height: 70vh; display: flex; align-items: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-3 fw-bold" style="letter-spacing:2px;">BEM<br>FST UUI</h1>
                    <p class="lead">Situs Web resmi dari Fakultas Sains Dan Teknologi Universitas Ubudiyah Indonesia</p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-danger btn-lg me-2" style="border-radius: 30px; min-width: 120px;">Visi Misi</a>
                        <a href="#" class="btn btn-dark btn-lg" style="border-radius: 30px; min-width: 120px;">Sejarah</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Tentang Kami</h2>
            <div class="row">
                <div class="col-md-6">
                    <p>BEM FST merupakan organisasi mahasiswa yang bertujuan untuk mewadahi aspirasi mahasiswa dan melaksanakan program-program yang bermanfaat bagi civitas akademika Fakultas Sains dan Teknologi.</p>
                </div>
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/random/600x400/?university" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Program Kerja Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Program Kerja</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Program 1</h5>
                            <p class="card-text">Deskripsi program kerja pertama.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Program 2</h5>
                            <p class="card-text">Deskripsi program kerja kedua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Program 3</h5>
                            <p class="card-text">Deskripsi program kerja ketiga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>BEM FST</h5>
                    <p>Badan Eksekutif Mahasiswa Fakultas Sains dan Teknologi Universitas Ubudiyah Indonesia</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope"></i> bemfst@unud.ac.id</li>
                        <li><i class="fas fa-phone"></i> +62 123 4567 890</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Sosial Media</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 BEM FST. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>