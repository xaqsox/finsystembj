<?= view('layout/header', ['title' => 'Daftar Pesanan']) ?>

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
              <a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
          </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="font-weight-bold mb-0">Daftar Pesanan Pelanggan</h4>
        </div>

        <!-- Flashdata -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>

        <!-- Table -->
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordereless id="datatable">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pesan</th>
                    <th>Total</th>
             
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($pemesanan)): ?>
                    <?php $no = 1; foreach ($pemesanan as $pesanan): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($pesanan['nama_pelanggan']) ?></td>
                        <td><?= esc($pesanan['tanggal_pesan']) ?></td>
                        <td>Rp <?= number_format($pesanan['total'], 0, ',', '.') ?></td>
                        
                        <td class="text-center">
                          <?php if ($pesanan['status_pemesanan'] === 'pending'): ?>
                            <a href="<?= base_url('adminorder/ubah-status/' . $pesanan['id_pemesanan']) ?>" class="btn btn-sm btn-success">
                              <i class="fas fa-sync-alt"></i> Set Diproses
                            </a>
                          <?php else: ?>
                            <span class="text-muted">Sudah Diproses</span>
                          <?php endif ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6" class="text-center text-muted">Belum ada data pesanan.</td>
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
