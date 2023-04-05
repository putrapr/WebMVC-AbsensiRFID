<div class="container">
    <h4><?= $data['karyawan']; ?></h4>
  <table class="table table-bordered w-50">
    <thead class="text-center">
      <tr class="bg-secondary text-white">
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Ubah</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php 
      foreach($data['absensi'] as $abs) : 
        $tanggal = date("d", strtotime($abs['tanggal'])); 
      ?>    
      <tr>
        <td><?= $tanggal; ?></td>
        <td><?= $abs['keterangan']; ?></td>
        <td> 
          <div class="dropdown">
            <button class="btn btn-sm btn-primary  dropdown-toggle" style="width:140px"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $abs['keterangan']; ?>
            </button>
            <ul class="dropdown-menu">
              <?php                
                foreach ($data['keterangan'] as $ket) {
                  if ($ket['keterangan'] == $abs['keterangan']){
                    continue;
                  }
                  $urlUbah = BASEURL.'/bulanan/ubahKeterangan/'.$abs['nokartu'].'/'.str_replace(' ', '-', $ket['keterangan']).'/'.$abs['tanggal'];
                  echo "<li><a class='dropdown-item' href='$urlUbah'>".$ket['keterangan']."</a></li>";
                }
              ?>
            </ul>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="<?= BASEURL; ?>/bulanan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
</div>