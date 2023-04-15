<?php 

class JabatanModel {
  private $table = 'jabatan';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAllJabatanOrder($column, $order = "", $int = "",){
    $this->db->query("SELECT * FROM $this->table ORDER BY $column $order $int");
    return $this->db->resultSet();
  }

  public function insertJabatan($nama, $nilai){
    $this->db->query("INSERT INTO $this->table VALUES ('$nama', '$nilai')");
    return $this->db->resultSet();
  }

  public function updateJabatan($nama_lama, $nama_baru, $nilai){
    $this->db->query("UPDATE $this->table SET nama_jabatan='$nama_baru', hirarki_jabatan='$nilai' 
                      WHERE nama_jabatan='$nama_lama'");
    return $this->db->resultSet();
  }

  public function deleteJabatan($nama_lama){
    $this->db->query("DELETE FROM $this->table WHERE nama_jabatan='$nama_lama'");
    return $this->db->resultSet();
  }
}