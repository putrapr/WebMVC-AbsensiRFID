<?php 
  function loopingTgl($data, $tgl, $batas){    
    while ($tgl < $batas) {
      $tgl++;
      $index = $tgl-1;
      echo "<script>console.log('$tgl = ".$data[$index]['hari_kerja']."');</script>";
      
      echo "<td><input type='checkbox' class='btn-check' name='tgl[]' id='tgl$tgl' value='$tgl' ";
      if ($data[$index]['hari_kerja'] == 'Ya') echo "checked";
      echo "> <label class='btn tgl' for='tgl$tgl'>$tgl</label></td>";      
    }
  }
?>

<!-- Modal -->
<div class="modal fade" id="modalHariKerja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hari Kerja <?= substr($data['nav'],14);?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="<?= BASEURL;?>/bulanan/hariKerja" method="post">
        <div class="modal-body">
          <?php if (isset($data['hariKerja'][0]['hari_kerja'])){ ?>
          <table class="table">
            <thead class="text-center">
              <tr>
                <?php 
                  foreach ($data['semuaHari'] as $hari) {
                    echo "<th>$hari</th>";
                  } 
                ?>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
              <?php                                
                $lastday = date("t", strtotime($_SESSION['thn'].'-'.$_SESSION['bln'])); //31
                $firstday = date('D', strtotime($_SESSION['thn'].'-'.$_SESSION['bln'])); //Wed
                $tgl = 0;
                switch ($firstday) {
                  case 'Tue' :
                    echo '<td></td>';
                    loopingTgl($data['hariKerja'], $tgl, $tgl+=6);
                    break;
                  case 'Wed' :
                    echo '<td></td><td></td>';
                    loopingTgl($data['hariKerja'], $tgl, $tgl+=5);
                    break;
                  case 'Thu' :
                    for ($i=0;$i<3;$i++) echo '<td></td>';
                    loopingTgl($data['hariKerja'], $tgl, $tgl+=4);
                    break;
                  case 'Fri' :
                    for ($i=0;$i<4;$i++) echo '<td></td>';
                    loopingTgl($data['hariKerja'], $tgl, $tgl+=3);
                    break;
                  case 'Sat' :
                    for ($i=0;$i<5;$i++) echo '<td></td>';
                    loopingTgl($data['hariKerja'], $tgl, $tgl+=2);
                    break;
                  case 'Sun' :
                    for ($i=0;$i<6;$i++) echo '<td></td>';
                    loopingTgl($data['hariKerja'], $tgl, $tgl+=1);
                    break;
                }
                echo "</tr> <tr>";
                loopingTgl($data['hariKerja'], $tgl, $tgl+=7);
                echo "</tr> <tr>";
                loopingTgl($data['hariKerja'], $tgl, $tgl+=7);
                echo "</tr> <tr>";
                loopingTgl($data['hariKerja'], $tgl, $tgl+=7);
                if ($tgl+7 < $lastday) {
                  echo "</tr> <tr>";
                  loopingTgl($data['hariKerja'], $tgl, $tgl+=7);
                }
                echo "</tr> <tr>"; 
                loopingTgl($data['hariKerja'], $tgl, $lastday++);
              } else {
                echo 'Data Kosong';
              }
              ?>
              </tr>
            </tbody>
          </table>
        </div>
        
        <div class="modal-footer justify-content-between">
          <?php 
            $month = date('m');
            $year = date('Y');
            if ($month == 1) {
              $month = 11;
              $year-=1;
            }
            else if ($month == 2) {
              $month = 12;
              $year-=1;
            }
            else $month-=2;
            
            // tampilkan tombol simpan permanen untuk data 2 bulan yang lalu
            if ($_SESSION['thn'] <= $year && $_SESSION['bln'] <= $month) { ?>
              <div>
                <button type="submit" class="btn btn-warning" data-bs-dismiss="modal" name="permanenKerja"
                onclick = 'return confirm ("Jika <OK>, tombol \"Atur Hari Kerja\" untuk bulan <?= $data["semuaBln"][$_SESSION["bln"]]." ".$_SESSION["thn"]; ?> akan hilang?")'
                >Simpan Permanen</button>
              </div>
          <?php } else echo '<div></div>'; ?>
          
          <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <?php if (isset($data['hariKerja'][0]['hari_kerja'])){ ?>
              <button type="submit" class="btn btn-primary" name="simpanKerja">Simpan</button>
            <?php } ?>
          </div>          
        </div>
      </form>
    </div>
  </div>
</div>