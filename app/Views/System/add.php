<?= $this->extend('Layout/adminlayout') ?>

<?= $this->section('content') ?>
<div class="row mb-3">
  <!-- Start Content Container -->
  <div class="col">
    <!-- Start Form -->
    <form method="post" class="form" id="myForm">
      <!-- Start Hidden Form Input -->
      <?= csrf_field() ?>
      <!-- end Hidden Form Input -->

      <!-- Start Form Container -->
      <div class="row">
        <!-- Start Form Input Container -->
        <div class="col-12 col-sm-6">
          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group required">
                <label for="name">Nama Sistem</label>
                <input type="text" class="form-control" id="name" name="name" value="" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Form Input -->
          <div class="row">
            <div class="col-12">
              <div class="form-group required">
                <label for="sort">Urutan</label>
                <input type="number" class="form-control" id="sort" name="sort" min="1" value="" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <!-- End Form Input -->

          <!-- Start Submit Form -->
          <div class="row">
            <div class="col-12">
              <button type="button" id="save" class="btn bg-cyber-yellow text-olive-grab7">
                Simpan
              </button>
              <a href="<?= base_url('aplikasi/sistem') ?>" class="btn btn-light">
                Batal
              </a>
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
  let saveBtn = document.getElementById('save'); // ? Update Button
  let formControl = document.querySelectorAll('.form-control') // ? Filed input
  let url = '<?= base_url('aplikasi/sistem/tambah') ?>' // ? Ajax Url
  let loading = document.getElementById('loading') // ? Loading spinner

  // Todo: Update Botton click event
  saveBtn.addEventListener('click', () => {
    // Todo: get query string
    let data = formData('myForm') // ? Form query string
    let name = document.getElementById('name').value;

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
        swal('Tambah Sistem Berhasil', `Sistem [${name}] berhasil ditambahkan.`, 'success')
          .then(() => {
            document.location = '<?= base_url('aplikasi/sistem/') ?>'
          })
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