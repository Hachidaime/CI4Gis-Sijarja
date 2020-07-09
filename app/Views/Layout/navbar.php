<?php
$uri = service('uri');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">CI4Map</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if (session()->get('isLoggedIn')) : ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item<?= ($uri->getSegment(1) == 'home') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
          </li>
          <li class="nav-item<?= ($uri->getSegment(1) == 'gis') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/gis') ?>">GIS</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item<?= ($uri->getSegment(1) == 'profile') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/profile') ?>">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
          </li>
        </ul>
      <?php else : ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item<?= ($uri->getSegment(1) == '') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
          </li>
          <li class="nav-item<?= ($uri->getSegment(1) == 'gis') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/gis') ?>">GIS</a>
          </li>
          <li class="nav-item<?= ($uri->getSegment(1) == 'pengaduan') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/pengaduan') ?>">Pengaduan</a>
          </li>
          <li class="nav-item<?= ($uri->getSegment(1) == 'galeri') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/galeri') ?>">Galeri</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item<?= ($uri->getSegment(1) == 'login') ? ' active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
          </li>
        </ul>
      <?php endif; ?>

    </div>
  </div>
</nav>