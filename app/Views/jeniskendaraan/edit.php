<?= view('layout/header', ['title' => 'Edit Jenis Kendaraan']) ?>

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
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="sidenav-icon fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('jeniskendaraan') ?>">Jenis Kendaraan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="font-weight-bold mb-0">Edit Jenis Kendaraan</h4>
        </div>

        <!-- Form dalam Card -->
        <div class="card">
          <div class="card-body">

            <form action="<?= base_url('jeniskendaraan/update/' . $jenis['id_jenis_kendaraan']) ?>" method="post">
              <?= csrf_field() ?>

              <div class="form-group">
                <label for="nama_jenis_kendaraan">Nama Jenis Kendaraan</label>
                <input type="text" name="nama_jenis_kendaraan" class="form-control" required
                       value="<?= esc(old('nama_jenis_kendaraan', $jenis['nama_jenis_kendaraan'] ?? '')) ?>">
              </div>

              <div class="form-group">
                <label for="nomor_polisi">Nomor Polisi</label>
                <textarea name="nomor_polisi" class="form-control"><?= esc(old('nomor_polisi', $jenis['nomor_polisi'] ?? '')) ?></textarea>
              </div>

              <div class="text-right">
                <a href="<?= base_url('jeniskendaraan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
ss