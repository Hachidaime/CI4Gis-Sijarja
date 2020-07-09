<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dashboard | Sijarja</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/all.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
</head>

<body>
  <!-- Start Navbar -->
  <?= $this->include('Layout/admin/navbar') ?>
  <!-- End Navbar -->

  <!-- Start Wrapper -->
  <div class="wrapper d-flex">
    <!-- Start Side Menu -->
    <?= $this->include('Layout/admin/sidemenu') ?>
    <!-- End Side Menu -->

    <!-- Start Content -->
    <div class="content">
      <!-- Start Main -->
      <main>
        <!-- Start Breadcrumb -->
        <?= $this->include('Layout/breadcrumb') ?>
        <!-- End Breadcrumb -->

        <!-- Start Main Container -->
        <div class="container-fluid">

          <!-- Start Content Container -->
          <div class="row">
            <!-- Start Content Wrapper -->
            <div class="col mx-3 mb-3 bg-white">

              <!-- Page Title -->
              <h3 class="mt-3">
                <!-- Title Icon -->
                <i class="fas fa-tachometer-alt icon "></i>
                <!-- Title Text -->
                <span><?= $title ?></span>
              </h3>
              <hr />

              <!-- Alert  -->
              <?php if (session()->get('success')) : ?>
                <div class="row">
                  <div class="col p-0">
                    <div class="alert alert-success" role="alert">
                      <?= session()->get('success') ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>

              <?php endif; ?>

              <!-- Start Page Container -->
              <?= $this->renderSection('content') ?>
              <!-- End Page Container -->

            </div>
            <!-- End Content Wrapper -->
          </div>
          <!-- End Content Container -->
        </div>
        <!-- End Main Container -->
      </main>
      <!-- End Main -->
    </div>
    <!-- End Content -->
  </div>
  <!-- End Wrapper -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Custom Script -->
  <script>
    let baseUrl = '<?= base_url() ?>'
  </script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <script src="<?= base_url('assets/js/admin/script.js') ?>"></script>
  <?= $this->renderSection('script') ?>
</body>

</html>