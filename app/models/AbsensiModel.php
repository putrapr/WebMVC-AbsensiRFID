<?php 

class AbsensiModel {
  private $table = 'absensi';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAbsensiHariIni($table2, $fkey1, $fkey2=""){
    if ($fkey2==="") $fkey2 = $fkey1;
    $tgl = date('Y-m-d');
    $this->db->query("SELECT * FROM $this->table JOIN $table2 ON $this->table.$fkey1=$table2.$fkey2
                      WHERE tanggal = '$tgl'");
    return $this->db->resultSet();
  }

  public function getAbsensiWhereTgl($bulan, $tahun){
    $this->db->query("SELECT * FROM $this->table 
                      WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
    return $this->db->resultSet();
  }

  public function getSingleAbsensiOrder($nokartu, $bulan, $tahun, $order){
    $this->db->query("SELECT * FROM $this->table 
                      WHERE nokartu='$nokartu' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' 
                      ORDER BY $order");
    return $this->db->resultSet();
  }
  
  public function getAllKeterangan(){
    $this->db->query("SELECT DISTINCT(keterangan) FROM $this->table");
    return $this->db->resultSet();
  }

  public function updateKeterangan($nokartu, $keterangan, $tanggal){
    $this->db->query("UPDATE $this->table SET keterangan = '$keterangan' 
                      WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
    return $this->db->resultSet();
  }
}