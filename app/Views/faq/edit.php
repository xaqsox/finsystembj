<?= view('layout/header', ['title' => 'Edit FAQ']) ?>
<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>
      <div class="container-fluid container-p-y">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('faq') ?>">FAQ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>
          </ol>
        </nav>

        <!-- Card -->
        <div class="card mb-4">
          <h5 class="card-header">Edit FAQ</h5>
          <div class="card-body">
            <form action="<?= base_url('faq/update/'.$faq['id_faq']) ?>" method="post">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">

              <div class="mb-3">
                <label class="form-label">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" value="<?= esc($faq['pertanyaan']) ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Jawaban</label>
                <textarea name="jawaban" class="form-control" rows="5" required><?= esc($faq['jawaban']) ?></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?= base_url('faq') ?>" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>
