<?php 

class ScanController extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Scan Kartu';
    $data['nav'] = 'Scan Kartu';
    // $data['nama'] = $this->model('PenggunaModel')->getUser();
    $this->view('layout/header', $data);
    $this->view('scan/bacakartu');
    $this->view('layout/footer');
  }
}