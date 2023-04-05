<?php 

class BerandaController extends Controller {
  public function index() {    
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Beranda';
    $data['nav'] = '';
    // $data['nama'] = $this->model('PenggunaModel')->getUser();
    $this->view('layout/header', $data);
    $this->view('beranda/index');
    $this->view('layout/footer');
  }
}