<?php 

class JabatanController extends Controller {
  public function index($nama_baru='',$nilai='', $nama_lama='') {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Atur Jabatan';
    $data['nav'] = 'Atur Jabatan';
    $data['jabatan'] = $this->model('JabatanModel')->getAllJabatanOrder('hirarki_jabatan','','+0');
    $data['nama_baru'] = $nama_baru;
    $data['nama_lama'] = $nama_lama;
    $data['nilai'] = $nilai;
    
    // Form jabatan
    $this->view('layout/header', $data);
    $this->view('jabatan/index', $data);
    $this->view('layout/footer');
  }

  public function tambahJabatan(){
    // echo "masuk function tambahJabatan";
    $nama = $_POST['jb_baru'];
    $nilai = $_POST['nilai_hirarki'];
    try {
      $a = $this->model('JabatanModel')->insertJabatan($nama, $nilai);
      return header("location:".BASEURL."/jabatan");
    } catch (PDOException $e){
      $_SESSION['err'] = 'Jabatan sudah ada !';
      return header("location:".BASEURL."/jabatan/index/$nama/$nilai");
    }
    
  }

  public function ubahJabatan(){
    echo "masuk function ubahJabatan";
    $nama_lama = $_POST['jb_lama'];
    $nama_baru = $_POST['jb_baru'];
    $nilai = $_POST['nilai_hirarki'];

    try {
      $a = $this->model('JabatanModel')->updateJabatan($nama_lama, $nama_baru, $nilai);
      return header("location:".BASEURL."/jabatan");
    } catch (PDOException $e){
      $_SESSION['err'] = 'Jabatan sudah ada !';
      return header("location:".BASEURL."/jabatan/index/$nama_baru/$nilai/$nama_lama");
    }
  }

  public function hapusJabatan(){

  }
}