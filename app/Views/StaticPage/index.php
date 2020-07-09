<?= $this->extend('Layout/mainlayout') ?>

<?= $this->section('style') ?>
<style>
.main-background {
  background: url(https://source.unsplash.com/6V2vCZ2hYtY/1024x600) no-repeat 25%;
  background-size: cover;
}

.transbox {
  background-color: #000;
  opacity: 0.6;
}

.transbox footer {
  width: 25%;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron jumbotron-fluid main-background">
        <div class="container transbox py-3">
          <h2 class="display-4 text-light">Hello World!</h2>
          <blockquote class="blockquote">
          <footer class="blockquote-footer">This is a modified jumbotron that occupies the entire horizontal space of its parent.</footer>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

