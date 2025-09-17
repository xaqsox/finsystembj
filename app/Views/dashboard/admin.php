<?= view('layout/header', ['title' => 'Dashboard']) ?>

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

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>

        <!-- Welcome -->
        <h4 class="font-weight-bold py-3">Selamat Datang, Admin</h4>
        <p class="mb-4">Anda memiliki akses penuh untuk mengelola sistem.</p>

        <!-- Cards Statistik -->
        <div class="row">
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
              <div class="card-body text-center">
                <h5 class="card-title mb-2">Pelanggan</h5>
                <h3 class="font-weight-bold"><?= esc($totalPelanggan ?? 0) ?></h3>
                <a href="<?= base_url('pelanggan') ?>" class="btn btn-sm btn-primary mt-2">Kelola</a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
              <div class="card-body text-center">
                <h5 class="card-title mb-2">Kurir</h5>
                <h3 class="font-weight-bold"><?= esc($totalKurir ?? 0) ?></h3>
                <a href="<?= base_url('kurir') ?>" class="btn btn-sm btn-primary mt-2">Kelola</a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
              <div class="card-body text-center">
                <h5 class="card-title mb-2">Pesanan</h5>
                <h3 class="font-weight-bold"><?= esc($totalPesanan ?? 0) ?></h3>
                <a href="<?= base_url('pemesanan') ?>" class="btn btn-sm btn-primary mt-2">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
              <div class="card-body text-center">
                <h5 class="card-title mb-2">Pengiriman</h5>
                <h3 class="font-weight-bold"><?= esc($totalPengiriman ?? 0) ?></h3>
                <a href="<?= base_url('pengiriman') ?>" class="btn btn-sm btn-primary mt-2">Lacak</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Section tambahan -->
        <div class="card mt-4 shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title">Informasi Sistem</h5>
            <p class="mb-0">
              Sistem informasi pemesanan & pengiriman air minum berbasis web.  
              Anda dapat mengelola <strong>pelanggan</strong>, <strong>kurir</strong>, <strong>pesanan</strong>, hingga <strong>pengiriman</strong> secara terintegrasi.
            </p>
          </div>
        </div>

      </div>
      <!-- /Konten -->

    </div>
    <!-- /Layout Container -->

  </div>
</div>

<?= view('layout/footer') ?>
