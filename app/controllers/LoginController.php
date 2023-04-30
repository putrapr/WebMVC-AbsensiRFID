<?php 

class LoginController extends Controller {
  public function index() {
    if (isset($_SESSION['login'])) session_unset();
    $data['judul'] = 'Login';
    $this->view('login/index');
  }
  
  public function validasi(){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $login = $this->model('PenggunaModel')->validate($user, $pass);
    if ($login){
      // Jika login berhasil      
      $_SESSION['login'] = $login[0]['id'];
      header('location:'.BASEURL.'/beranda');
    } else {
      // Jika login gagal
      echo "<meta http-equiv='refresh' content='0; url=".BASEURL."'>";
      echo "<script>alert('Username / Password Salah !');</script>";
    }
  }
}