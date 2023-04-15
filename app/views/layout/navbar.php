<nav class="navbar bg-body-tertiary">
  <div class="container-fluid d-flex justify-content-between">
    <button class="btn btn-dark ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="offcanvasDark">
      <i class="bi bi-list"></i>
    </button>
    <h3><?= $data['nav']; ?></h3>
    <a class="nav-link me-3 fw-semibold" href="<?= BASEURL; ?>">Logout</a> 
  </div>
</nav> <br>


<div class="offcanvas offcanvas-start offcanvas-size-sm text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
  <div class="offcanvas-header bg-black">
    <h5 class="offcanvas-title" id="offcanvasDarkLabel">Company</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav justify-content-start flex-grow-1">
      <li class="nav-item">
        <a class="nav-link hv" href="<?= BASEURL; ?>/beranda">Beranda</a>
      </li>        
      <li class="nav-item">
        <a class="nav-link hv" href="<?= BASEURL; ?>/karyawan">Data Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link hv" href="<?= BASEURL; ?>/izin">Izin Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link hv" href="<?= BASEURL; ?>/harian">Absensi Harian</a>
      </li>            
      <li class="nav-item">
        <a class="nav-link hv" href="<?= BASEURL; ?>/bulanan">Rekap Bulanan</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link hv" href="<?= BASEURL; ?>/scan">Scan Kartu</a>
      </li>          
    </ul>
  </div>
</div>