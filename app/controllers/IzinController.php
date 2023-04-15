<?php 

class IzinController extends Controller {
  private $cuti = ['Sakit', 'Keperluan Penting', 'Tahunan', 'Melahirkan', 'Lain-lain'];

  public function index() {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Izin Karyawan';
    $data['nav'] = 'Izin Karyawan';
    $data['izin'] = $this->model('IzinModel')->getAllIzinOrder('karyawan', 'nokartu', 'nokartu', 'dari_tgl', 'DESC');

    $this->view('layout/header', $data);
    $this->view('izin/index', $data);
    $this->view('layout/footer');
  }

  public function pencarian(){
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Izin Karyawan';
    $data['nav'] = 'Izin Karyawan';
    $keyword = $_POST['keyword'];
    $data['izin'] = $this->model('IzinModel')
      ->getAllIzinPencarian('karyawan', 'nokartu', 'nokartu', $keyword);

    $this->view('layout/header', $data);
    $this->view('izin/index', $data);
    $this->view('layout/footer');
  }

  public function tambah(){
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Tambah Izin';
    $data['nav'] = 'Tambah Izin';
    $data['karyawan'] = $this->model('KaryawanModel')
      ->getAllKaryawanJoinOrder('jabatan', 'jabatan', 'nama_jabatan', 'hirarki_jabatan', 'DESC');
    $data['cuti'] = $this->cuti;

    $this->view('layout/header', $data);
    $this->view('izin/tambah', $data);
    $this->view('layout/footer');
  }

  public function tambahIzin(){
    $nama = $_POST['namaKaryawan'];
    $cuti = $_POST['jenisCuti'];
    $dariTgl = $_POST['dariTgl'];
    $sampaiTgl = $_POST['sampaiTgl'];
    $ket = $_POST['keterangan'];
    $nokartu = $this->model('KaryawanModel')->getNoKartuWhereNama($nama);
    $a = $this->model('izinModel')->insertIzin($nokartu[0]['nokartu'], $cuti, $ket, $dariTgl, $sampaiTgl);
    return header('location:'.BASEURL.'/izin');
  }

  public function edit($id){
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Edit Izin';
    $data['nav'] = 'Edit Izin';
    $data['izin'] = $this->model('IzinModel')->getSingleIzin($id);
    $data['izin'] = $data['izin'][0];
    $data['nama'] = $this->model('KaryawanModel')->getSingleKaryawan($data['izin']['nokartu']);
    $data['nama'] = $data['nama'][0]['nama'];
    $data['cuti'] = $this->cuti;
    
    $this->view('layout/header', $data);
    $this->view('izin/edit', $data);
    $this->view('layout/footer');
  }

  public function editIzin(){
    $id = $_POST['id'];    
    $cuti = $_POST['jenisCuti'];
    $dariTgl = $_POST['dariTgl'];
    $sampaiTgl = $_POST['sampaiTgl'];
    $ket = $_POST['keterangan'];

    $a = $this->model('izinModel')->updateIzin($id, $cuti, $ket, $dariTgl, $sampaiTgl);
    return header('location:'.BASEURL.'/izin');
  }

  public function hapusIzin($id){
    $a = $this->model('IzinModel')->deleteIzin($id);
    return header('location:'.BASEURL.'/izin');
  }
}