<div class="container-fluid d-flex gap-4 ps-4 pe-4 justify-content-center">
  <div class="input-jabatan d-block w-30">
    <div class="btn-group btn-group-sm d-flex" role="group" aria-label="Basic radio toggle button group">
      <input type="radio" class="btn-check" name="btnradio" id="rb-tambah" autocomplete="off" checked>
      <label class="btn btn-outline-primary" for="rb-tambah">Tambah</label>

      <input type="radio" class="btn-check" name="btnradio" id="rb-ubah" autocomplete="off">
      <label class="btn btn-outline-primary" for="rb-ubah">Ubah</label>

      <input type="radio" class="btn-check" name="btnradio" id="rb-hapus" autocomplete="off">
      <label class="btn btn-outline-primary" for="rb-hapus">Hapus</label>
    </div> <br>
    <?php require_once 'tambah.php'; ?>
    <?php require_once 'ubah.php'; ?>
    <?php require_once 'hapus.php'; ?>  
  </div>

  <div class="tabel-jabatan" width="300px">
    <table class="table table-bordered border-dark">
      <thead>
        <tr class="bg-secondary text-white">
          <th class="text-center" width="60px" >Hirarki</th>
          <th class="text-center" width="240px">Jabatan</th>              
        </tr>
      </thead>        
      <tbody>
        <tr>
          <?php foreach($data['jabatan'] as $jb) {
            echo "<tr>";
            echo "<td class='text-center'>".$jb['hirarki_jabatan']."</td>";
            echo "<td>".$jb['nama_jabatan']."</td>";
            echo "</tr>";
          }            
          ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>

