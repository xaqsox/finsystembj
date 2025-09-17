<?= view('layout/header', ['title' => 'Manajemen Pengiriman']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mb-3">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
          </ol>
        </nav>

        <h4 class="font-weight-bold mb-3">Daftar Pengiriman</h4>

        <!-- Tabel Pengiriman -->
        <div class="card mb-4">
          <div class="card-body">
            <table class="table table-bordereless table-striped">
              <thead class="bg-primary text-white">
                <tr>
                  <th>ID</th>
                  <th>Pelanggan</th>
                  <th>Tanggal Pesan</th>
                  <th>Tanggal Kirim</th>
                  <th>Kurir</th>
                  <th>Status Kirim</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($pengiriman)) : ?>
                  <?php foreach ($pengiriman as $p) : ?>
                    <tr>
                      <td><?= $p['id_pengiriman'] ?></td>
                      <td><?= $p['nama_pelanggan'] ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($p['tanggal_pesan'])) ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($p['tanggal_kirim'])) ?></td>
                      <td><?= $p['nama_kurir'] ?></td>
                      <td><?= ucfirst($p['status_kirim']) ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <tr>
                    <td colspan="6" class="text-center">Belum ada pengiriman</td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>

        <h4 class="font-weight-bold mb-3">Pesanan Belum Dikirim</h4>

        <!-- Tabel Pesanan Belum Dikirim -->
        <div class="card">
          <div class="card-body">
            <table class="table table-bordereless table-striped">
              <thead class="bg-warning text-white">
                <tr>
                  <th>ID Pesanan</th>
                  <th>Pelanggan</th>
                  <th>Tanggal Pesan</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($belum_dikirim)) : ?>
                  <?php foreach ($belum_dikirim as $b) : ?>
                    <tr>
                      <td><?= $b['id_pemesanan'] ?></td>
                      <td><?= $b['nama_pelanggan'] ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($b['tanggal_pesan'])) ?></td>
                      <td>Rp <?= number_format($b['total'], 0, ',', '.') ?></td>
                      <td>
                        <!-- Tombol Proses Otomatis -->
                        <!-- Tombol Proses Otomatis -->
                        <a href="<?= base_url('p3ngiriman/otomatis/' . $b['id_pemesanan']) ?>" class="btn btn-success btn-sm">
                          <i class="fas fa-rocket"></i> Otomatis
                        </a>

<!-- Form Proses Manual -->
<form action="<?= base_url('p3ngiriman/manual') ?>" method="post" style="display:inline-block;">
  <?= csrf_field() ?>
  <input type="hidden" name="id_pemesanan" value="<?= $b['id_pemesanan'] ?>">
  <select name="id_kurir" class="form-control form-control-sm d-inline-block" style="width:auto;" required>
    <option value="">Pilih Kurir</option>
    <?php foreach ($kurir as $k) : ?>
      <option value="<?= $k['id_kurir'] ?>"><?= $k['nama_kurir'] ?></option>
    <?php endforeach ?>
  </select>
  <button type="submit" class="btn btn-primary btn-sm">
    <i class="fas fa-truck"></i> Manual
  </button>
</form>

</td>
</tr>
<?php endforeach ?>
<?php else : ?>
  <tr>
    <td colspan="5" class="text-center">Tidak ada pesanan yang menunggu pengiriman</td>
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

<?= view('layout/footer') ?>
