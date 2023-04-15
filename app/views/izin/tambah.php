<div class="container d-flex justify-content-center">
  <div class="center-content mt-3">
    <form action='<?= BASEURL; ?>/izin/tambahIzin' method="post">
    <div class="d-flex gap-5">
      <div class="mb-3">
        <label class="form-label">Nama Karyawan</label>
        <select class="form-select" name="namaKaryawan" aria-label="Default select example" style="width:400px">
          <?php 
            foreach ($data['karyawan'] as $karyawan) {
              $jb = $karyawan['nama'];
              echo "<option value='$jb'>$jb</option>";
            }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Cuti</label>
        <select class="form-select" name="jenisCuti" aria-label="Default select example" style="width:400px">
          <?php 
            foreach ($data['cuti'] as $cuti){
              echo "<option value='$cuti'>$cuti</option>";
            }
          ?>
        </select>
      </div>
    </div>

    <div class="d-flex gap-5">
      <div class="mb-3">
        <label for="a" class="form-label">Dari Tanggal</label>
        <input type="date" name="dariTgl" class="form-control" id="a" style="width:400px" required>
      </div>
      <div class="mb-3">
        <label for="b" class="form-label">Sampai Tanggal</label>
        <input type="date" name="sampaiTgl" class="form-control" id="b" style="width:400px" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="c" class="form-label">Keterangan</label>
      <textarea class="form-control" name="keterangan" id="c" rows="3" style="width:850px" required></textarea>
    </div> 

    <div class="d-flex justify-content-between" style="width:850px;">
      <a href="<?= BASEURL; ?>/izin" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
      <button type="submit" class="btn btn-primary" style="width:110px">Simpan</button>
    </div>

    </form>
  </div>     
</div>