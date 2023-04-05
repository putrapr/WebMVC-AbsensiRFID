<?php

class PenggunaModel {
  private $table = 'pengguna';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function validate($user, $pass){
    $this->db->query("SELECT * FROM $this->table 
                      WHERE username = '$user' AND password = '$pass'");
    return $this->db->resultSet();
  }
  
}