<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $this->renderSection('content_header') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= route_to('dashboard') ?>">Home</a></li>
          <li class="breadcrumb-item active"><?= $this->renderSection('link') ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <?= $this->renderSection('content') ?>
</section>

