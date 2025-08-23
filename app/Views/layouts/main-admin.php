<?= view('layouts/header-admin') ?>

<?= view('layouts/sidebar-admin') ?>

<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<?= view('layouts/footer-admin') ?>