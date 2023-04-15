<?php

class ScanController extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) return header('location:'.BASEURL);
    $data['judul'] = 'Scan Kartu';
    $data['nav'] = 'Scan Kartu';

    $this->view('layout/header', $data);
    $this->view('scan/index');
    $this->view('layout/footer');
  }
}
