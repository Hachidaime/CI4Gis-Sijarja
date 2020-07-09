<?= $this->extend('Layout/adminlayout') ?>

<?= $this->section('content') ?>
<div class="row">
  <!-- Start Content Container -->
  <div class="col">
    <!-- Start Form -->
    <form method="post" class="form" id="myForm">
      <!-- Start Hidden Form Input -->
      <?= csrf_field() ?>
      <!-- end Hidden Form Input -->

      <!-- Start Form Container -->
      <div class="row">
        <!-- Start Profile Photo Container -->
        <div class="col-12 col-sm-4 col-md-3">
          <!-- Start Profile Photo Wrapper -->
          <div class="text-center my-4">
            <!-- Profile Photo -->
            <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="" class="rounded-circle profile-photo" />
          </div>
          <!-- End Profile Photo Wrapper -->

          <!-- Start Change Photo Profile Wrapper -->
          <div class="mb-3 text-center">
            <!-- Profile Photo Change Button -->
            <input class="btn btn-link btn-sm" type="button" id="loadFileXml" value="Ubah Foto Profil" onclick="document.getElementById('file').click();" />
            <!-- Profile Photo File Input -->
            <input type="file" style="display: none;" id="file" name="file" />
          </div>
          <!-- End Change Photo Profile Wrapper -->
        </div>
        <!-- End Profile Photo Container -->

        <!-- Start Form Input Container -->
        <div class="col-12 col-sm-8 col-md-9">
          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="level">Level Akses</label>
                <input type="text" class="form-control" readonly value="" />
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" readonly id="username" value="<?= set_value('username', $user['username']) ?>" />
              </div>
            </div>
          </div>
          <!-- End Form Input -->
          <hr>

          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="firstname">Nama</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name', $user['name']) ?>" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email', $user['email']) ?>" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Submit Form -->
          <div class="row mb-3">
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
  let url = '<?= base_url('profile') ?>' // ? Ajax Url
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
        swal('Ubah Profil Berhasil', 'Profil telah diubah.', 'success')
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