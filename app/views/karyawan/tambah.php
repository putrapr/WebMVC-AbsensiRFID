<div class="container d-flex justify-content-center">
  <form action='<?= BASEURL; ?>/karyawan/tambahKaryawan' method="post">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">No. Kartu</label>
      <input type="number" name="norfid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:200px;" required>
      <!-- <div id="emailHelp" class="form-text">Note</div> -->
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:400px" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Jabatan</label>
      <select class="form-select" name="jabatan" aria-label="Default select example" style="width:400px">
        <?php 
          foreach ($data['jabatan'] as $jabatan){
            $jb = $jabatan['nama_jabatan'];
            echo "<option value='$jb'>$jb</option>";
          }
        ?>
      </select>
    </div>    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Telp</label>
      <input type="number" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:400px" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
      <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" style="width:400px" required></textarea>
    </div>
    <div class="d-flex justify-content-between" style="width:400px">
      <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
      <button type="submit" class="btn btn-primary" style="width:110px">Simpan</button>
    </div>    
  </form>
</div>