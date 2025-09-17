<?= view('layout/header', ['title' => 'Edit Pelanggan']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mb-3">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Edit Pelanggan</li>
          </ol>
        </nav>

        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('pelanggan/update/' . $pelanggan['id_pelanggan']) ?>" method="post">

              <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" value="<?= esc($pelanggan['nama_pelanggan']) ?>" required>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required><?= esc($pelanggan['alamat']) ?></textarea>
              </div>

              <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?= esc($pelanggan['telepon']) ?>" required>
              </div>

              <div class="form-group">
                <label>Jenis Pelanggan</label>
                <select name="id_jenis_pelanggan" class="form-control" required>
                  <?php foreach ($jenis as $j): ?>
                    <option value="<?= $j['id_jenis_pelanggan'] ?>" <?= $pelanggan['id_jenis_pelanggan'] == $j['id_jenis_pelanggan'] ? 'selected' : '' ?>>
                      <?= esc($j['nama_jenis']) ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui
              </button>
              <a href="<?= base_url('pelanggan') ?>" class="btn btn-secondary">Kembali</a>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
