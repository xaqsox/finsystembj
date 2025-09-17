<?= view('layout/header', ['title' => 'Tracking Pesanan']) ?>
<div class="layout-wrapper layout-2">
    <div class="layout-inner">
        <?= view('layout/sidebar') ?>
        <div class="layout-container">
            <?= view('layout/navbar') ?>

            <div class="container-fluid container-p-y">
                <h4 class="font-weight-bold mb-3">Daftar Pesanan Saya</h4>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pesanan)) : ?>
                                    <?php foreach ($pesanan as $p) : ?>
                                        <tr>
                                            <td><?= $p['id_pemesanan'] ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($p['tanggal_pesan'])) ?></td>
                                            <td><?= ucfirst($p['status_pemesanan']) ?></td>
                                            <td>Rp <?= number_format($p['total'], 0, ',', '.') ?></td>
                                            <td>
                                                <a href="<?= base_url('trackorder/detail/' . $p['id_pemesanan']) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-map-marker-alt"></i> Lihat Tracking
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada pesanan</td>
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
<?= view('layout/footer') ?>
