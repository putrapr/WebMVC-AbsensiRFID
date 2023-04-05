<div class="container d-flex justify-content-center">
  <form action='<?= BASEURL; ?>/karyawan/editKaryawan' method="post">
    <div class="mb-3">
      <label for="a" class="form-label">No. Kartu</label>
      <input readonly type="text" name="nokartu" class="form-control" id="a" aria-describedby="emailHelp" style="width:200px;"
        value="<?= $data['karyawan'][0]['nokartu']; ?>">
      <!-- <div id="emailHelp" class="form-text">Note</div> -->
    </div>
    <div class="mb-3">
      <label for="b" class="form-label">Nama Karyawan</label>
      <input type="text" name="nama" class="form-control" id="b" aria-describedby="emailHelp" style="width:400px"
        value="<?= $data['karyawan'][0]['nama'];?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Jabatan</label>
      <select class="form-select" name="jabatan" aria-label="Default select example" style="width:400px">
        <?php $jbtn = $data['karyawan'][0]['jabatan']; ?>
        <option value="<?= $jbtn; ?>" selected><?= $jbtn; ?></option>
        <?php 
          foreach ($data['jabatan'] as $jabatan){            
            $jb = $jabatan['nama_jabatan'];
            if ($jb == $jbtn) continue;
            echo "<option value='$jb'>$jb</option>";
          }
        ?>
      </select>
    </div>    
    <div class="mb-3">
      <label for="c" class="form-label">Telp</label>
      <input type="text" name="telp" class="form-control" id="c" aria-describedby="emailHelp" style="width:400px"
        value="<?= $data['karyawan'][0]['telp'];?>">
    </div>
    <div class="mb-3">
      <label for="d" class="form-label">Alamat</label>
      <textarea class="form-control" name="alamat" id="d" rows="3" style="width:400px"
        ><?= $data['karyawan'][0]['alamat'];?></textarea>
    </div>
    <div class="d-flex justify-content-between" style="width:400px">
      <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
      <button type="submit" class="btn btn-primary" style="width:110px">Simpan</button>
    </div>    
  </form>
</div>