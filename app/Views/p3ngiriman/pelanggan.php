<?= view('layout/header', ['title' => $title]) ?>

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
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="sidenav-icon fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= esc($title) ?></li>
                    </ol>
                </nav>

                <!-- Header -->
                <h4 class="font-weight-bold mb-3"><?= esc($title) ?></h4>

                <!-- Card -->
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Kurir</th>
                                        <th>Status Kirim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pengiriman)) : ?>
                                        <?php foreach ($pengiriman as $i => $row) : ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_pesan'])) ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_kirim'])) ?></td>
                                                <td><?= esc($row['nama_kurir']) ?></td>
                                                <td>
                                                    <?php if ($row['status_kirim'] == 'diambil') : ?>
                                                        <span class="badge badge-warning">Diambil</span>
                                                    <?php elseif ($row['status_kirim'] == 'diperjalanan') : ?>
                                                        <span class="badge badge-info">Diperjalanan</span>
                                                    <?php elseif ($row['status_kirim'] == 'diterima') : ?>
                                                        <span class="badge badge-success">Diterima</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Belum ada pengiriman</td>
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

