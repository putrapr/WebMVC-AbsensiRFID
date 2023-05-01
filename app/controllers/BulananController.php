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
      ->getAbsensiWhereTgl($_SESSION['bln'], $_SESSION['thn'], 'Ya');
    if (!$data['absensi']) {
      $data['absensi'] = $this->model('AbsensiModel')
      ->getAbsensiWhereTgl($_SESSION['bln'], $_SESSION['thn'], 'Ya-Fix');
    }
    $data['hariKerja'] = $this->model('AbsensiModel')->getHariKerja($_SESSION['bln'], $_SESSION['thn']);
    $data['karyawan'] = $this->model('KaryawanModel')
      ->getAllKaryawanJoinOrder('jabatan', 'jabatan', 'nama_jabatan', 'hirarki_jabatan');
    $data['semuaBln'] = $this->semuaBln;
    $data['semuaHari'] = $this->semuaHari;
    $a = $this->model('AbsensiModel')->checkPermanentHari($_SESSION['bln'], $_SESSION['thn']);
    if ($a) $data['hariOn']='ya';

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
      ->getSingleAbsensiOrder($nokartu, $_SESSION['bln'], $_SESSION['thn'], 'Ya', 'tanggal');
    if (!$data['absensi']) {
      $data['absensi'] = $this->model('AbsensiModel')
      ->getSingleAbsensiOrder($nokartu, $_SESSION['bln'], $_SESSION['thn'], 'Ya-Fix', 'tanggal');
    }
      
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

    $this->view('bulanan/cetak', $data);
  }

  public function hariKerja(){
    if (isset($_POST['simpanKerja'])) $this->simpanHariKerja();
    else if (isset($_POST['permanenKerja'])) $this->permanenHariKerja();
  }

  public function simpanHariKerja(){
    if (isset($_POST['tgl'])) {
      // dapatkan tgl yang hari kerja 'Ya' pada bulan dan tahun ke x
      $dbTgl_on = $this->model('AbsensiModel')->getHariKerja($_SESSION['bln'], $_SESSION['thn'], 'Ya');
      $i=0;
      foreach ($dbTgl_on as $tgl_on) {
        $tgl = substr($tgl_on['tanggal'],8);
        if (substr($tgl, 0, 1) == '0') $tgl = substr($tgl, 1);
        $oldTgl_on[$i] = $tgl;
        $i++;
      }

      // dapatkan tgl_on & tgl_off baru
      $newTgl_on = $_POST['tgl'];
      $year_month = $_SESSION['thn'].'-'.$_SESSION['bln'];
      $lastday = date("t", strtotime($year_month));
      $number = range(1, $lastday);      
      $newTgl_off = array_values(array_diff($number, $newTgl_on));

      // pilih tgl baru yang berbeda kondisi dengan yang ada pada database
      $diffTgl_on = array_values(array_diff($oldTgl_on, $newTgl_on));
      $diffTgl_on2 = array_values(array_diff($newTgl_on, $oldTgl_on));
      $diffTgl_on = array_merge($diffTgl_on,$diffTgl_on2);
      
      // ambil irisan dari tgl baru (on/off) dan tgl beda kondisi
      $newTgl_on = array_intersect($newTgl_on, $diffTgl_on);
      $newTgl_off = array_intersect($newTgl_off, $diffTgl_on);

      // perbarui DB tgl lama dengan tgl baru (khusus yang berbeda saja)
      foreach ($newTgl_on as $tgl){
        $u = $this->model('AbsensiModel')->updateHariKerja($year_month.'-'.$tgl,'Ya');
      }
      foreach ($newTgl_off as $tgl){
        $u = $this->model('AbsensiModel')->updateHariKerja($year_month.'-'.$tgl,'Tidak');
      }
      unset($u);
      return header('location:'.BASEURL.'/bulanan');
    }
  }

  public function permanenHariKerja(){
    $u = $this->model('AbsensiModel')->updateToYaFix($_SESSION['bln'], $_SESSION['thn']);
    $u = $this->model('AbsensiModel')->deleteAbsensiWhere($_SESSION['bln'], $_SESSION['thn']);
    return header('location:'.BASEURL.'/bulanan');
  }

}