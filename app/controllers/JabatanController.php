<?php 

class JabatanController extends Controller {
  public function index($nama_baru='',$nilai='', $nama_lama='') {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Atur Jabatan';
    $data['nav'] = 'Atur Jabatan';
    $data['jabatan'] = $this->model('JabatanModel')->getAllJabatanOrder('hirarki_jabatan','','+0');

    // Form jabatan
    $this->view('layout/header', $data);
    $this->view('jabatan/index', $data);
    $this->view('layout/footer');
  }

  public function tambah(){
    // echo 'Masuk function tambah'; die();
    $nama = $_POST['jb_baru'];
    $nilai = $_POST['nilai_hirarki'];
    try {
      $a = $this->model('JabatanModel')->insertJabatan($nama, $nilai);
      $_SESSION['success'] = 'Berhasil Menambahkan Jabatan Baru';
    } catch (PDOException $e){
      $_SESSION['error'] = 'Jabatan Sudah Ada !';      
    }
    return header("location:".BASEURL."/jabatan");
  }

  public function ubah($nama){
    echo 'Masuk Edit : '.$nama; die();
  }

  public function hapus($nama){
    echo 'Masuk Hapus : '.$nama; die();
  }
}