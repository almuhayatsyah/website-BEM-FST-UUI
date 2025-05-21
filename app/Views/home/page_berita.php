<?= $this->extend('layouts/public') ?>
<?= $this->section('content') ?>

<!-- hero section -->
<section class="hero-section bg-primary text-white py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="fw-bold mb-4">Berita</h1>
        <p class="lead">Berita terbaru dan informasi terkini dari BEM FST</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="<?= base_url('assets/berita.jpg') ?>" alt="Berita BEM FST" class="img-fluid rounded-4 shadow-lg" style="max-height: 320px;">
      </div>
    </div>
  </div>
</section>

<!-- berita section -->
<section class="program-kerja-section py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <?php if (!empty($berita)) : ?>
        <?php foreach ($berita as $b) : ?>
          <div class="col-lg-6 col-md-12">
            <div class="card berita-card h-100 shadow-sm rounded-4 overflow-hidden">
              <?php if (!empty($b['upload'])) : ?>
                <div class="berita-img-wrapper">
                  <img src="<?= base_url('uploads/berita/' . $b['upload']) ?>" alt="<?= esc($b['judul']) ?>" class="card-img-top berita-img" />
                </div>
              <?php endif; ?>
              <div class="card-body p-4">
                <h5 class="card-title text-primary fw-bold mb-3"><?= esc($b['judul']) ?></h5>
                <div class="d-flex align-items-center mb-3 text-muted small">
                  <i class="fas fa-calendar-alt me-2"></i>
                  <span><?= date('d F Y', strtotime($b['tgl_input'])) ?></span>
                </div>
                <p class="card-text text-secondary mb-4"><?= nl2br(esc($b['deskripsi'])) ?></p>
                <a href="<?= base_url('berita/detail/' . $b['id']) ?>" class="btn btn-outline-primary fw-semibold">
                  Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="col-12">
          <div class="alert alert-info text-center">
            Belum ada berita yang tersedia.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<style>
  .berita-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .berita-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }

  .berita-img-wrapper {
    overflow: hidden;
    height: 220px;
  }

  .berita-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .berita-card:hover .berita-img {
    transform: scale(1.05);
  }

  .card-title {
    font-size: 1.5rem;
  }

  .btn-outline-primary {
    border-width: 2px;
  }

  .btn-outline-primary:hover {
    background-color: #0d6efd;
    color: #fff;
  }
</style>

<?= $this->endSection() ?>