<?= view('layout/header', ['title' => 'Dashboard Owner']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">

    <!-- Sidebar -->
    <?= view('layout/sidebar') ?>

    <!-- Layout Container -->
    <div class="layout-container">

      <!-- Navbar -->
      <?= view('layout/navbar') ?>

      <!-- Konten -->
      <div class="container-fluid container-p-y">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Owner</li>
          </ol>
        </nav>

        <!-- Card -->
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="font-weight-bold">Selamat datang, Owner</h4>
                <p>Anda memiliki akses penuh ke semua fitur sistem.</p>

                <div class="mt-3">
                  <a href="<?= base_url('laporan') ?>" class="btn btn-success btn-sm">📊 Lihat Laporan</a>
                  <a href="<?= base_url('pengguna') ?>" class="btn btn-primary btn-sm">👤 Kelola Pengguna</a>
                  <a href="<?= base_url('setting') ?>" class="btn btn-warning btn-sm">⚙️ Pengaturan</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?= view('layout/footer') ?>
