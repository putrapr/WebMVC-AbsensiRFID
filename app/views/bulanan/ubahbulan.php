<!-- Modal -->
<div class="modal fade" id="modalUbahBulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  if ($i == $_SESSION['bln']){
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
            <input type="number" name='thn_modal' class="form-control" id="exampleFormControlInput1" value="<?= $_SESSION['thn']; ?>" required="required">
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