<?= view('layout/header', ['title' => $title]) ?>
<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>

      <div class="container-fluid container-p-y">
        <h4 class="font-weight-bold mb-3"><?= $title ?></h4>

        <div class="card">
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead class="bg-info text-white">
                <tr>
                  <th>No</th>
                  <th>Pelanggan</th>
                  <th>ID Pesanan</th>
                  <th>Tanggal Pesan</th>
                  <th>Rating</th>
                  <th>Komentar</th>
                  <th>Tanggal Ulasan</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($ulasan)) : ?>
                  <?php $no = 1; foreach ($ulasan as $u) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= esc($u['nama_pelanggan']) ?></td>
                      <td><?= $u['id_pemesanan'] ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($u['tanggal_pesan'])) ?></td>
                      <td>
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                          <?php if ($i <= $u['rating']) : ?>
                            ⭐
                          <?php else : ?>
                            ☆
                          <?php endif ?>
                        <?php endfor ?>
                      </td>
                      <td><?= esc($u['komentar']) ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($u['created_at'])) ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <tr>
                    <td colspan="7" class="text-center">Belum ada ulasan</td>
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
