<?= view('layout/header', ['title' => 'Tambah Pemesanan']) ?>

<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mb-3">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('pemesanan') ?>">Pemesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
          </ol>
        </nav>

        <h4 class="font-weight-bold mb-3">Form Pemesanan</h4>

        <form action="<?= base_url('pemesanan/store') ?>" method="post">
          <?= csrf_field() ?>

          <div class="card mb-4">
            <div class="card-body">
              <h5 class="mb-3">Data Pelanggan</h5>
              <div class="row">
               <div class="col-md-6">
                <label>Nama Pelanggan</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['nama_pelanggan']) ?>" readonly>
              </div>
              <div class="col-md-6">
                <label>Telepon</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['telepon']) ?>" readonly>
              </div>
              <div class="col-md-12 mt-2">
                <label>Alamat</label>
                <textarea class="form-control" rows="2" readonly><?= esc($pelanggan['alamat']) ?></textarea>
              </div>

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="mb-3">Detail Produk</h5>

            <table class="table table-bordered" id="produk-table">
              <thead>
                <tr class="bg-info text-white">
                  <th>Produk Air Minum</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                  <th style="width: 50px;"><button type="button" class="btn btn-sm btn-info add-row"><i class="fas fa-plus"></i></button></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select name="produk[]" class="form-control produk-select" required>
                      <option value="">-- Pilih Produk --</option>
                      <?php foreach ($air_minum as $am): ?>
                        <option value="<?= $am['id_air_minum'] ?>" data-harga="<?= $am['harga'] ?>">
                          <?= $am['nama_air_minum'] ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td><input type="number" class="form-control harga" readonly></td>
                  <td><input type="number" name="jumlah[]" class="form-control jumlah" value="1" min="1" required></td>
                  <td><input type="number" name="subtotal[]" class="form-control subtotal" readonly></td>
                  <td><button type="button" class="btn btn-sm btn-danger remove-row"><i class="fas fa-trash"></i></button></td>
                </tr>
              </tbody>
            </table>

            <div class="d-flex justify-content-between mt-3">
              <a href="<?= base_url('pemesanan') ?>" class="btn btn-secondary">Kembali</a>
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Pesanan</button>
            </div>

          </div>
        </div>

      </form>

    </div>
  </div>
</div>
</div>

<?= view('layout/footer') ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    function updateSubtotal(row) {
      const harga = parseFloat(row.querySelector('.harga').value) || 0;
      const jumlah = parseInt(row.querySelector('.jumlah').value) || 0;
      row.querySelector('.subtotal').value = harga * jumlah;
    }

    function bindEvents(row) {
      const select = row.querySelector('.produk-select');
      const hargaField = row.querySelector('.harga');
      const jumlahField = row.querySelector('.jumlah');

      select.addEventListener('change', function () {
        const selected = select.options[select.selectedIndex];
        const harga = selected.getAttribute('data-harga') || 0;
        hargaField.value = harga;
        updateSubtotal(row);
      });

      jumlahField.addEventListener('input', () => updateSubtotal(row));
    }

    document.querySelectorAll('#produk-table tbody tr').forEach(bindEvents);

    document.querySelector('.add-row').addEventListener('click', function () {
      const tbody = document.querySelector('#produk-table tbody');
      const row = tbody.rows[0].cloneNode(true);
      row.querySelectorAll('input').forEach(input => input.value = '');
      row.querySelector('select').selectedIndex = 0;
      tbody.appendChild(row);
      bindEvents(row);
    });

    document.querySelector('#produk-table').addEventListener('click', function (e) {
      if (e.target.closest('.remove-row')) {
        const rows = document.querySelectorAll('#produk-table tbody tr');
        if (rows.length > 1) {
          e.target.closest('tr').remove();
        }
      }
    });
  });
</script>
