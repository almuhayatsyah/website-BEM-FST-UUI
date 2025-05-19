<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Social Media</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('hubungi-kami') ?>">Social Media</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Social Media</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('hubungi-kami/store') ?>" method="POST">
          <?= csrf_field() ?>

          <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="text" class="form-control <?= session('errors.instagram') ? 'is-invalid' : '' ?>"
              id="instagram" name="instagram" placeholder="@username" value="<?= old('instagram') ?>">
            <?php if (session('errors.instagram')) : ?>
              <div class="invalid-feedback"><?= session('errors.instagram') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="tiktok">TikTok</label>
            <input type="text" class="form-control <?= session('errors.tiktok') ? 'is-invalid' : '' ?>"
              id="tiktok" name="tiktok" placeholder="@username" value="<?= old('tiktok') ?>">
            <?php if (session('errors.tiktok')) : ?>
              <div class="invalid-feedback"><?= session('errors.tiktok') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" class="form-control <?= session('errors.whatsapp') ? 'is-invalid' : '' ?>"
              id="whatsapp" name="whatsapp" placeholder="+62xxx" value="<?= old('whatsapp') ?>">
            <?php if (session('errors.whatsapp')) : ?>
              <div class="invalid-feedback"><?= session('errors.whatsapp') ?></div>
            <?php endif; ?>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('hubungi-kami') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>