<?php
$current_url = current_url();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url('/') ?>">
      <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" width="40" height="40">
      <span>FAKULTAS SAINS<br>DAN TEKNOLOGI</span>
    </a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Nav Items -->
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/') ?>">Beranda</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('#sejarah') ?>">Sejarah</a></li>
            <li><a class="dropdown-item" href="<?= base_url('#visi-misi') ?>">Visi Misi</a></li>
            <li><a class=" dropdown-item" href="<?= base_url('#tentang-kami') ?>">Tentang Kami</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url('program-kerja/public') ?>">Program Kerja</a>
        </li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('struktur-organisasi/public') ?>">Struktur Organisasi</a>

        </li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('berita') ?>">Berita</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('galeri') ?>">Galeri</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#footer ">Hubungi Kami</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt"></i> Masuk</a></li>
      </ul>
    </div>
  </div>
</nav>