<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Sejarah</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('sejarah') ?>">Sejarah</a></li>
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
        <h3 class="card-title">Form Edit Sejarah</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('sejarah/update/' . $sejarah['id']) ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <textarea class="form-control <?= session('errors.sejarah') ? 'is-invalid' : '' ?>"
              id="sejarah" name="sejarah" rows="6"><?= old('sejarah', $sejarah['sejarah']) ?></textarea>
            <?php if (session('errors.sejarah')) : ?>
              <div class="invalid-feedback"><?= session('errors.sejarah') ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="upload_logo">Logo</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input <?= session('errors.upload_logo') ? 'is-invalid' : '' ?>"
                id="upload_logo" name="upload_logo">
              <label class="custom-file-label" for="upload_logo">Pilih file</label>
              <?php if (session('errors.upload_logo')) : ?>
                <div class="invalid-feedback"><?= session('errors.upload_logo') ?></div>
              <?php endif; ?>
            </div>
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah logo</small>
          </div>

          <div class="form-group">
            <label>Logo Saat Ini</label>
            <div>
              <img src="<?= base_url('uploads/sejarah/' . $sejarah['upload_logo']) ?>"
                alt="Logo Preview" class="img-fluid mt-2" style="max-height: 200px">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url('sejarah') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>