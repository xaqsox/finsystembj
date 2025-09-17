<?= view('layout/header', ['title' => 'Riwayat Pemesanan']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mb-3">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
          </ol>
        </nav>

        <h4 class="font-weight-bold mb-3">Riwayat Pemesanan Anda</h4>

        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="datatable">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($pemesanan)): ?>
                    <?php foreach ($pemesanan as $i => $p): ?>
                      <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= date('d M Y H:i', strtotime($p['tanggal_pesan'])) ?></td>
                        <td>Rp <?= number_format($p['total'], 0, ',', '.') ?></td>
                        
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="3" class="text-center text-muted">Belum ada pemesanan.</td>
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
