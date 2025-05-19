<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Berita</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Berita</li>
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
        <h3 class="card-title">Daftar Berita</h3>
        <div class="card-tools">
          <a href="<?= base_url('berita/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Berita
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
                <th>Terakhir Update</th>
                <th style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($berita as $b) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $b['judul']; ?></td>
                  <td>
                    <img src="<?= base_url('uploads/berita/' . $b['upload']) ?>"
                      alt="Gambar <?= $b['judul'] ?>"
                      class="img-fluid"
                      style="width: 100px; height: auto;">
                  </td>
                  <td><?= substr($b['deskripsi'], 0, 100) . '...'; ?></td>
                  <td><?= date('d-m-Y', strtotime($b['created_at'])); ?></td>
                  <td><?= date('d-m-Y', strtotime($b['updated_at'])); ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('berita/edit/' . $b['id']) ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?= base_url('berita/delete/' . $b['id']) ?>" method="POST" class="d-inline">
                      <?= csrf_field() ?>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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