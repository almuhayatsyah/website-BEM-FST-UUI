<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Program Kerja</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('program-kerja') ?>">Program Kerja</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Detail Program Kerja</h3>
      </div>
      <div class="card-body">
        <div class="form-group
          <label for=" nama_program_kerja">Nama Program Kerja</label>
          <input type="text" class="form-control" id="nama_program_kerja" name="nama_program_kerja" value="<?= $program_kerja['nama_program_kerja'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="tujuan_kegiatan">Tujuan Kegiatan</label>
          <textarea class="form-control" id="tujuan_kegiatan" name="tujuan_kegiatan" rows="4" readonly><?= $program_kerja['tujuan_kegiatan'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="sasaran">Sasaran</label>
          <input type="text" class="form-control" id="sasaran" name="sasaran" value="<?= $program_kerja['sasaran'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="target_pelaksanaan">Target Pelaksanaan</label>
          <input type="text" class="form-control" id="target_pelaksanaan" name="target_pelaksanaan" value="<?= $program_kerja['target_pelaksanaan'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" rows="4" readonly><?= $program_kerja['keterangan'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="tgl_input">Tanggal Input</label>
          <input type="text" class="form-control" id="tgl_input" name="tgl_input" value="<?= $program_kerja['tgl_input'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="tgl_update">Tanggal Update</label>
          <input type="text" class="form-control" id="tgl_update" name="tgl_update" value="<?= $program_kerja['tgl_update'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="upload">Foto</label>
          <img src="<?= base_url('uploads/program_kerja/' . $program_kerja['upload']) ?>" alt="Gambar <?= $program_kerja['nama_program_kerja'] ?>" class="img-fluid">
        </div>
        <div class="form-group">
          <a href="<?= base_url('program-kerja') ?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>