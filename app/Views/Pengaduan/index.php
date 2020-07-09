<?= $this->extend('Layout/mainlayout') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
    <form action="post">
    <div class="d-flex justify-content-center">
      <div class="pengaduan-container">
    <h1 class="mt-2">Pengaduan</h1>
    <div class="mb-5">
      <div class="form-group">
        <label for="nama">Nama*:</label>
        <input type="text" id="nama" name="nama" class="form-control">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat*:</label>
        <textarea id="alamat" name="alamat" class="form-control"></textarea>
      </div>
      </div>
      <div class="mb-5">
      <div class="form-group">
        <label for="jenis">Jenis*:</label>
        <select id="jenis" name="jenis" class="form-control">
          <option value="0">Silahkan Pilih</option>
          <option value="1">Jalan</option>
          <option value="2">Jembatan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="no_jalan">Ruas Jalan*:</label>
        <select id="no_jalan" name="no_jalan" class="form-control">
          <option value="0">Silahkan Pilih</option>
          <option value="1">Jalan 1</option>
          <option value="2">Jalan 2</option>
          <option value="3">Jalan 3</option>
          <option value="4">Jalan 4</option>
        </select>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan Pengaduan*:</label>
        <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
      </div>
    </div>
    <div class="mb-5">
      <div class="form-group">
        <label for="foto1">Foto 1*:</label>
        <input id="foto1" class="form-control-file" type="file" name="foto1">
      </div>
      <div class="form-group">
        <label for="foto2">Foto 2:</label>
        <input id="foto2" class="form-control-file" type="file" name="foto2">
      </div>
      <div class="form-group">
        <label for="foto3">Foto 3:</label>
        <input id="foto3" class="form-control-file" type="file" name="foto3">
      </div>
      <div class="form-group">
        <label for="jarak">Jarak (km)*:</label>
        <textarea id="jarak" class="form-control" name="jarak"></textarea>
      </div>
      <div>Apakah saat ini Anda berada di lokasi pengaduan?</div>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="lokasi">
        <label class="custom-control-label" for="lokasi">Ya</label>
      </div>
    </div>
    <div class="mb-5">
      <div class="form-group">
        <label for=""></label>
      </div>
      <div class="form-group">
        <input type="">
        <label for=""></label>
        <input type="">
      </div>
    </div>

      </div>
    </div>
    </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
