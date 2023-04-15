<div class="container w-50">
  <?php 
    if (isset($_SESSION['success'])) { 
      echo "<div class='alert alert-success' role='alert'>".$_SESSION['success']."</div>";
      unset($_SESSION['success']);
    } else if (isset($_SESSION['error'])) {
      echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
      unset($_SESSION['error']);
    }  
  ?>
  <!-- Button trigger modal -->
  <div class="d-flex justify-content-between">
    <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
    <div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
      <i class="bi bi-plus-lg"></i>
      </button>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahModal">
      <i class="bi bi-arrow-left-right"></i>
      </button>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
      <i class="bi bi-x-lg"></i>
      </button>
    </div>
    
  </div>
  <br>
  <table class="table table-bordered border-dark">
    <thead>
      <tr class="bg-secondary text-white text-center">
        <th width="60px">Hirarki</th>
        <th>Jabatan</th>
      </tr>
    </thead>        
    <tbody>
      <?php foreach($data['jabatan'] as $jb) : ?>
        <tr>
          <td class='text-center'><?= $jb['hirarki_jabatan'] ?></td>
          <td><?= $jb['nama_jabatan'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>

<?php
  require_once 'tambah.php';
  require_once 'ubah.php';
  require_once 'hapus.php';
?>



