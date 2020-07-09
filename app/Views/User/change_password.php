<?= $this->extend('Layout/adminlayout') ?>

<?= $this->section('content') ?>
<div class="row">
  <!-- Start Content Container -->
  <div class="col p-4">
    <!-- Start Form -->
    <form method="post" class="form" id="myForm">
      <!-- Start Hidden Form Input -->
      <?= csrf_field() ?>
      <input type="hidden" name="username" value="<?= session()->get('username') ?>">
      <!-- end Hidden Form Input -->

      <!-- Start Form Container -->
      <div class="row">
        <!-- Start Form Input Container -->
        <div class="col-12">
          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="old_password">Password Lama</label>
                <input type="password" class="form-control" id="old_password" name="old_password" value="" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->
          <hr>

          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" value="" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Submit Form -->
          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="button" id="update" class="btn bg-cyber-yellow text-olive-grab7">
                Simpan Perubahan
              </button>
              <span class="spinner-border spinner-border-sm sr-only ml-2" id="loading" role="status" aria-hidden="true"></span>
            </div>
          </div>
          <!-- End Submit Form -->
        </div>
      </div>
      <!-- End Form Container -->
    </form>
    <!-- End Form -->
  </div>
  <!-- End Control Container -->
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  // * Begin variable list
  let updateBtn = document.getElementById('update'); // ? Update Button
  let formControl = document.querySelectorAll('.form-control') // ? Filed input
  let url = '<?= base_url('change-password') ?>' // ? Ajax Url
  let loading = document.getElementById('loading') // ? Loading spinner

  // Todo: Update Botton click event
  updateBtn.addEventListener('click', () => {
    // Todo: get query string
    let data = formData('myForm') // ? Form query string

    // Todo: clear form validation
    formControl.forEach(element => {
      element.classList.remove('is-invalid')
      element.nextSibling.innerHTML = ''
    })

    // Todo: show loading spinner
    loading.classList.remove('sr-only')

    // Todo: AJAX call
    ajaxPost(url, data, function(res) {
      // Todo: hide loading spinner
      loading.classList.add('sr-only')

      // Todo: check callback response is success
      if (res.hasOwnProperty('success')) { // ? response success
        // Todo: show success alert
        swal('Ubah Password Berhasil', 'Password telah diubah.', 'success')
      }

      // Todo: check callback response has errors
      if (res.hasOwnProperty('validation')) { // ? has errors
        // Todo: showing error messages or fields that have errors
        for (const [key, item] of Object.entries(res.validation)) {
          document.getElementById(key).classList.add('is-invalid')
          document.getElementById(key).nextElementSibling.innerHTML = item
        }
      }
    })
  })
</script>
<?= $this->endSection() ?>