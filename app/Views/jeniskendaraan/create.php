<?= view('layout/header', ['title' => 'Tambah Jenis Kendaraan']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>
      <div class="container-fluid container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">Tambah Jenis Kendaraan</h4>

        <div class="card mb-4">
          <div class="card-body">
            <form action="<?= base_url('jeniskendaraan/store') ?>" method="post">
              <div class="form-group">
                <label for="nama_jenis_kendaraan">Nama Jenis Kendaraan</label>
                <input type="text" name="nama_jenis_kendaraan" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="nomor_polisi">Nomor Polisi</label>
                <input type="text" name="nomor_polisi" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('jeniskendaraan') ?>" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
