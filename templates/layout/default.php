<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */

$appName = 'BookIt System';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $appName ?><?= $this->fetch('title') ? ' - ' . $this->fetch('title') : '' ?></title>

    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap CSS (CDN) -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') ?>

    <!-- Optional: small custom spacing -->
    <style>
        body { background: #f8f9fa; }
        .page-wrap { padding-top: 80px; }
    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="<?= $this->Url->build('/') ?>"><?= h($appName) ?></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build('/academic/faculties') ?>">Faculties</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build('/academic/programmes') ?>">Programmes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build('/lecturers') ?>">Lecturers</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $this->Url->build('/appointments') ?>">Appointments</a>
        </li>

      </ul>

      <div class="d-flex gap-2">
        <a class="btn btn-outline-light btn-sm" target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Cake Docs</a>
        <a class="btn btn-outline-light btn-sm" target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
      </div>
    </div>
  </div>
</nav>

<main class="page-wrap">
  <div class="container">
    <?= $this->Flash->render() ?>
    <div class="card shadow-sm">
      <div class="card-body">
        <?= $this->fetch('content') ?>
      </div>
    </div>
  </div>
</main>

<!-- Bootstrap JS Bundle (CDN) -->
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') ?>

<?= $this->fetch('script') ?>
</body>
</html>
