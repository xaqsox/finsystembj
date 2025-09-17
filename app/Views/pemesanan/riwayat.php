<?= view('layout/header', ['title' => 'Riwayat Pesanan']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">
        <h4 class="font-weight-bold mb-3">Riwayat Pemesanan Saya</h4>

        <?php if (!empty($pemesanan)): ?>
          <?php foreach ($pemesanan as $pesanan): ?>
            <div class="card mb-4">
              <div class="card-header bg-info text-white">
                <strong>Pemesanan:</strong> <?= date('d M Y H:i', strtotime($pesanan['tanggal_pesan'])) ?>
                <span class="float-right"><strong>Total:</strong> Rp <?= number_format($pesanan['total'], 0, ',', '.') ?></span>
              </div>
              <div class="card-body p-0">
                <table class="table mb-0">
                  <thead>
                    <tr class="bg-light">
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($detail[$pesanan['id_pemesanan']] as $item): ?>
                      <tr>
                        <td><?= esc($item['nama_air_minum']) ?></td>
                        <td>Rp <?= number_format($item['subtotal'] / $item['jumlah'], 0, ',', '.') ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                        <td>
                          <span class="badge bg-<?= $pesanan['status_pemesanan'] == 'pending' ? 'warning' : ($pesanan['status_pemesanan'] == 'diproses' ? 'info' : 'success') ?>">
                            <?= ucfirst($pesanan['status_pemesanan']) ?>
                          </span>
                        </td>

                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php endforeach ?>
        <?php else: ?>
          <div class="alert alert-info">Belum ada pesanan.</div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
