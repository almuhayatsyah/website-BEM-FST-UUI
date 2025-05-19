<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Struktur Organisasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('struktur-organisasi') ?>">Struktur Organisasi</a></li>
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
        <h3 class="card-title">Form Tambah Struktur Organisasi</h3>
      </div>
      <form action="<?= base_url('struktur-organisasi/store') ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                  <li><?= esc($error) ?></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= old('nama') ?>" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= old('jabatan') ?>" placeholder="Jabatan" required>
          </div>
          <div class="form-group">
            <label for="divisi">Divisi</label>
            <input type="text" name="divisi" class="form-control" id="divisi" value="<?= old('divisi') ?>" placeholder="Divisi" required>
          </div>
          <div class="form-group">
            <label for="gambar">Foto</label>
            <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*" required>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('struktur-organisasi') ?>" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>

<?= $this->endSection() ?>