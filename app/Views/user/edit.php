<?= $this->extend('dashboard/index') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <h2>Edit User</h2>
  <form action="<?= base_url('user/update/' . $user['id']) ?>" method="post">
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
    </div>
    <div class="form-group">
      <label>Level</label>
      <select name="level" class="form-control" required>
        <option value="admin" <?= $user['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="super_admin" <?= $user['level'] == 'super_admin' ? 'selected' : '' ?>>Super Admin</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('user') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection() ?>