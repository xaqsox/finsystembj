<?= view('layout/header', ['title' => 'Register']) ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="w-100" style="max-width: 420px;">

    <div class="text-center mb-4">
      <i class="fas fa-droplet fa-3x text-primary"></i>
    </div>

    <div class="card shadow-sm p-4">
      <h5 class="text-center mb-3">Daftar Sebagai Pelanggan</h5>

      
      <form action="<?= base_url('auth/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group mb-3">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="form-group mb-3">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <div class="form-group mb-3">
          <label for="confirm_password">Konfirmasi Password</label>
          <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password" required>
        </div>

        <div class="form-group mb-3">
          <label for="nama_pelanggan">Nama Lengkap</label>
          <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" required>
        </div>

        <div class="form-group mb-3">
          <label for="telepon">No. Telepon</label>
          <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
        </div>

        <div class="form-group mb-3">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat lengkap" required></textarea>
        </div>

        <div class="form-group mb-4">
          <label for="id_jenis_pelanggan">Jenis Pelanggan</label>
          <select name="id_jenis_pelanggan" class="form-control" required>
            <option value="">-- Pilih Jenis --</option>
            <?php foreach ($jenis as $row): ?>
              <option value="<?= $row['id_jenis_pelanggan'] ?>"><?= esc($row['nama_jenis']) ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-warning text-white fw-bold">SIGN UP</button>
        </div>
      </form>

      <div class="text-center mt-3 small">
        Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-warning fw-bold">Sign In</a>
      </div>
    </div>

    <div class="text-muted small mt-4 text-center">
      Dengan klik "SIGN UP", Anda menyetujui <a href="#" class="text-warning">syarat dan ketentuan</a> kami.
    </div>

  </div>
</div>

<?= view('layout/footer') ?>
