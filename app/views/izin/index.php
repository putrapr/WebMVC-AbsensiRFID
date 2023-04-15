<div class="container-fluid ps-4 pe-4">
  <div class="d-flex justify-content-between">
    <a href="<?= BASEURL; ?>/izin/tambah" class="btn btn-primary">Tambah Izin</a>
    <form action="<?= BASEURL; ?>/izin/pencarian" class="d-flex" role="search" method="POST">
      <input class="form-control me-2" type="search" placeholder="cari" aria-label="Search" name="keyword">
      <button class="btn btn-outline-success" type="submit" style="width:100px;">Cari</button>
    </form>
  </div>
  
  <table class="table table-bordered border-dark mt-3">
    <thead class="text-center">
      <tr class="bg-secondary text-white">
        <th width="10px" >No.</th>
        <th width="250px">Nama</th>
        <th width="150px">Jenis Cuti</th>
        <th>Keterangan</th>
        <th width="140px">Dari Tanggal</th>
        <th width="140px">Sampai Tanggal</th>
        <th width="130px">Aksi</th>
      </tr>
    </thead>    
    <tbody>
      <?php $no=1;
      foreach ($data['izin'] as $izin) : 
        // Format Tanggal
        $potongan = explode("-",$izin['dari_tgl']);
        $dari_tgl = $potongan[2].'-'.$potongan[1].'-'.$potongan[0];
        $potongan = explode("-",$izin['sampai_tgl']);
        $sampai_tgl = $potongan[2].'-'.$potongan[1].'-'.$potongan[0];
      ?>        
        <tr>
          <td class="text-center"> <?= $no++; ?> </td>
          <td> <?= $izin['nama']; ?> </td>
          <td> <?= $izin['jenis_cuti']; ?> </td>
          <td> <?= $izin['keterangan']; ?> </td>
          <td class="text-center"> <?= $dari_tgl ?> </td>
          <td class="text-center"> <?= $sampai_tgl ?> </td>
          <td class="text-center">
            <a href="<?= BASEURL; ?>/izin/edit/<?= $izin['id']; ?>" class="btn btn-light btn-sm"> Edit
            </a> | <a href="<?= BASEURL; ?>/izin/hapusIzin/<?= $izin['id']; ?>" class="btn btn-light btn-sm" 
            onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')"> Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>