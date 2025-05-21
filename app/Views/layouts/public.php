<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'BEM FST UUI' ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- ...your other CSS... -->
</head>

<body>
  <!-- Navbar -->
  <?= $this->include('layouts/partials/navbar') ?>

  <!-- Content -->
  <?= $this->renderSection('content') ?>

  <!-- Footer -->
  <?php if (is_file(APPPATH . 'Views/layouts/partials/footer.php')): ?>
    <?= $this->include('layouts/partials/footer') ?>
  <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>