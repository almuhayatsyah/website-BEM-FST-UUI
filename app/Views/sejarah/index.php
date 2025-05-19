<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Sejarah BEM FST</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Sejarah</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
      
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Sejarah</h3>
        <div class="card-tools">
          <a href="<?= base_url('sejarah/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Sejarah
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 5%">No</th>
                <th>Logo</th>
                <th>Sejarah</th>
                <th>Tanggal Input</th>
                <th>Terakhir Update</th>
                <th style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($sejarah as $s) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td>
                    <img src="<?= base_url('uploads/sejarah/' . $s['upload_logo']) ?>"
                      alt="Logo" class="img-fluid" style="width: 100px; height: auto;">
                  </td>
                  <td><?= $s['sejarah']; ?></td>
                  <td><?= date('d-m-Y', strtotime($s['created_at'])); ?></td>
                  <td><?= date('d-m-Y', strtotime($s['updated_at'])); ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('sejarah/edit/' . $s['id']) ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?= base_url('sejarah/delete/' . $s['id']) ?>" method="POST" class="d-inline">
                      <?= csrf_field() ?>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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