<?= $this->extend('layouts/public') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="fw-bold mb-4">Program Kerja</h1>
        <p class="lead">Program kerja unggulan dari BEM FST untuk memajukan dan mengembangkan potensi mahasiswa Fakultas Sains dan Teknologi
        </p>
      </div>
      <div class="col-md-6">
        <img src="<?= base_url('assets/program_kerja.jpg') ?>" alt="Program Kerja BEM FST" class="img-fluid rounded-4 shadow">
      </div>
    </div>
  </div>
</section>

<!-- Program Kerja Cards -->
<section class="program-kerja-section py-5">
  <div class="container">
    <div class="row g-4">
      <?php if (!empty($program_kerja)) : ?>
        <?php foreach ($program_kerja as $pk) : ?>
          <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm hover-shadow transition-300">
              <div class="card-body p-4">
                <div class="program-header mb-4">
                  <h5 class="card-title text-primary fw-bold mb-2">
                    <?= esc($pk['nama_program_kerja']) ?>
                  </h5>
                  <div class="progress" style="height: 3px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                  </div>
                </div>

                <div class="program-details">
                  <div class="mb-3">
                    <h6 class="text-danger fw-bold mb-2">
                      <i class="fas fa-bullseye me-2"></i>Tujuan
                    </h6>
                    <p class="text-muted mb-0"><?= esc($pk['tujuan_kegiatan']) ?></p>
                  </div>

                  <div class="mb-3">
                    <h6 class="text-primary fw-bold mb-2">
                      <i class="fas fa-users me-2"></i>Sasaran
                    </h6>
                    <p class="text-muted mb-0"><?= esc($pk['sasaran']) ?></p>
                  </div>

                  <div class="mb-3">
                    <h6 class="text-warning fw-bold mb-2">
                      <i class="fas fa-clock me-2"></i>Target Pelaksanaan
                    </h6>
                    <p class="text-muted mb-0"><?= esc($pk['target_pelaksanaan']) ?></p>
                  </div>

                  <?php if (!empty($pk['keterangan'])) : ?>
                    <div>
                      <h6 class="text-secondary fw-bold mb-2">
                        <i class="fas fa-info-circle me-2"></i>Keterangan
                      </h6>
                      <p class="text-muted mb-0"><?= esc($pk['keterangan']) ?></p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="col-12">
          <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Belum ada program kerja yang terdaftar.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<style>
  .hero-section {
    background: linear-gradient(135deg, #982323 0%, #6a1a1a 100%);
    min-height: 400px;
    display: flex;
    align-items: center;
    margin-top: 56px;
    /* Untuk mengompensasi navbar fixed-top */
  }

  .program-kerja-section {
    background-color: #f8f9fa;
  }

  .hover-shadow:hover {
    transform: translateY(-5px);
  }

  .transition-300 {
    transition: all 0.3s ease;
  }

  .card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
  }

  .progress {
    border-radius: 10px;
  }

  .card-title {
    font-size: 1.25rem;
  }

  @media (max-width: 768px) {
    .hero-section {
      text-align: center;
    }

    .hero-section img {
      margin-top: 2rem;
    }
  }
</style>

<?= $this->endSection() ?>