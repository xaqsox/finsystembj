<?= view('layout/header', ['title' => 'Dashboard Kurir']) ?>

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
            <li class="breadcrumb-item active" aria-current="page">Kurir</li>
          </ol>
        </nav>

        <!-- Card -->
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="font-weight-bold">Selamat datang, Kurir</h4>
                <p>Anda dapat melihat daftar pengiriman yang ditugaskan, memperbarui status, serta melacak perjalanan.</p>

                <div class="mt-3">
                  <a href="<?= base_url('pengiriman') ?>" class="btn btn-info btn-sm">🚚 Daftar Pengiriman</a>
                  <a href="<?= base_url('tracking') ?>" class="btn btn-primary btn-sm">📍 Lacak Pengiriman</a>
                  <a href="<?= base_url('laporan-kurir') ?>" class="btn btn-success btn-sm">📝 Riwayat Pengiriman</a>
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
