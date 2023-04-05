<?php 

class HarianController extends Controller {

  public function index() {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Absensi Harian';
    $data['nav'] = 'Absensi Harian';
    $data['absensi'] = $this->model('AbsensiModel')->getAbsensiHariIni('karyawan','nokartu');
    $this->view('layout/header', $data);
    $this->view('harian/index', $data);
    $this->view('layout/footer');
  }
}