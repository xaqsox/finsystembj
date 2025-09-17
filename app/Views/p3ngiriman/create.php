<?= view('layout/header', ['title' => 'Tambah Pengiriman']) ?>
<div class="container">
  <h3>Tambah Pengiriman</h3>
  <form action="<?= base_url('pengiriman/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <label>Pilih Pesanan</label>
      <select name="id_pemesanan" class="form-control" required>
        <option value="">-- Pilih Pesanan --</option>
        <?php foreach ($pemesanan as $p): ?>
          <option value="<?= $p['id_pemesanan'] ?>">#<?= $p['id_pemesanan'] ?> - Total: Rp<?= number_format($p['total'], 0, ',', '.') ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group mt-3">
      <label>Pilih Kurir</label>
      <select name="id_kurir" class="form-control" required>
        <option value="">-- Pilih Kurir --</option>
        <?php foreach ($kurir as $k): ?>
          <option value="<?= $k['id_kurir'] ?>"><?= $k['nama_kurir'] ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Kirim Pesanan</button>
  </form>
</div>
<?= view('layout/footer') ?>
