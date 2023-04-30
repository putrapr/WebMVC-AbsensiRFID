<?php 

class JabatanController extends Controller {
  public function index($nama_baru='',$nilai='', $nama_lama='') {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Atur Jabatan';
    $data['nav'] = 'Atur Jabatan';
    $data['jabatan'] = $this->model('JabatanModel')->getAllJabatanOrder('hirarki_jabatan','','+0');

    $this->view('layout/header', $data);
    $this->view('jabatan/index', $data);
    $this->view('layout/footer');
  }

  public function tambah(){
    $nama = $_POST['jb_baru'];
    $nilai = $_POST['nilai_hirarki'];
    try {
      $a = $this->model('JabatanModel')->insertJabatan($nama, $nilai);
      $_SESSION['success'] = 'Berhasil Tambah Jabatan';
    } catch (PDOException $e){
      $_SESSION['error'] = 'Jabatan Sudah Ada !';
    }
    return header("location:".BASEURL."/jabatan");
  }

  public function ubah(){
    $nama_lama = $_POST['jb_lama'];
    $nama_baru = $_POST['jb_baru'];
    $nilai = $_POST['nilai'];
    try {
      $a = $this->model('JabatanModel')->updateJabatan($nama_lama, $nama_baru, $nilai);   
      $_SESSION['success'] = 'Berhasil Ubah Jabatan';   
    } catch (PDOException $e){
      $_SESSION['error'] = 'Jabatan sudah ada !';
    }
    return header("location:".BASEURL."/jabatan");
  }

  public function hapus(){
    $nama_lama = $_POST['jb_lama'];
    try {
      $a = $this->model('JabatanModel')->deleteJabatan($nama_lama);   
      $_SESSION['success'] = 'Berhasil Hapus Jabatan';   
    } catch (PDOException $e){
      $_SESSION['error'] = 'Gagal Hapus Jabatan !';
    }
    return header("location:".BASEURL."/jabatan");
  }
}