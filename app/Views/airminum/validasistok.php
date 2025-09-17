<?= view('layout/header', ['title' => 'Validasi Stok Air Minum']) ?>

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
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('airminum') ?>">Air Minum</a></li>
            <li class="breadcrumb-item active" aria-current="page">Validasi Stok</li>
          </ol>
        </nav>

        <!-- Header -->
        <h4 class="font-weight-bold mb-3">Validasi Stok Air Minum</h4>

        <!-- Tabel Stok Saat Ini -->
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Stok Saat Ini</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Air Minum</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($airminum)): ?>
                    <?php $no = 1; foreach ($airminum as $row): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= esc($row['nama_air_minum']) ?></td>
                      <td><?= esc($row['nama_jenis']) ?></td>
                      <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                      <td><?= esc($row['stok']) ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5" class="text-center">Belum ada data stok</td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Form Validasi Stok -->
      <div class="card">
        <div class="card-body">
         <form action="<?= base_url('airminum/validasiStokStore') ?>" method="post">
          <div class="mb-3">
            <label for="id_airminum" class="form-label">Pilih Air Minum</label>
            <select name="id_airminum" id="id_airminum" class="form-control" required>
              <option value="">-- Pilih Air Minum --</option>
              <?php foreach ($airminum as $a): ?>
                <option value="<?= $a['id_air_minum'] ?>">
                  <?= $a['nama_air_minum'] ?> (Stok: <?= $a['stok'] ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="stok" class="form-label">Tambah Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

      </div>
    </div>

  </div>
</div>
</div>
</div>

<?= view('layout/footer') ?>
