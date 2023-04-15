<?php 

class BulananController extends Controller {
  private $kehadiran = [ 'Hadir', 'Terlambat', 'Izin', 'Tanpa Keterangan', 'Cuti'];
  private $semuaHari = [1=>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
  private $semuaBln = [
    '1'=> 'Januari', '2'=> 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni',
    '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November','12' => 'Desember' 
  ];

  public function index() {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $this->setBulanTahun();
    $data['judul'] = 'Data Bulanan';
    $data['nav'] = "Rekap Absensi ".$this->semuaBln[$_SESSION['bln']]." ".$_SESSION['thn'];
    $data['absensi'] = $this->model('AbsensiModel')
      ->getAbsensiWhereTgl($_SESSION['bln'], $_SESSION['thn']);
    $data['karyawan'] = $this->model('KaryawanModel')
      ->getAllKaryawanJoinOrder('jabatan', 'jabatan', 'nama_jabatan', 'hirarki_jabatan');
    $data['semuaBln'] = $this->semuaBln;
    $data['bulanLalu'] = $_SESSION['bln'];
    $data['tahun'] = $_SESSION['thn'];
    $this->view('layout/header', $data);
    $this->view('bulanan/index', $data);
    $this->view('layout/footer');
  }

  public function detail($nokartu) {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Detail Bulanan';
    $data['nav'] = "Absensi ".$this->semuaBln[$_SESSION['bln']]." ".$_SESSION['thn'];
    $data['nokartu'] = $nokartu;
    $data['semuaHari'] = $this->semuaHari;
    
    // Ambil nama dan jabatan karyawan
    $data['karyawan'] = $this->model('KaryawanModel')->getSingleKaryawan($nokartu);
    $nama = $data['karyawan'][0]['nama'];
    $jabatan = $data['karyawan'][0]['jabatan'];
    $data['karyawan'] = $nama. ' | ' .$jabatan;

    // Ambil data absensi 1 orang dalam bulan tersebut
    $data['absensi'] = $this->model('AbsensiModel')
      ->getSingleAbsensiOrder($nokartu, $_SESSION['bln'], $_SESSION['thn'], 'tanggal');
      
    // Ambil semua keterangan
    $data['keterangan'] = $this->kehadiran;

    $this->view('layout/header', $data);
    $this->view('bulanan/detail', $data);
    $this->view('layout/footer');
  }

  public function ubahKeterangan($nokartu, $keterangan, $tanggal){
    $keterangan = str_replace('-', ' ', $keterangan);
    $ubahKet = $this->model('AbsensiModel')->updateKeterangan($nokartu, $keterangan, $tanggal);
    return header('location:'.BASEURL.'/bulanan/detail/'.$nokartu);
  }

  public function hitungKehadiran($collection, $nokartu, $keterangan){
    $result = [];
    // ambil data yang mempunyai $nokartu && $keterangan sesuai, lalu ambil keynya
    foreach ($collection as $key => $val) {
        if (($val['nokartu'] == $nokartu) && ($val['keterangan'] == $keterangan)) {
          array_push($result,$key);
        }
    }
    return (count($result));
  }

  public function setBulanTahun(){
    if (isset($_POST['bln_modal'])) {
      foreach($this->semuaBln as $key => $value){
        if ($_POST['bln_modal'] == $value){
          $_SESSION['bln'] = $key;
        }
      }
      $_SESSION['thn'] = $_POST['thn_modal'];
    } else if (!isset($_SESSION['bln'])){
      $_SESSION['bln'] = MONTHNOW-1;
      $_SESSION['thn'] = YEARNOW;
    } 
  }

  public function cetak($nokartu){
    $data['judul'] = 'Cetak Absensi';
    $data['nav'] = "Absensi ".$this->semuaBln[$_SESSION['bln']]." ".$_SESSION['thn'];
    $data['semuaHari'] = $this->semuaHari;

    // Ambil nama dan jabatan karyawan
    $data['karyawan'] = $this->model('KaryawanModel')->getSingleKaryawan($nokartu);
    $nama = $data['karyawan'][0]['nama'];
    $jabatan = $data['karyawan'][0]['jabatan'];
    $data['karyawan'] = $nama. ' | ' .$jabatan;

    // Ambil data absensi 1 orang dalam bulan tersebut
    $data['absensi'] = $this->model('AbsensiModel')
      ->getSingleAbsensiOrder($nokartu, $_SESSION['bln'], $_SESSION['thn'], 'tanggal');

    // $this->view('layout/header', $data);
    $this->view('bulanan/cetak', $data);
    // $this->view('layout/footer');
  }
}