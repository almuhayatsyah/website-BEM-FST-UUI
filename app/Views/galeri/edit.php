<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Galeri</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('galeri') ?>">Galeri</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Edit Galeri</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('galeri/update/' . $galeri['id']) ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control <?= session('errors.judul') ? 'is-invalid' : '' ?>"
              id="judul" name="judul" value="<?= old('judul', $galeri['judul']) ?>">
            <?php if (session('errors.judul')) : ?>
              <div class="invalid-feedback"><?= session('errors.judul') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : '' ?>"
              id="deskripsi" name="deskripsi" rows="3"><?= old('deskripsi', $galeri['deskripsi']) ?></textarea>
            <?php if (session('errors.deskripsi')) : ?>
              <div class="invalid-feedback"><?= session('errors.deskripsi') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="upload">Foto</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input <?= session('errors.upload') ? 'is-invalid' : '' ?>"
                id="upload" name="upload">
              <label class="custom-file-label" for="upload">Pilih file</label>
              <?php if (session('errors.upload')) : ?>
                <div class="invalid-feedback"><?= session('errors.upload') ?></div>
              <?php endif; ?>
            </div>
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
          </div>

          <div class="form-group">
            <img src="<?= base_url('uploads/galeri/' . $galeri['upload']) ?>"
              alt="Preview" class="img-fluid mt-2" style="max-height: 200px">
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url('galeri') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>