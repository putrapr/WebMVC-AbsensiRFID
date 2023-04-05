<form style="display:none;" method="post" id="form-hapus">
  <div class="mb-3">
    <label class="form-label">Jabatan</label>
    <select class="form-select" aria-label="Default select example" style="width:400px">
      <option selected>Open this select menu</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>     
  <div class="d-flex justify-content-between">
    <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="width:110px">&lt;&lt; Kembali</a>
    <button class="btn btn-primary" name="btnHapus" id="btnHapus" style="width:110px">Hapus</button>
  </div>     
</form>