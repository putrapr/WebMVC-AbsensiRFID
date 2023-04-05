<div class="container-fluid ps-4 pe-4">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ubah Bulan
  </button>
  <table class="table table-bordered float-start mt-2">
    <thead class="text-center">
      <tr class="bg-secondary text-white">
        <th width="10px">No.</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Hadir</th>
        <th>Terlambat</th>
        <th>Izin</th>
        <th>Tanpa Keterangan</th>
        <th width="120px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1;
      foreach ($data['karyawan'] as $kar) :?>    
        <tr>
          <td> <?= $no++; ?> </td>
          <td> <?= $kar['nama']; ?> </td>
          <td> <?= $kar['jabatan']; ?> </td>
          <td class="text-center" width="110px"> <?= $this->hitungKehadiran($data['absensi'], $kar['nokartu'], 'Hadir'); ?> </td>
          <td class="text-center" width="160px"> <?= $this->hitungKehadiran($data['absensi'], $kar['nokartu'], 'Terlambat'); ?> </td>
          <td class="text-center" width="110px"> <?= $this->hitungKehadiran($data['absensi'], $kar['nokartu'], 'Izin'); ?> </td>
          <td class="text-center" width="160px"> <?= $this->hitungKehadiran($data['absensi'], $kar['nokartu'], 'Tanpa Keterangan'); ?> </td>
          <td class="text-center"> 
            <a href="<?= BASEURL; ?>/bulanan/detail/<?=$kar['nokartu'] ?>" 
               class="btn btn-light btn-sm">Detail / Ubah</a> 
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Rekap Bulan ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="<?= BASEURL;?>/bulanan" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Bulan</label>
            <select name="bln_modal" class="form-select" aria-label="Default select example">
              <?php 
                for ($i=1; $i<=12; $i++){
                  if ($i == $data['bulanLalu']){
                    echo "<option value='".$data['semuaBln'][$i]."' selected>". $data['semuaBln'][$i] ."</option>";
                    continue;
                  }
                  echo "<option value='".$data['semuaBln'][$i]."'>".$data['semuaBln'][$i]."</option>";
                }
              ?>
            </select>
          </div> <br>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tahun</label>
            <input type="number" name='thn_modal' class="form-control" id="exampleFormControlInput1" value="<?= $data['tahun']; ?>" required="required">
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary" name="simpanModal">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>