<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Galeri</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Galeri</li>
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
        <h3 class="card-title">Daftar Galeri</h3>
        <div class="card-tools">
          <a href="<?= base_url('galeri/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Galeri
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 5%">No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Tanggal Input</th>
                <th>Tanggal Update</th>
                <th style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($galeri as $g) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $g['judul']; ?></td>
                  <td>
                    <img src="<?= base_url('uploads/galeri/' . $g['upload']) ?>"
                      alt="Gambar <?= $g['judul'] ?>"
                      class="img-fluid"
                      style="width: 100px; height: auto;">
                  </td>
                  <td><?= $g['deskripsi']; ?></td>
                  <td><?= date('d-m-Y', strtotime($g['created_at'])); ?></td>
                  <td><?= date('d-m-Y', strtotime($g['updated_at'])); ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('galeri/edit/' . $g['id']) ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?= base_url('galeri/delete/' . $g['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                      <?= csrf_field() ?>
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </button>
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