<?= view('layout/header', ['title' => 'Tambah FAQ']) ?>
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
            <li class="breadcrumb-item active" aria-current="page">Tambah FAQ</li>
          </ol>
        </nav>

        <!-- Card -->
        <div class="card mb-4">
          <h5 class="card-header">Tambah FAQ</h5>
          <div class="card-body">
            <form action="<?= base_url('faq/store') ?>" method="post">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label class="form-label">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Jawaban</label>
                <textarea name="jawaban" class="form-control" rows="5" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('faq') ?>" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>
