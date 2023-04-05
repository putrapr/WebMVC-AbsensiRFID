<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jabatan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="<?= BASEURL;?>/jabatan/tambah" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="a" class="form-label">Jabatan Baru</label>
            <input type="text" name="jb_baru" class="form-control" id="a" required>
          </div>
          <div class="mb-3">
            <label for="b" class="form-label">Nilai Hirarki</label>
            <input type="number" name="nilai_hirarki" class="form-control" id="b" required>
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
