<?= view('layout/header', ['title' => 'Profil Saya']) ?>
<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>
      <div class="container-fluid container-p-y">

        <h4 class="font-weight-bold mb-3">Profil Saya</h4>
        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="/profile/update" method="post">
          <div class="card p-4">
            <div class="mb-3">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_pelanggan" class="form-control" value="<?= esc($pelanggan['nama_pelanggan']) ?>">
            </div>
            <div class="mb-3">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control"><?= esc($pelanggan['alamat']) ?></textarea>
            </div>
            <div class="mb-3">
              <label>Telepon</label>
              <input type="text" name="telepon" class="form-control" value="<?= esc($pelanggan['telepon']) ?>">
            </div>
            <div class="mb-3">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?= esc($login['username']) ?>">
            </div>
            <div class="mb-3">
              <label>Password Baru (kosongkan jika tidak ingin ganti)</label>
              <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>
