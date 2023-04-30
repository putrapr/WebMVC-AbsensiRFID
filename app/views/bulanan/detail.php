<div class="container">
  <div class="d-flex justify-content-between w-50">
    <h4><?= $data['karyawan']; ?></h4>
    <a href="<?= BASEURL; ?>/bulanan/cetak/<?= $data['nokartu'];?>">
      <img src="<?= BASEURL;?>/public/img/print.png" width="30px" alt="print.png"
      onmouseover='this.style.width="31px"' onmouseout='this.style.width="30px"'>
    </a>
  </div>
  <table class="table table-bordered w-50 mt-1">
    <thead class="text-center">
      <tr class="bg-secondary text-white">
        <th>Hari</th>
        <th>Tanggal</th>
        <th>Kehadiran</th>
        <th>Ubah</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php 
      foreach($data['absensi'] as $abs) : 
        $num = date('N', strtotime($abs['tanggal']));
        $hari = $data['semuaHari'][$num];
        $tanggal = date("d", strtotime($abs['tanggal']));
      ?>    
      <tr>
        <td><?= $hari ?></td>
        <td><?= $tanggal; ?></td>
        <td
          <?php
            switch ($abs['keterangan']) {
              case 'Hadir' :
                echo 'class="bg-info"';
                break;
              case 'Terlambat' :
                echo 'class="bg-warning"';
                break;
              case 'Izin' :
                echo 'class="bg-success text-light"';
                break;
              case 'Tanpa Keterangan' :
                echo 'class="bg-danger"';
                break;
            }
          ?>
        ><?= $abs['keterangan']; ?></td>
        <td> 
          <div class="dropdown">
            <button class="btn btn-sm btn-primary  dropdown-toggle" style="width:140px"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $abs['keterangan']; ?>
            </button>
            <ul class="dropdown-menu">
              <?php                
                foreach ($data['keterangan'] as $ket) {
                  if ($ket == $abs['keterangan']) continue;
                  $urlUbah = BASEURL.'/bulanan/ubahKeterangan/'.$abs['nokartu'].'/'.str_replace(' ', '-', $ket).'/'.$abs['tanggal'];
                  echo "<li><a class='dropdown-item' href='$urlUbah'>".$ket."</a></li>";
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