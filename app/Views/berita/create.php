<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Berita</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('berita') ?>">Berita</a></li>
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
        <h3 class="card-title">Form Tambah Berita</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('admin/berita/store') ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control <?= session('errors.judul') ? 'is-invalid' : '' ?>"
              id="judul" name="judul" value="<?= old('judul') ?>">
            <?php if (session('errors.judul')) : ?>
              <div class="invalid-feedback"><?= session('errors.judul') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : '' ?>"
              id="deskripsi" name="deskripsi" rows="5"><?= old('deskripsi') ?></textarea>
            <?php if (session('errors.deskripsi')) : ?>
              <div class="invalid-feedback"><?= session('errors.deskripsi') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="upload">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input <?= session('errors.upload') ? 'is-invalid' : '' ?>"
                id="upload" name="upload">
              <label class="custom-file-label" for="upload">Pilih file</label>
              <?php if (session('errors.upload')) : ?>
                <div class="invalid-feedback"><?= session('errors.upload') ?></div>
              <?php endif; ?>
            </div>
            <small class="text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('berita') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>