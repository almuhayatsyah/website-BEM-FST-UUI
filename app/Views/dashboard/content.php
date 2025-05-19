<?= $this->extend('dashboard/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Selamat Datang di Badan Eksekutif Mahasiswa Fakultas Sains dan Teknologi Universitas Ubudiyah Indonesia</h5>
            <p class="card-text">
              Anda login sebagai <?= session()->get('username') ?> (<?= session()->get('level') ?>)
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>
            <p>Berita</p>
          </div>
          <div class="icon">
            <i class="fas fa-newspaper"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53</h3>
            <p>Galeri</p>
          </div>
          <div class="icon">
            <i class="fas fa-images"></i>
          </div>
          <a href="galeri" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>200</h3>
            <p>Program Kerja</p>
          </div>
          <div class="icon">
            <i class="fas fa-tasks"></i>
          </div>
          <a href="program-kerja" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?= isset($total_users) ? $total_users : '-' ?></h3>
            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Pengunjung</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Hubungi kami</p>
          </div>
          <div class="icon">
            <i class="fas fa-share-alt"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-share-alt"></i> </a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Anggota 65</h3>
            <p>Struktur Organisasi</p>
          </div>
          <div class="icon">
            <i class="fas fa-share-alt"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-share-alt"></i> </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>