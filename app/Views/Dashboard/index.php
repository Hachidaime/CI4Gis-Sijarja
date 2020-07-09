<?= $this->extend('Layout/adminlayout') ?>

<?= $this->section('content') ?>
<div class="row text-white">
  <!-- Start Dashboard Item -->
  <div class="card bg-warning ml-3 mb-3" style="width: 18rem;">
    <!-- Start Item Content -->
    <div class="card-body">
      <!-- Item Icon -->
      <div class="card-body-icon">
        <i class="fas fa-bullhorn fa-flip-horizontal mr-2"></i>
      </div>
      <!-- Item Title -->
      <h5 class="card-title">Pengaduan Baru</h5>
      <!-- Item Value -->
      <div class="display-4">12</div>
      <!-- Item Link -->
      <a href="pengaduan.html">
        <p class="card-text text-white">
          Lihat Detail<i class="fas fa-angle-double-right ml-2"></i>
        </p>
      </a>
    </div>
    <!-- End Item Content -->
  </div>
  <!-- End Dashboard Item -->

  <!-- Start Dashboard Item -->
  <div class="card bg-success ml-3 mb-3" style="width: 18rem;">
    <!-- Start Item Content -->
    <div class="card-body">
      <!-- Item Icon -->
      <div class="card-body-icon">
        <i class="fas fa-users mr-2"></i>
      </div>
      <!-- Item Title -->
      <h5 class="card-title">Pengguna Aktif</h5>
      <!-- Item Value -->
      <div class="display-4">6</div>
      <!-- Item Link -->
      <a href="">
        <p class="card-text text-white">
          Lihat Detail<i class="fas fa-angle-double-right ml-2"></i>
        </p>
      </a>
    </div>
    <!-- End Item Content -->
  </div>
  <!-- End Dashboard Item -->

  <!-- Start Dashboard Item -->
  <div class="card bg-danger ml-3 mb-3" style="width: 18rem;">
    <!-- Start Item Content -->
    <div class="card-body">
      <!-- Item Icon -->
      <div class="card-body-icon">
        <i class="fas fa-user-edit mr-2"></i>
      </div>
      <!-- Item Title -->
      <h5 class="card-title">Log Hari Ini</h5>
      <!-- Item Value -->
      <div class="display-4">30</div>
      <!-- Item Link -->
      <a href="log.html">
        <p class="card-text text-white">
          Lihat Detail<i class="fas fa-angle-double-right ml-2"></i>
        </p>
      </a>
    </div>
    <!-- End Item Content -->
  </div>
  <!-- End Dashboard Item -->

  <!-- Start Dashboard Item -->
  <div class="card bg-primary ml-3 mb-3" style="width: 18rem;">
    <!-- Start Item Content -->
    <div class="card-body">
      <!-- Item Icon -->
      <div class="card-body-icon">
        <i class="fas fa-route mr-2"></i>
      </div>
      <!-- Item Title -->
      <h5 class="card-title">Data Jalan</h5>
      <!-- Item Value -->
      <div class="display-4">30</div>
      <!-- Item Link -->
      <a href="jalan.html">
        <p class="card-text text-white">
          Lihat Detail<i class="fas fa-angle-double-right ml-2"></i>
        </p>
      </a>
    </div>
    <!-- End Item Content -->
  </div>
  <!-- End Dashboard Container -->

  <!-- Start Dashboard item -->
  <div class="card bg-info ml-3 mb-3" style="width: 18rem;">
    <!-- Start Item Content -->
    <div class="card-body">
      <!-- Item Icon -->
      <div class="card-body-icon">
        <i class="fas fa-bookmark mr-2"></i>
      </div>
      <!-- Item Title -->
      <h5 class="card-title">Data Jembatan</h5>
      <!-- Item Value -->
      <div class="display-4">30</div>
      <!-- Item Link -->
      <a href="jembatan.html">
        <p class="card-text text-white">
          Lihat Detail<i class="fas fa-angle-double-right ml-2"></i>
        </p>
      </a>
    </div>
    <!-- End Item Content -->
  </div>
  <!-- End Dashboard Item -->

  <!-- Start Dashboard Item -->
  <div class="card bg-bdazzledBlue ml-3 mb-3" style="width: 18rem;">
    <!-- Start Item Content -->
    <div class="card-body">
      <!-- Item Icon -->
      <div class="card-body-icon">
        <i class="fas fa-images mr-2"></i>
      </div>
      <!-- Item Title -->
      <h5 class="card-title">Galeri</h5>
      <!-- Item Value -->
      <div class="display-4">40</div>
      <!-- Item Link -->
      <a href="galeri.html">
        <p class="card-text text-white">
          Lihat Detail<i class="fas fa-angle-double-right ml-2"></i>
        </p>
      </a>
    </div>
    <!-- End Item Body -->
  </div>
  <!-- End Dashboard Item -->
</div>
<?= $this->endSection() ?>