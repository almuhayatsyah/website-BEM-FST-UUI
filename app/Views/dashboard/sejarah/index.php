<?= $this->extend('dashboard/index') ?>

<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Sejarah & Visi Misi</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <!-- Form Sejarah -->
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title">Sejarah</h3>
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('sejarah/update') ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $sejarah['id'] ?? '' ?>">

          <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <textarea name="sejarah" id="sejarah" class="form-control" rows="10"><?= $sejarah['sejarah'] ?? '' ?></textarea>
          </div>

          <div class="form-group">
            <label for="upload_logo">Logo</label>
            <input type="file" name="upload_logo" id="upload_logo" class="form-control">
          </div>

          <button type="submit" class="btn btn-primary">Simpan Sejarah</button>
        </form>
      </div>
    </div>

    <!-- Form Visi Misi -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Visi & Misi</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('visimisi/update') ?>" method="POST">
          <input type="hidden" name="id" value="<?= $visimisi['id'] ?? '' ?>">

          <div class="form-group">
            <label for="visi">Visi</label>
            <textarea name="visi" id="visi" class="form-control" rows="5"><?= $visimisi['visi'] ?? '' ?></textarea>
          </div>

          <div class="form-group">
            <label for="misi">Misi</label>
            <textarea name="misi" id="misi" class="form-control" rows="10"><?= $visimisi['misi'] ?? '' ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Visi Misi</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>