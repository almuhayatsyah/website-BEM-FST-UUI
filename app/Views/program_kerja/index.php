<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Program Kerja</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Program Kerja</li>
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
        <h3 class="card-title">Daftar Program Kerja</h3>
        <div class="card-tools">
          <a href="<?= base_url('program-kerja/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Program Kerja
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 5%">No</th>
                <th>Nama Program Kerja</th>
                <th>Tujuan Kegiatan</th>
                <th>Sasaran</th>
                <th>Target Pelaksanaan</th>
                <th>Keterangan</th>
                <th style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($program_kerja as $pk) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $pk['nama_program_kerja']; ?></td>
                  <td><?= $pk['tujuan_kegiatan']; ?></td>
                  <td><?= $pk['sasaran']; ?></td>
                  <td><?= $pk['target_pelaksanaan']; ?></td>
                  <td><?= $pk['keterangan']; ?></td>
                  <td>
                    <a href="<?= base_url('program-kerja/edit/' . $pk['id']); ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?= base_url('program-kerja/delete/' . $pk['id']); ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program kerja ini?');">
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