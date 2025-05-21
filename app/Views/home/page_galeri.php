<?= $this->extend('layouts/public') ?>
<?= $this->section('content') ?>

<!-- hero section -->
<section class="hero-section bg-primary text-white py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="fw-bold mb-4">Galeri</h1>
        <p class="lead">Galeri foto kegiatan BEM FST</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="<?= base_url('assets/galeri.jpg') ?>" alt="Galeri BEM FST" class="img-fluid rounded-4 shadow-lg" style="max-height: 320px;">
      </div>
    </div>
  </div>
</section>

<!-- galeri Section -->
<section class="galeri-section py-5">
  <div class="container">
    <div class="row g-4">
      <?php if (!empty($galeri)) : ?>
        <?php foreach ($galeri as $g) : ?>
          <div class="col-lg-4 col-md-6">
            <div class="card galeri-card h-100 border-0">
              <div class="galeri-img-wrapper">
                <img src="<?= base_url('uploads/galeri/' . $g['upload']) ?>"
                  alt="<?= esc($g['judul']) ?>"
                  class="card-img-top galeri-img" />
                <div class="galeri-overlay">
                  <a href="<?= base_url('galeri/detail/' . $g['id']) ?>"
                    class="btn btn-light btn-sm rounded-circle">
                    <i class="fas fa-search-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h5 class="card-title text-primary fw-bold mb-0"><?= esc($g['judul']) ?></h5>
                  <span class="badge bg-primary rounded-pill">
                    <i class="fas fa-calendar-alt me-1"></i>
                    <?= date('d M Y', strtotime($g['tgl_input'])) ?>
                  </span>
                </div>
                <p class="card-text text-secondary mb-3">
                  <?= substr(strip_tags($g['deskripsi']), 0, 100) . '...' ?>
                </p>
                <a href="<?= base_url('galeri/detail/' . $g['id']) ?>"
                  class="btn btn-link text-primary p-0 text-decoration-none">
                  Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="col-12">
          <div class="alert alert-info text-center shadow-sm">
            <i class="fas fa-info-circle me-2"></i>
            Belum ada galeri yang tersedia.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<style>
  .galeri-card {
    transition: all 0.3s ease;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
  }

  .galeri-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
  }

  .galeri-img-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
  }

  .galeri-img {
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .galeri-card:hover .galeri-img {
    transform: scale(1.05);
  }

  .galeri-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .galeri-card:hover .galeri-overlay {
    opacity: 1;
  }

  .badge {
    font-weight: 500;
    padding: 0.5em 1em;
  }
</style>

<?= $this->endSection() ?>