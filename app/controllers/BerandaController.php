<?php 

class BerandaController extends Controller {
  public function index() {    
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Beranda';
    $data['nav'] = '';
    $this->createAllAbsensiNextMonth();
    
    $this->view('layout/header', $data);
    $this->view('beranda/index');
    $this->view('layout/footer');
  }

  public function createAllAbsensiNextMonth(){
    $month = date('m');
    $year = date('Y');
    if ($month == 12) {
      $month = 0;
      $year += 1;
    }
    $month += 1;
    $tanggal = $year.'-'.$month.'-1';
    $a = $this->model('AbsensiModel')->getAbsensiWhereTgl($month, $year, 'Ya');

    // Jika data absensi bulan depan masih kosong, BUAT data absensi
    if (!$a) {
      $lastday=date("t", strtotime($tanggal));
    
      // get all nokartu karyawan
      $karyawan = $this->model('KaryawanModel')
      ->getAllKaryawanJoinOrder('jabatan', 'jabatan', 'nama_jabatan', 'hirarki_jabatan');
      
      foreach ($karyawan as $kar){
        for ($i=1;$i<=$lastday;$i++){
          $tanggal = $year.'-'.$month.'-'.$i;
          $a = $this->model('AbsensiModel')->insertAbsensi($kar['nokartu'], $tanggal, 'Tanpa Keterangan');
        }
      }           
    }
    unset($a); // Max 1000 variabel, di unset / hapus supaya jumlah variabel tidak lebih dari 1000.
  }
}