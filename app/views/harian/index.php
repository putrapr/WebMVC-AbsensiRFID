<div class="container">
  <table class="table table-bordered border-dark">
    <thead class="text-center">
      <tr class="bg-secondary text-white">
        <th width="10px">No.</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
      </tr>
    </thead>
    <tbody class="text-center text-dark">
      <?php $no=1; 
      foreach ($data['absensi'] as $abs) : ?>
        <tr>
          <td> <?= $no++; ?> </td>
          <td> <?= $abs['nama']; ?> </td>
          <td> <?= $abs['tanggal']; ?> </td>
          <td> <?= $abs['jam_masuk']; ?> </td>
          <td> <?= $abs['jam_pulang']; ?> </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>