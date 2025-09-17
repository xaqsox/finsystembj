<?= view('layout/header', ['title' => 'Laporan Pemesanan']) ?>

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
            <li class="breadcrumb-item active" aria-current="page">Laporan Pemesanan</li>
          </ol>
        </nav>

        <!-- Header & Filter -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="font-weight-bold mb-0">Laporan Pemesanan</h4>
        </div>

        <!-- Card -->
        <div class="card">
          <div class="card-body">

            <!-- Form Filter -->
            <form method="get" action="<?= base_url('laporan') ?>" class="row g-3 mb-4">
              <div class="col-md-4">
                <label for="start_date" class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                       value="<?= esc($start_date ?? '') ?>">
              </div>
              <div class="col-md-4">
                <label for="end_date" class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control" id="end_date" name="end_date"
                       value="<?= esc($end_date ?? '') ?>">
              </div>
              <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-warning me-2">
                  <i class="feather icon-filter"></i> Filter
                </button>
                <a href="<?= base_url('laporan') ?>" class="btn btn-secondary me-2">
                  <i class="feather icon-refresh-cw"></i> Reset
                </a>
                <a href="<?= base_url('laporan/cetak_pdf?start_date=' . ($start_date ?? '') . '&end_date=' . ($end_date ?? '')) ?>"
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
                    <th>Tanggal Pesan</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($laporan)): ?>
                    <?php foreach ($laporan as $i => $row): ?>
                      <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc(date('d-m-Y H:i', strtotime($row['tanggal_pesan']))) ?></td>
                        <td>ID: <?= esc($row['id_pelanggan']) ?></td>
                        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
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
