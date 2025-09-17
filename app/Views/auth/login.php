<?= view('layout/header', ['title' => 'Login']) ?>

<div class="container-fluid">
  <div class="row min-vh-100">

    <!-- Gambar Kiri -->
<div class="col-md-6 d-none d-md-block p-0">
  <div class="h-100 w-100" 
       style="background-image: url('<?= base_url('assets/img/36c88735.png') ?>'); 
              background-size: cover; 
              background-position: center;">
  </div>
</div>

    <!-- Form Login -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="w-75">

        <div class="text-center mb-4">

      
          <div class="mb-3">
            <img src="<?= base_url('assets/img/goslog.png') ?>" alt="Logo" 
            class="img-fluid" style="max-height: 70px;">
          </div>
          <h3 class="mb-1 text-warning font-weight-bold">BLOK JAMBU</h3>
          <h5 class="mb-3 text-warning">Pemesanan Air Minum Galon</h5>

         
          <p class="text-muted mb-1">
            Sistem informasi pemesanan dan pengiriman air minum berbasis web.
          </p>
          <p class="text-muted">
            Menyediakan layanan <strong>air galon isi ulang</strong>, 
            <strong>air dus botol</strong>, 
            <strong>air dus gelas</strong>, 
            hingga <strong>air galon merek</strong>.
          </p>
        </div>


        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-dark-primary alert-dismissible fade show"><?= session()->getFlashdata('error') ?></div>
      <?php endif ?>

      <form action="<?= base_url('auth/doLogin') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group mb-3">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" required autofocus>
        </div>

        <div class="form-group mb-3">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group form-check mb-3">
          <input type="checkbox" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">Ingat saya</label>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Sign In</button>
        </div>

        <div class="text-center">
          <small>Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar di sini</a></small>
        </div>

      </form>

    </div>
  </div>

</div>
</div>

<?= view('layout/footer') ?>
