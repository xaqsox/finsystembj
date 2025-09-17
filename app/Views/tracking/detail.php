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
            <table class="table table-bordered">
              <thead class="bg-primary text-white">
                <tr>
                  <th>Waktu</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tracking as $row): ?>
                  <tr>
                    <td><?= date('d/m/Y H:i', strtotime($row['waktu'])) ?></td>
                    <td><strong><?= strtoupper($row['status']) ?></strong></td>
                    <td><?= $row['keterangan'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <a href="<?= base_url('tracking') ?>" class="btn btn-secondary mt-3">Kembali</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>
