<div class="container-fluid ps-4 pe-4">
  <a href="<?= BASEURL; ?>/karyawan/tambah" class="btn btn-primary">Tambah Karyawan</a>
  <table class="table table-bordered border-dark mt-3">
    <thead class="text-center">
      <tr class="bg-secondary text-white">
        <th width="10px" >No.</th>
        <th width="125px">No.Kartu</th>
        <th width="250px">Nama</th>
        <th width="150px">Jabatan</th>
        <th width="125px">Telp</th>
        <th>Alamat</th>
        <th width="130px">Aksi</th>
      </tr>
    </thead>    
    <tbody>
      <?php $no=1;
      foreach ($data['karyawan'] as $kar) : ?>
        <tr>
          <td class="text-center"> <?= $no++; ?> </td>
          <td> <?= $kar['nokartu']; ?> </td>
          <td> <?= $kar['nama']; ?> </td>
          <td> <?= $kar['jabatan']; ?> </td>
          <td> <?= $kar['telp']; ?> </td>
          <td> <?= $kar['alamat']; ?> </td>
          <td class="text-center">
            <a href="<?= BASEURL; ?>/karyawan/edit/<?= $kar['nokartu']; ?>" class="btn btn-light btn-sm"> Edit
            </a> | <a href="<?= BASEURL; ?>/karyawan/hapusKaryawan/<?= $kar['nokartu']; ?>" class="btn btn-light btn-sm" 
            onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')"> Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="<?= BASEURL; ?>/jabatan" class="btn btn-primary float-end">Atur Jabatan</a>
</div>