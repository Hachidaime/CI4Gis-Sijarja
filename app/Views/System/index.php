<?= $this->extend('Layout/adminlayout') ?>

<?= $this->section('content') ?>
<div class="row">
  <!-- Start Content Container -->
  <div class="col">
    <!-- Start Control Container -->
    <div class="mb-3 d-flex flex-column flex-sm-row justify-content-between">
      <!-- Start Left Control Container -->
      <div class="mb-3 mb-sm-0">
        <!-- Add Button -->
        <a href="<?= base_url('aplikasi/sistem/tambah') ?>" class="btn btn-success">Tambah Data Sistem</a>
      </div>
      <!-- End Left Control Containerf -->

      <!-- Start Right Control Container -->
      <div>
        <!-- Start Search Form -->
        <form method="post" class="form-inline" id="myForm">
          <!-- Search Input -->
          <div class="input-group">
            <!-- Search Box -->
            <input type="text" class="form-control border-secondary border-right-0" id="keyword" name="keyword" placeholder="Cari Nama Sistem" aria-label="Cari Nama Sistem" aria-describedby="button-addon2" />
            <!-- Input Button -->
            <div class="input-group-append">
              <button class="btn btn-outline-secondary border-left-0" type="button" id="clearBtn">
                <i class="fas fa-times"></i>
              </button>
              <button class="btn btn-outline-success" type="button" id="searchBtn">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
        <!-- End Search Form -->
      </div>
      <!-- End Right Control Container -->
    </div>
    <!-- End Control Container -->

    <!-- Start Table Container -->
    <div class="table-responsive">
      <!-- Start Main Table -->
      <table class="table table-sm table-bordered table-striped table-hover">
        <!-- Start Table Head -->
        <thead class="bg-bdazzledBlue text-white">
          <!-- Start Table Head Row -->
          <tr>
            <th class="text-center" width="50px">#</th>
            <th class="text-center" width="*">
              Nama Sistem
            </th>
            <th class="text-center">Aksi</th>
          </tr>
          <!-- End Table Head Row -->
        </thead>
        <!-- End Table Head -->

        <!-- Start Table Body -->
        <tbody id="result-data"> </tbody>
        <!-- Start Table Body -->
      </table>
      <!-- End Main Table -->
      <div class="text-center">
        <span class="spinner-border spinner-border-sm sr-only ml-2" id="loading" role="status" aria-hidden="true"></span>
      </div>
    </div>
    <!-- End Table Container -->

    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mb-3">
      <div class="mb-2 mb-sm-0">Menampilkan <span id="firstRow" class="font-weight-bold"></span> sampai <span id="lastRow" class="font-weight-bold"></span> dari <span id="count" class="font-weight-bold"></span> baris</div>
      <!-- Start Pagination -->
      <nav aria-label="Page navigation example" id="pager"></nav>
      <!-- End Pagination -->
    </div>
  </div>
  <!-- End Content Container -->
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">
  let loading = document.getElementById('loading') // ? Loading spinner
  let tableRow = /*html*/ `
  <!-- Start Table Body Row -->
  <tr>
    <td class="text-right align-middle">number</td>
    <td class="align-middle">name</td>
    <td class="text-center" width="80px">
      <a href="<?= base_url('aplikasi/sistem/slug') ?>" class="btn btn-info btn-sm">Detail</a>
    </td>
  </tr>
  <!-- End Table Body Row -->
  `

  let url = '<?= base_url('aplikasi/sistem/search') ?>' // ? Ajax Url

  let search = (url) => {
    let data = formData('myForm') // ? Form query string

    // Todo: show loading spinner
    loading.classList.remove('sr-only')

    // Todo: AJAX call
    ajaxPost(url, data, function(res) {
      // Todo: hide loading spinner
      loading.classList.add('sr-only')

      let html = [];

      let number;
      Array.prototype.forEach.call(res.list, (item, index) => {
        number = (res.perPage * (res.page - 1)) + index + 1
        let mapObj = {
          number: number,
          name: item.name,
          slug: item.slug

        };
        html.push(tableRow.replace(/number|name|slug/gi, (matched) => mapObj[matched]))
      })

      document.getElementById('lastRow').innerText = number;
      document.getElementById('firstRow').innerText = (res.perPage * (res.page - 1)) + 1
      document.getElementById('count').innerText = res.count

      document.querySelector('#result-data').innerHTML = html.join('')
      document.querySelector('#pager').innerHTML = res.pager

      let pageLink = document.querySelectorAll('.page-link')
      Array.prototype.forEach.call(pageLink, element => {
        element.addEventListener('click', function() {
          search(this.dataset.uri)
        })
      })
    })
  }

  search(url)

  document.querySelector('#keyword').addEventListener("keypress", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault()
      search(url)
    }
  })

  let searchBtn = document.querySelector('#searchBtn');
  searchBtn.addEventListener('click', () => {
    search(url)
  })

  let clearBtn = document.querySelector('#clearBtn');
  clearBtn.addEventListener('click', () => {
    document.querySelector('#keyword').value = ''
    search(url)
  })
</script>
<?= $this->endSection() ?>