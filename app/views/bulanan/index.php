<div class="container-fluid ps-4 pe-4">
  <!-- Button trigger modal -->
  <div class="d-flex  flex-row-reverse gap-3">
    <?php if (!isset($data['hariOn'])): ?>
      <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalHariKerja">
        Atur Hari Kerja
      </button>
    <?php require_once 'app/views/bulanan/harikerja.php';
    endif; ?>
    
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalUbahBulan">
      Ubah Bulan
    </button>    
  </div>

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

<?php require_once 'app/views/bulanan/ubahbulan.php'; ?>