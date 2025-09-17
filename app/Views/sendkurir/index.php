<?= view('layout/header', ['title' => $title]) ?>
<div class="layout-wrapper layout-2">
    <div class="layout-inner">
        <?= view('layout/sidebar') ?>
        <div class="layout-container">
            <?= view('layout/navbar') ?>

            <div class="container-fluid container-p-y">
                <h4 class="font-weight-bold mb-3">Daftar Pengiriman Saya</h4>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless table-striped" id="datatable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pengiriman)) : ?>
                                    <?php foreach ($pengiriman as $p) : ?>
                                        <tr>
                                            <td><?= $p['id_pengiriman'] ?></td>
                                            <td><?= $p['nama_pelanggan'] ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($p['tanggal_pesan'])) ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($p['tanggal_kirim'])) ?></td>
                                            <td>Rp <?= number_format($p['total'], 0, ',', '.') ?></td>
                                            <td><?= ucfirst($p['status_kirim']) ?></td>
                                            <td>
                                                <form action="<?= base_url('sendkurir/update/' . $p['id_pengiriman']) ?>" method="post" style="display:inline-block;">
                                                    <?= csrf_field() ?>
                                                    <select name="status_kirim" class="form-control form-control-sm" required>
                                                        <option value="">Pilih Status</option>
                                                        <option value="diambil" <?= $p['status_kirim'] == 'diambil' ? 'selected' : '' ?>>Diambil</option>
                                                        <option value="diperjalanan" <?= $p['status_kirim'] == 'diperjalanan' ? 'selected' : '' ?>>Diperjalanan</option>
                                                        <option value="diterima" <?= $p['status_kirim'] == 'diterima' ? 'selected' : '' ?>>Diterima</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada pengiriman</td>
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
