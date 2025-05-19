<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Struktur Organisasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Struktur Organisasi</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Struktur Organisasi</h3>
        <div class="card-tools">
          <a href="<?= base_url('struktur-organisasi/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Anggota
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 5%">No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th>Foto</th>
                <th style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($struktur_organisasi as $struktur): ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= esc($struktur['nama']) ?></td>
                  <td><?= esc($struktur['jabatan']) ?></td>
                  <td><?= esc($struktur['divisi']) ?></td>
                  <td>
                    <?php if (!empty($struktur['gambar'])): ?>
                      <img src="<?= base_url('uploads/struktur_organisasi/' . $struktur['gambar']) ?>" width="80" alt="Foto">
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?= base_url('struktur-organisasi/edit/' . $struktur['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?= base_url('struktur-organisasi/delete/' . $struktur['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                      <?= csrf_field() ?>
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>