<?= $this->extend('layouts/public') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section bg-black text-white py-5 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="fw-bold mb-4">Struktur Organisasi</h1>
        <p class="lead">Struktur organisasi BEM FST Universitas Ubudiyah Indonesia</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="<?= base_url('assets/img/leadercamp.jpg') ?>" alt="Struktur Organisasi BEM FST" class="img-fluid rounded-4 shadow-lg" style="max-height: 800x;">
      </div>
    </div>
  </div>
</section>

<!-- Struktur Organisasi -->
<section id="StrukturOrganisasi" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-5">Struktur Organisasi</h2>
    <div class="row g-4">
      <?php if (!empty($struktur_organisasi)): ?>
        <?php foreach ($struktur_organisasi as $so): ?>
          <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 strukture-card">
              <img src="<?= base_url('uploads/struktur_organisasi/' . $so['gambar']) ?>" class="card-img-top rounded-top-4" alt="<?= esc($so['nama']) ?>" style="object-fit: cover; height: 280px;">
              <div class="card-body text-center">
                <h5 class="card-title fw-bold"><?= esc($so['nama']) ?></h5>
                <p class="card-text text-muted mb-2"><?= esc($so['jabatan']) ?></p>
                <p class="card-text fst-italic text-primary"><?= esc($so['divisi']) ?></p>
                <a href="<?= base_url('struktur-organisasi/detail/' . $so['id']) ?>" class="btn btn-outline-primary btn-sm mt-3">Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="alert alert-info text-center">Belum ada struktur organisasi yang terdaftar.</div>
      <?php endif; ?>
    </div>
  </div>
</section>

<style>
  .strukture-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .strukture-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
  }

  .section-title {
    font-weight: 700;
    font-size: 2.5rem;
    letter-spacing: 1px;
  }
</style>

<?= $this->endSection() ?>