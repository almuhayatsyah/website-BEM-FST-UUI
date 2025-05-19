<?= $this->extend('dashboard/index') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pengaturan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
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

    <div class="row">
      <!-- Profil User -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Profil User</h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url('pengaturan/update-profile') ?>" method="POST">
              <?= csrf_field() ?>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
              </div>

              <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
              </div>

              <button type="submit" class="btn btn-primary">Update Profil</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Pengaturan Website -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pengaturan Website</h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url('pengaturan/update-website') ?>" method="POST">
              <?= csrf_field() ?>

              <div class="form-group">
                <label for="nama_website">Nama Website</label>
                <input type="text" class="form-control" id="nama_website" name="nama_website" value="<?= $pengaturan['nama_website'] ?? '' ?>">
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi Website</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $pengaturan['deskripsi'] ?? '' ?></textarea>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pengaturan['alamat'] ?? '' ?>">
              </div>

              <div class="form-group">
                <label for="email">Email Website</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $pengaturan['email'] ?? '' ?>">
              </div>

              <button type="submit" class="btn btn-primary">Update Pengaturan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>