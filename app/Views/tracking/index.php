<?= view('layout/header', ['title' => $title]) ?>
<div class="layout-wrapper layout-2">
    <div class="layout-inner">
        <?= view('layout/sidebar') ?>
        <div class="layout-container">
            <?= view('layout/navbar') ?>

            <div class="container-fluid container-p-y">
                <h4 class="font-weight-bold mb-3">Tracking Pesanan</h4>

                <?php if (!empty($pesanan)) : ?>
                    <?php foreach ($pesanan as $p) : ?>
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                Pesanan #<?= $p['id_pemesanan'] ?> - <?= date('d-m-Y H:i', strtotime($p['tanggal_pesan'])) ?>
                                <span class="badge badge-warning float-right"><?= ucfirst($p['status_pemesanan']) ?></span>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($tracking[$p['id_pemesanan']])) : ?>
                                    <ul class="list-group">
                                        <?php foreach ($tracking[$p['id_pemesanan']] as $t) : ?>
                                            <li class="list-group-item">
                                                <strong><?= date('d-m-Y H:i', strtotime($t['waktu'])) ?>:</strong>
                                                <?= esc($t['keterangan']) ?>
                                                <span class="badge badge-info float-right"><?= ucfirst($t['status']) ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p class="text-muted">Belum ada update pengiriman.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Tidak ada pesanan untuk ditampilkan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= view('layout/footer') ?>
