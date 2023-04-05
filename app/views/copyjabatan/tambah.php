<form action='<?= BASEURL; ?>/jabatan/tambahJabatan' method="post" id="form-tambah">
  <div class="mb-3">
    <label for="a" class="form-label">Jabatan Baru</label>
    <input type="text" name="jb_baru" class="form-control" id="a" style="width:400px;" required
      <?php if (!empty($data['nama_baru'])) echo "value='".$data['nama_baru']."'"?>>
      <?php 
        if (isset($_SESSION['err'])) {
          echo "<div class='form-text text-danger'>".$_SESSION['err']."</div>";
          unset($_SESSION['err']);
        }
      ?>
  </div>
  <div class="mb-3">
    <label for="b" class="form-label">Nilai Hirarki</label>
    <input type="number" name="nilai_hirarki" class="form-control" id="b" style="width:400px" required
      <?php if(!empty($data['nilai'])) echo "value='".$data['nilai']."'" ?>>
  </div>
  <div class="d-flex justify-content-between">
    <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
    <button class="btn btn-primary" name="btnTambah" id="btnTambah" style="width:110px">Tambah</button>
  </div>          
</form>