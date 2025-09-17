<?= view('layout/header', ['title' => 'Edit Jenis Air Minum']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">

    <!-- Sidebar -->
    <?= view('layout/sidebar') ?>

    <!-- Layout Container -->
    <div class="layout-container">

      <!-- Navbar -->
      <?= view('layout/navbar') ?>

      <!-- Content -->
      <div class="container-fluid container-p-y">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mb-3">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('jenis4ir3inum') ?>">Jenis Air Minum</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>

        <!-- Header -->
        <h4 class="font-weight-bold mb-3">Edit Jenis Air Minum</h4>

        <!-- Form -->
        <div class="card">
          <div class="card-body">

            <form action="<?= base_url('jenis4ir3inum/update/' . $jenis['id_jenis_air']) ?>" method="post">
              <div class="form-group">
                <label for="nama_jenis">Nama Jenis</label>
                <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="<?= esc($jenis['nama_jenis']) ?>" required>
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?= esc($jenis['deskripsi']) ?></textarea>
              </div>

              <div class="text-right">
                <a href="<?= base_url('jenis4ir3inum') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                  <i class="feather icon-save"></i> Update
                </button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
