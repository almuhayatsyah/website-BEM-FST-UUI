<?= $this->extend('layouts/public') ?>
<?= $this->section('content') ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEM FST - Universitas Ubudiyah Indonesia</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- cloud flare -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-brand span {
            line-height: 1.2;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?= base_url('assets/img/hero-bg.jpg') ?>') center/cover no-repeat;
            color: white;
            height: 70vh;
            display: flex;
            align-items: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .section-title {
            font-size: 2rem;
            font-weight: bold;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
            border-bottom: 3px solid #c20000;
        }

        .program-card {
            background: #fff;
            border-radius: 16px;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .program-card .card-title {
            color: #c20000;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.5);
        }

        .footer {
            background: #222;
            color: #bbb;
        }

        .footer a {
            color: #ddd;
        }

        @media (max-width: 767px) {
            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="animate__animated animate__fadeInDown">BEM FST</h1>

                    <p class="lead">Situs Web resmi dari Badan eksekutif Mahasiswa Fakultas Sains Dan Teknologi Universitas Ubudiyah Indonesia</p>
                    <div class="mt-4">
                        <a href="#visi-misi" class="btn btn-danger btn-lg rounded-pill me-2">Visi Misi</a>
                        <a href="#sejarah" class="btn btn-outline-light btn-lg rounded-pill">Sejarah</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentang-kami" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Tentang Kami</h2>
                <p class="text-muted">Mengenal lebih dekat BEM Fakultas Sains dan Teknologi</p>
            </div>
            <div class="row align-items-center g-5">
                <!-- Text -->
                <div class="col-md-6">
                    <div class="p-4 rounded-4 bg-white shadow-sm">
                        <h4 class="fw-semibold text-primary mb-3">BEM FST</h4>
                        <p class="text-secondary fs-5">
                            BEM FST merupakan organisasi mahasiswa yang bertujuan untuk <strong>mewadahi aspirasi mahasiswa</strong> dan menjalankan <strong>program-program strategis</strong> demi kemajuan civitas akademika Fakultas Sains dan Teknologi.
                        </p>
                        <p class="text-secondary">
                            Kami hadir sebagai wadah pengembangan diri, kolaborasi, dan kontribusi nyata dalam menciptakan lingkungan akademik yang dinamis dan berdaya saing tinggi.
                        </p>
                    </div>
                </div>
                <!-- Image -->
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('assets/img/bem-fst.jpg') ?>"
                        width="100%"
                        height="auto"
                        class="img-fluid rounded-4 shadow-sm"
                        alt="Tentang Kami">
                </div>
            </div>
        </div>
    </section>

    <!-- visi misi -->
    <section id="visi-misi" class="py-5" style="background-color:rgb(255, 255, 255);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Visi dan Misi</h2>
                <p class="text-muted">Pondasi arah dan tujuan organisasi kami</p>
            </div>
            <div class="row g-4 align-items-start">
                <!-- Visi -->
                <div class="col-md-6">
                    <div class="border rounded-4 p-4 bg-white shadow-sm h-100">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-eye text-primary me-2 fs-3"></i>
                            <h4 class="mb-0 text-primary fw-semibold">Visi</h4>
                        </div>
                        <p class="text-secondary">
                            Menjadi organisasi yang unggul dalam memberdayakan masyarakat melalui inovasi, kolaborasi, dan kepemimpinan yang berintegritas.
                        </p>
                    </div>
                </div>
                <!-- Misi -->
                <div class="col-md-6">
                    <div class="border rounded-4 p-4 bg-white shadow-sm h-100">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-bullseye text-success me-2 fs-3"></i>
                            <h4 class="mb-0 text-success fw-semibold">Misi</h4>
                        </div>
                        <ul class="list-unstyled text-secondary ps-3">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Meningkatkan kualitas sumber daya manusia melalui pelatihan dan pendidikan.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Mendorong partisipasi aktif masyarakat dalam pembangunan.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Mengembangkan program kerja yang berkelanjutan dan berbasis kebutuhan lokal.
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Menjalin kemitraan strategis dengan berbagai pihak untuk memperluas dampak sosial.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- sejarah -->
    <section id="sejarah" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Sejarah</h2>
                <p class="text-muted">Filosofi Logo dan Makna BEM FST UUI</p>
            </div>
            <div class="row align-items-center g-4">
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo BEM FST" class="img-fluid mb-3" style="max-width:220px;">
                </div>
                <div class="col-md-6">
                    <div class="bg-light rounded-4 p-4 shadow-sm">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">
                                <strong>Buku:</strong> Melambangkan sumber ilmu pengetahuan yang selalu diutamakan dalam upaya meningkatkan sumber daya manusia di lingkungan BEM FST UUI.
                            </li>
                            <li class="mb-3">
                                <strong>Burung Elang:</strong> Melambangkan semangat pantang menyerah, perlindungan, kecepatan, kekuatan, dan kekuasaan pada BEM FST UUI. Elang juga adalah maskot burung yang mampu terbang paling tinggi di dunia ini.
                            </li>
                            <li class="mb-3">
                                <strong>Gambar Tunas:</strong> Diambil dari ornamen logo UUI, yang melambangkan BEM FST UUI sebagai organisasi yang berasal dari dan dalam lingkungan UUI.
                            </li>
                            <li class="mb-3">
                                <strong>Warna Merah:</strong> Melambangkan ketegasan, berani, tekun, energik, dan kuat. Warna ini juga melambangkan tindakan, kepercayaan diri, dan keberanian.
                            </li>
                            <li>
                                <strong>Warna Orange:</strong> Melambangkan kreativitas, kebahagiaan, kebebasan, dan kepercayaan diri.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- baca beri -->



    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row gy-3">
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
                    <h5>Media Sosial</h5>
                    <div class="d-flex gap-2">
                        <a href="https://www.instagram.com/bemfst_uui"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center small">
                &copy; 2024 BEM FST. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?= $this->endSection() ?>