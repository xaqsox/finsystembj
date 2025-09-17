<?= view('layout/header', ['title' => 'Edit Jenis Pelanggan']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>
      <div class="container-fluid container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">Edit Jenis Pelanggan</h4>

        <div class="card mb-4">
          <div class="card-body">
            <form action="<?= base_url('jenispelanggan/update/' . $jenis['id_jenis_pelanggan']) ?>" method="post">
              <div class="form-group">
                <label for="nama_jenis">Nama Jenis</label>
                <input type="text" name="nama_jenis" class="form-control" value="<?= esc($jenis['nama_jenis']) ?>" required>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"><?= esc($jenis['deskripsi']) ?></textarea>
              </div>
              <button type="submit" class="btn btn-success">Update</button>
              <a href="<?= base_url('jenispelanggan') ?>" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
