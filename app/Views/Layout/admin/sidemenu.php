<?php
$uri = service('uri');
?>
<div class="sideMenu bg-olive-grab7">
  <!-- Start Sidebar -->
  <div class="sidebar">
    <!-- Start Nav -->
    <ul class="navbar-nav">
      <!-- Start Nav Item -->
      <li class="nav-item">
        <!-- Nav Link -->
        <a href="<?= base_url('/') ?>" class="nav-link px-2<?= ($uri->getSegment(1) == '') ? ' active' : '' ?>">
          <!-- Menu Icon -->
          <i class="fas fa-tachometer-alt icon" data-toggle="tooltip" title="Dashboard"></i>
          <!-- Menu Text -->
          <span class="text">Dashboard</span>
        </a>
      </li>
      <!-- End Nav Item -->

      <!-- Start Nav Item -->
      <li class="nav-item dropdown">
        <!-- Nav Link -->
        <a href="#" class="nav-link px-2" data-toggle="collapse" data-target="#aplikasi">
          <!-- Nav Icon -->
          <i class="fas fa-window-maximize icon" data-toggle="tooltip" title="Aplikasi"></i>
          <!-- Nav Text -->
          <span class="text">Aplikasi</span>
        </a>
        <!-- Nav Dropdown -->
        <div id="aplikasi" class="collapse ml-3">
          <!-- Start Dropdown Item -->
          <a href="sistem.html" class="nav-link px-2">
            <!-- Dropdown Icon -->
            <i class="fas fa-file-alt icon" data-toggle="tooltip" title="Sistem"></i>
            <!-- Dropdown Text -->
            <span class="text">Sistem</span>
          </a>
          <!-- End Drowdown Item -->

          <!-- Start Dropdown Item -->
          <a href="modul.html" class="nav-link px-2">
            <!-- Dropdown Icon -->
            <i class="fas fa-file-alt icon" data-toggle="tooltip" title="Modul"></i>
            <!-- Dropdown Text -->
            <span class="text">Modul</span>
          </a>
          <!-- End Dropdown Item -->

          <!-- Start Dropdown Item -->
          <a href="aksi.html" class="nav-link px-2">
            <!-- Dropdown Icon -->
            <i class="fas fa-file-alt icon" data-toggle="tooltip" title="Aksi"></i>
            <!-- Dropdown Text -->
            <span class="text">Aksi</span>
          </a>
          <!-- End Dropdown Item -->
        </div>
      </li>
      <!-- End Nav Item -->

      <!-- Start Nav Item -->
      <li class="nav-item dropdown">
        <!-- Nav Link -->
        <a href="#" class="nav-link px-2" data-toggle="collapse" data-target="#pengguna">
          <!-- Nav Icon -->
          <i class="fas fa-users icon" data-toggle="tooltip" title="Pengguna"></i>
          <!-- Nav Text -->
          <span class="text">Pengguna</span>
        </a>
        <!-- Nav Dropdown -->
        <div id="pengguna" class="collapse ml-3">
          <!-- Start Dropdown Item -->
          <a href="pengguna.html" class="nav-link px-2">
            <!-- Dropdown Icon -->
            <i class="fas fa-file-alt icon" data-toggle="tooltip" title="Pengguna"></i>
            <!-- Dropdown Text -->
            <span class="text">Pengguna</span>
          </a>
          <!-- End Dropdown Item -->

          <!-- Start Dropdown Item -->
          <a href="level.html" class="nav-link px-2">
            <!-- Dropdown Icon -->
            <i class="fas fa-file-alt icon" data-toggle="tooltip" title="Level Akses"></i>
            <!-- Dropdown Text -->
            <span class="text">Level Akses</span>
          </a>
          <!-- End Dropdown Item -->
        </div>
      </li>
      <!-- End Nav Item -->

      <!-- Start Nav Item -->
      <li class="nav-item">
        <!-- Nav Link -->
        <a href="<?= base_url('aplikasi/menu') ?>" class="nav-link px-2">
          <!-- Nav Icon -->
          <i class="fas fa-ellipsis-h icon" data-toggle="tooltip" title="Log Aktivitas"></i>
          <!-- Nav Text -->
          <span class="text">Menu</span>
        </a>
      </li>
      <!-- End Nav Item -->

      <!-- Start Nav Item -->
      <li class="nav-item">
        <!-- Nav Link -->
        <a href="log.html" class="nav-link px-2">
          <!-- Nav Icon -->
          <i class="fas fa-history icon" data-toggle="tooltip" title="Log Aktivitas"></i>
          <!-- Nav Text -->
          <span class="text">Log Aktivitas</span>
        </a>
      </li>
      <!-- End Nav Item -->

      <!-- Start Nav Item -->
      <li class="nav-item">
        <!-- Nav Link -->
        <a href="#" class="nav-link px-2 sideMenuToggler text-center">
          <!-- Nav Icon -->
          <i class="fas fa-chevron-circle-left icon expandView" data-toggle="tooltip" title="Resize"></i>
        </a>
      </li>
      <!-- End Nav Item -->
    </ul>
    <!-- End Nav -->
  </div>
  <!-- End Sidebar -->
</div>