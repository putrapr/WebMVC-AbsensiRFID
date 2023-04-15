<?php
	$konek = mysqli_connect("localhost", "root", "", "absenrfid");

	//baca tabel status untuk mode absensi
	$sql = mysqli_query($konek, "SELECT * FROM status");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data['mode'];

	//uji mode absen
	$mode = "";
	if ($mode_absen==1) $mode = "Masuk";
	else if($mode_absen==2) $mode = "Pulang";


	//baca tabel tmprfid
		$baca_kartu = mysqli_query($konek, "SELECT * from tmprfid");
		$data_kartu = mysqli_fetch_array($baca_kartu);
		isset($data_kartu['nokartu'])? $nokartu = $data_kartu['nokartu'] : $nokartu = "";
		
		// $nokartu = 1122;
	$imgUrl = 'http://localhost:8080/absensi-rfid/public/img';
?>

<div class="container-fluid" style="text-align: center;">
	<?php if($nokartu=="") { ?>

	<h3>Absen : <?php echo $mode; ?> </h3>
	<h3>Silahkan Tempelkan Kartu RFID Anda</h3>
	<img src="<?= $imgUrl; ?>/rfid.png" style="width: 200px"> <br>
	<img src="<?= $imgUrl; ?>/animasi2.gif">

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
		$cari_karyawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_karyawan);

		if ($jumlah_data==0) echo "<h1>Maaf! Kartu $nokartu Tidak Dikenali</h1>";
		else {
			//ambil nama karyawan
			$data_karyawan = mysqli_fetch_array($cari_karyawan);
			$nama = $data_karyawan['nama'];

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Makassar') ;
			$tanggal = date('Y-m-d');
			$jam     = date('H:i:s');

			// Cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. 
			// Apabila belum ada, maka dianggap absen masuk. 
			// Tapi kalau sudah ada, maka update data sesuai mode absensi
			$cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='$nokartu' AND tanggal='$tanggal'");

			//hitung jumlah datanya
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if ($jumlah_absen == 0) {
				echo "<h1>Selamat Datang <br> $nama</h1>";
				mysqli_query($konek, "INSERT INTO absensi(nokartu, tanggal, jam_masuk) VALUES ('$nokartu', '$tanggal', '$jam')");
			} else {
				echo "<h1>Selamat Jalan <br> $nama</h1>";
				mysqli_query($konek, "UPDATE absensi SET jam_pulang='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");				
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "DELETE FROM tmprfid");
	} ?>

</div>