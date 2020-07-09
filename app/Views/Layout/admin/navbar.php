<nav class="navbar navbar-expand-lg navbar-light bg-goldenrod fixed-top">
  <!-- Sidemenu Toggle Button -->
  <button class="navbar-toggler sideMenuToggler border-0" type="button">
    <span class="fas fa-bars"></span>
  </button>

  <!-- Brand -->
  <a class="navbar-brand" href="#"><strong>Console Admin</strong></a>

  <!-- Navbar Toggle Button -->
  <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-ellipsis-v"></span>
  </button>

  <!-- Start Collapse -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Start Nav -->
    <ul class="navbar-nav ml-auto">

      <!-- Start Nav Item -->
      <div class="nav-item">
        <div class="form-group mb-0">
          <?php
          $systemModel = new \App\Models\SystemModel();
          $system = $systemModel->findAll();
          ?>
          <select class="custom-select custom-select-sm" id="systemSelect">
            <option selected="">Sistem</option>
            <?php foreach ($system as $item) : ?>
              <option value="<?= $item['slug'] ?>"><?= $item['name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <!-- End Nav Item -->

      <!-- Start Nav Item -->
      <li class="nav-item dropdown">
        <!-- Nav Link -->
        <a class="nav-link dropdown-toggle px-3 py-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- Menu Icon -->
          <i class="fas fa-user icon"> </i>
          <!-- Menu Text -->
          <span class="text">Akun</span>
        </a>
        <!-- Nav Dropdown -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <!-- Start Profile Summary -->
          <div class="p-3">
            <div class="text-center">
              <!-- Profile Photo -->
              <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="" class="rounded-circle thumbnail-photo" />
              <div class="mt-2"><?= session()->get('name') ?></div>
              <div class="mt-2"><?= session()->get('email') ?></div>
            </div>
          </div>
          <!-- End Profile Summary -->

          <!-- Dropdown Items -->
          <a class="dropdown-item" href="<?= base_url('profile') ?>">Profil</a>
          <a class="dropdown-item" href="<?= base_url('change-password') ?>">Ubah Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('logout') ?>">Keluar</a>
        </div>
      </li>
      <!-- End Nav Item -->
    </ul>
    <!-- End Nav -->
  </div>
  <!-- End Collapse -->
</nav>