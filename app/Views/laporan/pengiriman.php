<?= view('layout/header', ['title' => 'Laporan Pengiriman']) ?>

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
            <li class="breadcrumb-item">
              <a href="<?= base_url('dashboard') ?>"><i class="sidenav-icon fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Pengiriman</li>
          </ol>
        </nav>

        <!-- Header & Filter -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="font-weight-bold mb-0">Laporan Pengiriman</h4>
        </div>

        <!-- Card -->
        <div class="card">
          <div class="card-body">

            <!-- Form Filter -->
            <form method="get" action="<?= base_url('laporan/pengiriman') ?>" class="row g-3 mb-4">
              <div class="col-md-4">
                <label for="tanggal_awal" class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                       value="<?= esc($tanggal_awal ?? '') ?>">
              </div>
              <div class="col-md-4">
                <label for="tanggal_akhir" class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                       value="<?= esc($tanggal_akhir ?? '') ?>">
              </div>
              <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-warning me-2">
                  <i class="feather icon-filter"></i> Filter
                </button>
                <a href="<?= base_url('laporan/pengiriman') ?>" class="btn btn-secondary me-2">
                  <i class="feather icon-refresh-cw"></i> Reset
                </a>
                <a href="<?= base_url('laporan/pdfkirim?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '')) ?>"
                   target="_blank" 
                   class="btn btn-danger">
                  <i class="feather icon-printer"></i> Cetak PDF
                </a>
              </div>
            </form>

            <!-- Table -->
            <div class="table-responsive">
              <table class="table table-borderless table-hover" id="datatable">
                <thead>
                  <tr class="bg-warning text-white">
                    <th>#</th>
                    <th>Tanggal Kirim</th>
                    <th>Kode Pemesanan</th>
                    <th>Kurir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($pengiriman)): ?>
                    <?php foreach ($pengiriman as $i => $row): ?>
                      <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc(date('d-m-Y H:i', strtotime($row['tanggal_kirim']))) ?></td>
                        <td><?= esc($row['id_pemesanan']) ?></td>
                        <td><?= esc($row['nama_kurir']) ?></td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<?= view('layout/footer') ?>
