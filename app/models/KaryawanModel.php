<?php 

class KaryawanModel {
  private $table = 'karyawan';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAllKaryawan(){
    $this->db->query("SELECT * FROM $this->table");
    return $this->db->resultSet();
  }

  public function getAllKaryawanJoinOrder($table2, $fkey1, $fkey2, $column, $order = 'ASC'){
    if ($fkey2==="") $fkey2 = $fkey1;
    $this->db->query("SELECT * FROM $this->table JOIN $table2 ON 
                      $this->table.$fkey1 = $table2.$fkey2 ORDER BY $column $order");
    return $this->db->resultSet();
  }

  public function getSingleKaryawan($nokartu){
    $this->db->query("SELECT * FROM $this->table WHERE nokartu='$nokartu'");
    return $this->db->resultSet();
  }

  public function insertKaryawan($nokartu, $nama, $jabatan, $telp, $alamat){
    $this->db->query("INSERT INTO $this->table VALUES ('$nokartu', '$nama', '$jabatan', '$telp', '$alamat')");
    return $this->db->resultSet();
  }

  public function updateKaryawan($nokartu, $nama, $jabatan, $telp, $alamat){
    $this->db->query("UPDATE $this->table SET nama='$nama', jabatan='$jabatan', telp='$telp', alamat='$alamat' 
                      WHERE nokartu='$nokartu'");
    return $this->db->resultSet();
  }

  public function deleteKaryawan($nokartu){
    $this->db->query("DELETE FROM $this->table WHERE nokartu='$nokartu'");
    return $this->db->resultSet();
  }

  public function getNoKartuWhereNama($nama) {
    $this->db->query("SELECT nokartu FROM $this->table WHERE nama='$nama'");
    return $this->db->resultSet();
  }
}