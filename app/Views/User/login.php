<?= $this->extend('Layout/mainlayout') ?>

<?= $this->section('content') ?>
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-7 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-5">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 mb-4">Admin Login</h1>
                </div>
                <form method="post" id="myForm">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" autofocus>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="invalid-feedback"></div>
                  </div>
                  <button type="button" class="btn btn-primary btn-user btn-block" id="login">
                    <span>Login</span>
                    <span class="spinner-grow spinner-grow-sm sr-only" id="loading" role="status" aria-hidden="true"></span>
                  </button>
                  <hr />
                  <div class="text-center">
                    <a href="<?= base_url('') ?>">Kembali ke Beranda</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  // * Begin variable list
  let loginBtn = document.getElementById('login'); // ? Login Button
  let formControl = document.querySelectorAll('.form-control') // ? Filed input
  let url = '<?= base_url('login') ?>' // ? Ajax Url
  let loading = document.getElementById('loading') // ? Loading spinner

  Array.prototype.forEach.call(formControl, (element) => {
    element.addEventListener("keypress", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault()
        loginBtn.click()
      }
    })
  })

  // Todo: login Botton click event
  loginBtn.addEventListener('click', () => {
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
      if (res.hasOwnProperty('success')) {
        // Todo: redirect to default route
        window.location = '<?= base_url('session/website') ?>'
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