<!-- Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Jabatan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="<?= BASEURL;?>/jabatan/hapus" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Jabatan Lama</label>
            <select class="form-select" name="jb_lama" aria-label="Default select example">
              <?php 
                foreach ($data['jabatan'] as $jabatan){          
                  $jb = $jabatan['nama_jabatan'];
                  if ($data['nama_lama'] == $jb){
                    echo "<option value='$jb' selected>$jb</option>";
                  } else {
                    echo "<option value='$jb'>$jb</option>";
                  }          
                }
              ?>
            </select>
          </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary" name="simpanModal">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>