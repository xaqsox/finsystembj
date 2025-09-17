<?= view('layout/header', ['title' => 'Detail Tracking Pesanan']) ?>
<div class="layout-wrapper layout-2">
    <div class="layout-inner">
        <?= view('layout/sidebar') ?>
        <div class="layout-container">
            <?= view('layout/navbar') ?>

            <div class="container-fluid container-p-y">
                <h4 class="font-weight-bold mb-3">Detail Tracking Pesanan</h4>

                <!-- Informasi Pesanan -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Informasi Pesanan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Pesanan</th>
                                <td><?= $pesanan['id_pemesanan'] ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <td><?= date('d-m-Y H:i', strtotime($pesanan['tanggal_pesan'])) ?></td>
                            </tr>
                            <tr>
                                <th>Status Pesanan</th>
                                <td>
                                    <span class="badge badge-info">
                                        <?= ucfirst($pesanan['status_pemesanan']) ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>Rp <?= number_format($pesanan['total'], 0, ',', '.') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Riwayat Tracking -->
                <div class="card">
                    <div class="card-body">
                        <h5>Riwayat Tracking</h5>
                        <table class="table table-striped table-bordered">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Waktu</th>
                                    <th>Status Pengiriman</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tracking)) : ?>
                                    <?php foreach ($tracking as $t) : ?>
                                        <tr>
                                            <td><?= date('d-m-Y H:i', strtotime($t['waktu'])) ?></td>
                                            <td>
                                                <span class="badge 
                                                    <?php if ($t['status_kirim'] === 'diterima') : ?>
                                                        badge-success
                                                    <?php elseif ($t['status_kirim'] === 'terkendala') : ?>
                                                        badge-danger
                                                    <?php else : ?>
                                                        badge-warning
                                                    <?php endif; ?>
                                                ">
                                                    <?= ucfirst($t['status_kirim']) ?>
                                                </span>
                                            </td>
                                            <td><?= $t['keterangan'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada data tracking</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>

                        <a href="<?= base_url('trackorder') ?>" class="btn btn-secondary mt-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= view('layout/footer') ?>
