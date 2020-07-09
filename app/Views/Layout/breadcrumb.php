<nav aria-label="breadcrumb">
  <!-- Start Breadcrumb Container -->
  <ol class="breadcrumb bg-white py-1">
    <!-- Start Breadcrumb Items -->
    <li class="breadcrumb-item"><a href="#"><?= session()->get('system') ?></a></li>
    <li class="breadcrumb-item active" aria-current="page">
      <?= $title ?>
    </li>
    <!-- End Breadcrumb Items -->
  </ol>
</nav>