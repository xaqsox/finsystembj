<?php $role = session('role_inti'); ?>

<!-- Sidebar Empire -->
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">

  <!-- Brand -->
  <div class="app-brand demo">
    <span class="app-brand-logo demo">
      <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="img-fluid">
    </span>
    <a href="<?= base_url('dashboard') ?>" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Blok Jambu</a>
    <a href="javascript:;" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
      <i class="fas fa-bars align-middle"></i>
    </a>
  </div>
  <div class="sidenav-divider mt-0"></div>

  <!-- Menu -->
  <ul class="sidenav-inner py-1">

    <!-- Dashboard -->
    <li class="sidenav-item">
      <a href="<?= base_url('dashboard') ?>" class="sidenav-link">
        <i class="sidenav-icon fas fa-home"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <?php if (in_array($role, ['owner', 'admin'])): ?>
      <li class="sidenav-divider mb-1"></li>
      <li class="sidenav-header small font-weight-semibold">Data Master</li>

<!-- Pelanggan -->
<li class="sidenav-item">
  <a href="<?= base_url('jenispelanggan') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-user-tag"></i>
    <div>Jenis Pelanggan</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('pelanggan') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-users"></i>
    <div>Pelanggan</div>
  </a>
</li>

<!-- Kurir -->
<li class="sidenav-item">
  <a href="<?= base_url('jeniskendaraan') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-truck"></i>
    <div>Jenis Kendaraan</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('kurir') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-shipping-fast"></i>
    <div>Kurir</div>
  </a>
</li>

<!-- Air Minum -->
<li class="sidenav-item">
  <a href="<?= base_url('jenis4ir3inum') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-tint"></i>
    <div>Jenis Air Minum</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('airminum') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-glass-water"></i>
    <div>Air Minum</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('airminum/validasistok') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-glass-water"></i>
    <div>Stok</div>
  </a>
</li>


<li class="sidenav-header small font-weight-semibold">Transaksi</li>

<!-- Transaksi -->
<li class="sidenav-item">
  <a href="<?= base_url('adminorder') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-shopping-basket"></i>
    <div>Pemesanan</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('p3ngiriman') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-truck-moving"></i>
    <div>Pengiriman</div>
  </a>
</li>

<li class="sidenav-header small font-weight-semibold">Reports</li>
<li class="sidenav-item">
  <a href="<?= base_url('laporan') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-truck-moving"></i>
    <div>Pemesanan</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('laporan/pengiriman') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-truck-moving"></i>
    <div>Pengiriman</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('faq') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-truck-moving"></i>
    <div>FAQ</div>
  </a>
</li>
<li class="sidenav-item">
  <a href="<?= base_url('ulasan/admin') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-truck-moving"></i>
    <div>Ulasan</div>
  </a>
</li>

<?php endif; ?>

<!-- Owner Only -->
<?php if ($role === 'owner'): ?>
  <li class="sidenav-item">
    <a href="<?= base_url('manage-role') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-user-shield"></i>
      <div>Kelola Role</div>
    </a>
  </li>
<?php endif; ?>

<!-- Pelanggan -->
<?php if ($role === 'pelanggan'): ?>
  <li class="sidenav-divider mb-1"></li>
  <li class="sidenav-header small font-weight-semibold">Pelanggan</li>

  <li class="sidenav-item">
    <a href="<?= base_url('pemesanan/create') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-shopping-cart"></i>
      <div>Pemesanan</div>
    </a>
  </li>
  <li class="sidenav-item">
    <a href="<?= base_url('p3ngiriman/pelanggan') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-truck"></i>
      <div>Pengiriman Saya</div>
    </a>
  </li>

  <li class="sidenav-item">
    <a href="<?= base_url('pemesanan/riwayat') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-shopping-cart"></i>
      <div>History</div>
    </a>
  </li>
  <li class="sidenav-item">
    <a href="<?= base_url('trackorder') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-map-marker-alt"></i>
      <div>Tracking</div>
    </a>
  </li>
  <li class="sidenav-item">
    <a href="<?= base_url('ulasan/pelanggan') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-map-marker-alt"></i>
      <div>Ulasan</div>
    </a>
  </li>
  <li class="sidenav-item">
    <a href="<?= base_url('chatbot') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-map-marker-alt"></i>
      <div>FAQ</div>
    </a>
  </li>
<?php endif; ?>


<!-- Kurir -->
<?php if ($role === 'kurir'): ?>
  <li class="sidenav-divider mb-1"></li>
  <li class="sidenav-header small font-weight-semibold">Kurir</li>

  <li class="sidenav-item">
    <a href="<?= base_url('sendkurir') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-box"></i>
      <div>Pengiriman</div>
    </a>
  </li>
  <li class="sidenav-item">
    <a href="<?= base_url('profilekurir/edit ') ?>" class="sidenav-link">
      <i class="sidenav-icon fas fa-search-location"></i>
      <div>Ubah Profile</div>
    </a>
  </li>
<?php endif; ?>

<!-- Logout -->
<li class="sidenav-divider mb-1"></li>
<li class="sidenav-header small font-weight-semibold">Utility</li>

<li class="sidenav-item">
  <a href="<?= base_url('auth/logout') ?>" class="sidenav-link">
    <i class="sidenav-icon fas fa-sign-out-alt"></i>
    <div>Logout</div>
  </a>
</li>

</ul>
</div>
