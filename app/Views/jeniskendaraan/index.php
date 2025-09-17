<?= view('layout/header', ['title' => 'Jenis Kendaraan']) ?>

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
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="sidenav-icon fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Jenis Kendaraan</li>
          </ol>
        </nav>

        <!-- Header & Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="font-weight-bold mb-0">Data Jenis Kendaraan</h4>
          <a href="<?= base_url('jeniskendaraan/create') ?>" class="btn btn-primary">
            <i class="feather icon-plus"></i> Tambah Jenis
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
                    <th>Jenis</th>
                    <th>Nomor Polisi</th>                    
                    <th class="text-center" style="width: 150px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($jenis)): ?>
                    <?php foreach ($jenis as $i => $row): ?>
                      <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($row['nama_jenis_kendaraan']) ?></td>
                        <td><?= esc($row['nomor_polisi']) ?></td>
                        <td class="text-center">
                          <a href="<?= base_url('jeniskendaraan/edit/' . $row['id_jenis_kendaraan']) ?>" class="btn btn-sm btn-warning">
                            <i class="feather icon-edit"></i>
                          </a>
                          <a href="<?= base_url('jeniskendaraan/delete/' . $row['id_jenis_kendaraan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="feather icon-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5" class="text-center text-muted">Belum ada data.</td>
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
