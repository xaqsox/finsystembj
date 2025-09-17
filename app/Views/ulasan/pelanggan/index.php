<?= view('layout/header', ['title' => $title]) ?>
<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">
        <h4 class="font-weight-bold mb-3"><?= $title ?></h4>

        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="card">
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead class="bg-primary text-white">
                <tr>
                  <th>No</th>
                  <th>ID Pesanan</th>
                  <th>Tanggal Pesan</th>
                  <th>Status</th>
                  <th>Ulasan</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($pesanan)) : ?>
                  <?php $no = 1; foreach ($pesanan as $p) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $p['id_pemesanan'] ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($p['tanggal_pesan'])) ?></td>
                      <td><span class="badge badge-success"><?= ucfirst($p['status_pemesanan']) ?></span></td>
                      <td>
                        <?php if ($p['id_ulasan']) : ?>
                          <strong>Rating:</strong> <?= $p['rating'] ?>/5 <br>
                          <em><?= esc($p['komentar']) ?></em>
                        <?php else : ?>
                          <!-- Tombol buka modal -->
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalUlasan<?= $p['id_pemesanan'] ?>">Beri Ulasan</button>
                        <?php endif; ?>
                      </td>
                    </tr>

                    <!-- Modal Form Ulasan -->
                    <div class="modal fade" id="modalUlasan<?= $p['id_pemesanan'] ?>" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Beri Ulasan Pesanan #<?= $p['id_pemesanan'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <form method="post" action="<?= base_url('ulasan/store') ?>">
                            <div class="modal-body">
                              <input type="hidden" name="id_pemesanan" value="<?= $p['id_pemesanan'] ?>">

                              <div class="form-group">
                                <label>Rating</label>
                                <select name="rating" class="form-control" required>
                                  <option value="">-- Pilih --</option>
                                  <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                  <option value="4">⭐⭐⭐⭐ (4)</option>
                                  <option value="3">⭐⭐⭐ (3)</option>
                                  <option value="2">⭐⭐ (2)</option>
                                  <option value="1">⭐ (1)</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Komentar</label>
                                <textarea name="komentar" class="form-control" placeholder="Tulis ulasan Anda..."></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan selesai</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>
