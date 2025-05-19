<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Program Kerja</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('program-kerja') ?>">Program Kerja</a></li>
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
        <h3 class="card-title">Form Edit Program Kerja</h3>
      </div>
      <form action="<?= base_url('program-kerja/update/' . $program_kerja['id']) ?>" method="post">
        <div class="card-body">
          <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Error!</h5>
              <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                  <li><?= $error ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="form-group">
            <label for="nama_program_kerja">Nama Program Kerja</label>
            <input type="text" class="form-control" id="nama_program_kerja" name="nama_program_kerja" value="<?= old('nama_program_kerja', $program_kerja['nama_program_kerja']) ?>" required>
          </div>

          <div class="form-group">
            <label for="tujuan_kegiatan">Tujuan Kegiatan</label>
            <textarea type="text" class="form-control" id="tujuan_kegiatan" name="tujuan_kegiatan" value="<?= old('tujuan_kegiatan', $program_kerja['tujuan_kegiatan']) ?>" required>
                </textarea>
          </div>

          <div class="form-group">
            <label for="sasaran">Sasaran</label>
            <input type="text" class="form-control" id="sasaran" name="sasaran" value="<?= old('sasaran', $program_kerja['sasaran']) ?>" required>
          </div>

          <div class="form-group">
            <label for="target_pelaksanaan">Target Pelaksanaan</label>
            <input type="text" class="form-control" id="target_pelaksanaan" name="target_pelaksanaan" value="<?= old('target_pelaksanaan', $program_kerja['target_pelaksanaan']) ?>" required>
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required><?= old('keterangan', $program_kerja['keterangan']) ?></textarea>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url('program-kerja') ?>" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
<?= $this->endSection() ?>