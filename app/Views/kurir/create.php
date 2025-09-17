<?= view('layout/header', ['title' => 'Tambah Kurir']) ?>

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
            <li class="breadcrumb-item"><a href="<?= base_url('kurir') ?>">Kurir</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
          </ol>
        </nav>

        <!-- Form Tambah -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Tambah Kurir</h4>

            <form action="<?= base_url('kurir/store') ?>" method="post">
              <div class="form-group">
                <label for="nama_kurir">Nama Kurir</label>
                <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" required>
              </div>

              <div class="form-group">
                <label for="telepon">No. Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
              </div>

              <div class="form-group">
                <label for="id_kendaraan">Jenis Kendaraan</label>
                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                  <option value="">-- Pilih Kendaraan --</option>
                  <?php foreach ($kendaraan as $row): ?>
                    <option value="<?= $row['id_jenis_kendaraan'] ?>"><?= esc($row['nama_jenis_kendaraan']) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <hr>

              <h5 class="mt-4">Akun Login Kurir</h5>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="text-right">
                <a href="<?= base_url('kurir') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Simpan
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
