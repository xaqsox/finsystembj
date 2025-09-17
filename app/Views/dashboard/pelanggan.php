<?= view('layout/header', ['title' => 'Dashboard Pelanggan']) ?>

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
            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
          </ol>
        </nav>

        <!-- Card Dashboard -->
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="font-weight-bold">Selamat datang, Pelanggan</h4>
                <p>Anda dapat melakukan pemesanan air minum, melihat status pesanan, serta melacak pengiriman.</p>

                <div class="mt-3">
                  <a href="<?= base_url('pemesanan/create') ?>" class="btn btn-primary btn-sm">+ Buat Pemesanan</a>
                  <a href="<?= base_url('tracking') ?>" class="btn btn-info btn-sm">Lacak Pesanan</a>
                  <a href="<?= base_url('laporan') ?>" class="btn btn-success btn-sm">Riwayat Pesanan</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- History Pemesanan -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Pesananku</h5>
                <a href="<?= base_url('laporan') ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Pemesanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Total</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($history)): ?>
                        <?php foreach ($history as $row): ?>
                          <tr>
                            <td><?= esc($row['id_pemesanan']) ?></td>
                            <td><?= esc(date('d-m-Y H:i', strtotime($row['tanggal_pesan']))) ?></td>
                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                            <td>
                              <?php if ($row['status_pemesanan'] == 'diproses'): ?>
                                <span class="badge bg-warning">Diproses</span>
                              <?php elseif ($row['status_pemesanan'] == 'dikirim'): ?>
                                <span class="badge bg-info">Dikirim</span>
                              <?php elseif ($row['status_pemesanan'] == 'selesai'): ?>
                                <span class="badge bg-success">Selesai</span>
                              <?php else: ?>
                                <span class="badge bg-secondary">Pending</span>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="4" class="text-center">Belum ada pemesanan</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
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
