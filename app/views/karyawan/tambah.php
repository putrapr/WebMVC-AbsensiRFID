<div class="container d-flex justify-content-center">
  <form action='<?= BASEURL; ?>/karyawan/tambahKaryawan' method="post">
    <!-- <div id="nomor-rfid"></div> -->
    <div class="mb-3">
      <label for="a" class="form-label">No. Kartu</label>
      <input type="number" name="norfid" class="form-control" id="a" aria-describedby="emailHelp" style="width:200px;" required>
    </div>
    <div class="mb-3">
      <label for="b" class="form-label">Nama Karyawan</label>
      <input type="text" name="nama" class="form-control" id="b" aria-describedby="emailHelp" style="width:400px" required>
    </div>
    <div class="mb-3">
      <label for="c" class="form-label">Jabatan</label>
      <select class="form-select" name="jabatan" id="c" aria-label="Default select example" style="width:400px">
        <?php 
          foreach ($data['jabatan'] as $jabatan){
            $jb = $jabatan['nama_jabatan'];
            echo "<option value='$jb'>$jb</option>";
          }
        ?>
      </select>
    </div>    
    <div class="mb-3">
      <label for="d" class="form-label">Telp</label>
      <input type="number" name="telp" class="form-control" id="d" aria-describedby="emailHelp" style="width:400px" required>
    </div>
    <div class="mb-3">
      <label for="e" class="form-label">Alamat</label>
      <textarea class="form-control" name="alamat" id="e" rows="3" style="width:400px" required></textarea>
    </div>
    <div class="d-flex justify-content-between" style="width:400px">
      <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
      <button type="submit" class="btn btn-primary" style="width:110px">Simpan</button>
    </div>    
  </form>
</div>