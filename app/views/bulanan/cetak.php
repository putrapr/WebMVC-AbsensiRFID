<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title><?= $data['judul']; ?></title>
</head>
<body>
  <div class="container" id="main_div">
    <h3><?= $data['nav']; ?></h3>
    <h6><?= $data['karyawan']; ?></h6>
    
    <table class="table table-bordered w-50">
      <thead class="text-center">
        <tr class="bg-secondary text-white">
          <th>Hari</th>
          <th>Tanggal</th>
          <th>Keterangan</th>
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
                  echo 'class="fw-bold"';
                  break;
                case 'Terlambat' :
                  echo 'class="fst-italic"';
                  break;
                case 'Tanpa Keterangan' :
                  echo 'class="text-decoration-underline"';
                  break;
              }
            ?>
          ><?= $abs['keterangan']; ?></td>        
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <br><br>
  <script>
		window.print();
	</script>
</body>
</html></html>