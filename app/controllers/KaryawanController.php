<?php 

class KaryawanController extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Data Karyawan';
    $data['nav'] = 'Data Karyawan';
    $data['karyawan'] = $this->model('KaryawanModel')
      ->getAllKaryawanJoinOrder('jabatan', 'jabatan', 'nama_jabatan', 'hirarki_jabatan');
    $this->view('layout/header', $data);
    $this->view('karyawan/index', $data);
    $this->view('layout/footer');
  }

  public function tambah(){    
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Tambah Karyawan';
    $data['nav'] = 'Tambah Karyawan';
    $data['jabatan'] = $this->model('JabatanModel')->getAllJabatanOrder('nama_jabatan');
    
    // Form tambah karyawan
    $this->view('layout/header', $data);
    $this->view('karyawan/tambah', $data);
    $this->view('layout/footer');
  }

  public function tambahKaryawan(){
    $nokartu = $_POST['norfid'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $a = $this->model('KaryawanModel')->insertKaryawan($nokartu, $nama, $jabatan, $telp, $alamat);
    return header('location:'.BASEURL.'/karyawan');
  }

  public function edit($nokartu){
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Edit Karyawan';
    $data['nav'] = 'Edit Karyawan';    
    $data['karyawan'] = $this->model('KaryawanModel')->getSingleKaryawan($nokartu);
    $data['jabatan'] = $this->model('JabatanModel')->getAllJabatanOrder('nama_jabatan');
    // Form edit karyawan
    $this->view('layout/header', $data);
    $this->view('karyawan/edit', $data);
    $this->view('layout/footer');
  }

  public function editKaryawan(){
    $nokartu = $_POST['nokartu'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    // echo "$nokartu <br> $nama <br> $jabatan <br> $telp <br> $alamat"; die();
    $a = $this->model('KaryawanModel')->updateKaryawan($nokartu, $nama, $jabatan, $telp, $alamat);
    return header('location:'.BASEURL.'/karyawan');
  }

  public function hapusKaryawan($nokartu){
    $a = $this->model('KaryawanModel')->deleteKaryawan($nokartu);
    return header('location:'.BASEURL.'/karyawan');
  }
}