<?= view('layout/header', ['title' => 'Data Pelanggan']) ?>

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
            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
          </ol>
        </nav>

        <!-- Header & Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="font-weight-bold mb-0">Data Pelanggan</h4>
          <a href="<?= base_url('pelanggan/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pelanggan
          </a>
        </div>

        <!-- Tabel dalam Card -->
        <div class="card">
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-borderless table-hover" id="datatable">
                <thead>
                  <tr class="bg-warning text-white">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jenis Pelanggan</th>
                    <th class="text-center" style="width: 150px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($pelanggan)): ?>
                    <?php foreach ($pelanggan as $i => $row): ?>
                      <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($row['nama_pelanggan']) ?></td>
                        <td><?= esc($row['alamat']) ?></td>
                        <td><?= esc($row['telepon']) ?></td>
                        <td><?= esc($row['nama_jenis']) ?></td>
                        <td class="text-center">
                          <a href="<?= base_url('pelanggan/edit/' . $row['id_pelanggan']) ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="<?= base_url('pelanggan/delete/' . $row['id_pelanggan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6" class="text-center text-muted">Belum ada data pelanggan.</td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?= view('layout/footer') ?>
