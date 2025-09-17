<?= view('layout/header', ['title' => 'Tambah Air Minum']) ?>

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
            <li class="breadcrumb-item active" aria-current="page">Tambah Air Minum</li>
          </ol>
        </nav>

        <!-- Header -->
        <h4 class="font-weight-bold mb-3">Tambah Data Air Minum</h4>

        <!-- Form dalam Card -->
        <div class="card">
          <div class="card-body">

            <form action="<?= base_url('airminum/store') ?>" method="post">
              <div class="form-group">
                <label for="nama_air_minum">Nama Air Minum</label>
                <input type="text" class="form-control" id="nama_air_minum" name="nama_air_minum" required>
              </div>

              <div class="form-group">
                <label for="id_jenis_air">Jenis Air</label>
                <select name="id_jenis_air" id="id_jenis_air" class="form-control" required>
                  <option value="" disabled selected>-- Pilih Jenis --</option>
                  <?php foreach ($jenis_air as $row): ?>
                    <option value="<?= $row['id_jenis_air'] ?>"><?= esc($row['nama_jenis']) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
              </div>

              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
              </div>

              <div class="text-right">
                <a href="<?= base_url('airminum') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                  <i class="feather icon-save"></i> Simpan
                </button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
