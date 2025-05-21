<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h2><?= esc($title) ?></h2>

  <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
          <li><?= esc($error) ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="<?= base_url('admin/struktur-organisasi/update/' . $struktur['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= esc($struktur['id']) ?>">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" value="<?= esc($struktur['nama']) ?>" required>
    </div>
    <div class="mb-3">
      <label for="jabatan" class="form-label">Jabatan</label>
      <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= esc($struktur['jabatan']) ?>" required>
    </div>
    <div class="mb-3">
      <label for="divisi" class="form-label">Divisi</label>
      <input type="text" name="divisi" class="form-control" id="divisi" value="<?= esc($struktur['divisi']) ?>" required>
    </div>
    <div class="mb-3">
      <label for="gambar" class="form-label">Foto</label><br>
      <?php if (!empty($struktur['gambar'])): ?>
        <img src="<?= base_url('uploads/struktur_organisasi/' . $struktur['gambar']) ?>" width="80" alt="Foto"><br>
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control mt-2" id="gambar" accept="image/*">
      <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('struktur-organisasi') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?= $this->endSection() ?>