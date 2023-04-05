<form action="<?= BASEURL; ?>/jabatan/ubahJabatan" style="display:none;" method="post" id="form-ubah">
  <div class="mb-3">
    <label class="form-label">Jabatan Lama</label>
    <select class="form-select" name="jb_lama" aria-label="Default select example" style="width:400px">
      <?php 
        foreach ($data['jabatan'] as $jabatan){          
          $jb = $jabatan['nama_jabatan'];
          if ($data['nama_lama'] == $jb){
            echo "<option value='$jb' selected>$jb</option>";
          } else {
            echo "<option value='$jb'>$jb</option>";
          }          
        }
      ?>
    </select>
  </div>    
  <div class="mb-3">
    <label for="c" class="form-label">Jabatan Baru</label>
    <input type="text" name="jb_baru" class="form-control" id="c" style="width:400px;" required
    <?php if (!empty($data['nama_baru'])) echo "value='".$data['nama_baru']."'"?>>
    <?php 
      if (isset($_SESSION['err'])) {
        echo "<div class='form-text text-danger'>".$_SESSION['err']."</div>";
        unset($_SESSION['err']);
      }
    ?>
  </div>
  <div class="mb-3">
    <label for="d" class="form-label">Nilai Hirarki</label>
    <input type="number" name="nilai" class="form-control" id="d" style="width:400px" required
    <?php if (!empty($data['nilai'])) echo "value='".$data['nilai']."'"?>>
  </div>     
  <div class="d-flex justify-content-between">
    <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
    <button type="submit" class="btn btn-primary" name="btnUbah" id="btnUbah" style="width:110px">Ubah</button>
  </div>     
</form>