<?= view('layout/header', ['title' => $title]) ?>
<div class="layout-wrapper layout-2">
  <div class="layout-inner">
    <?= view('layout/sidebar') ?>
    <div class="layout-container">
      <?= view('layout/navbar') ?>
      <div class="container-fluid container-p-y">

        <h4 class="font-weight-bold mb-3"><?= $title ?></h4>
        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <a href="<?= base_url('faq/create') ?>" class="btn btn-primary mb-3">Tambah FAQ</a>

        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead class="bg-info text-white">
                <tr>
                  <th>ID</th>
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th>Kata Kunci</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($faq as $f): ?>
                <tr>
                  <td><?= $f['id_faq'] ?></td>
                  <td><?= esc($f['pertanyaan']) ?></td>
                  <td><?= esc($f['jawaban']) ?></td>
                  <td><?= esc($f['kata_kunci']) ?></td>
                  <td>
                    <a href="<?= base_url('faq/edit/'.$f['id_faq']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('faq/delete/'.$f['id_faq']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?= view('layout/footer') ?>
