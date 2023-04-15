<?php 

class IzinModel {
  private $table = 'izin';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAllIzinOrder($table2, $foreignT1, $foreignT2, $column, $order='ASC'){
    $this->db->query("SELECT * FROM $this->table JOIN $table2 ON $this->table.$foreignT1 = $table2.$foreignT2
    ORDER BY $column $order");
    return $this->db->resultSet();
  }

  public function getAllIzinPencarian($table2, $foreignT1, $foreignT2, $keyword){
    $this->db->query("SELECT * FROM $this->table JOIN $table2 ON $this->table.$foreignT1 = $table2.$foreignT2 
    WHERE nama LIKE '%$keyword%' 
    OR jenis_cuti LIKE '%$keyword%' 
    OR keterangan LIKE '%$keyword%' 
    OR dari_tgl LIKE '%$keyword%'");
    return $this->db->resultSet();
  }
  
  public function insertIzin($nokartu, $cuti, $ket, $dariTgl, $sampaiTgl){
    $this->db->query("INSERT INTO $this->table VALUES ('', '$nokartu', '$cuti', '$ket', '$dariTgl', '$sampaiTgl')");
    return $this->db->resultSet();
  }

  public function getSingleIzin($id){
    $this->db->query("SELECT * FROM $this->table WHERE id='$id'");
    return $this->db->resultSet();
  }

  public function updateIzin($id, $jenisCuti, $ket, $dariTgl, $sampaiTgl){
    $this->db->query("UPDATE $this->table SET jenis_cuti='$jenisCuti', keterangan='$ket', dari_tgl='$dariTgl', sampai_tgl='$sampaiTgl' 
                      WHERE id='$id'");
    return $this->db->resultSet();
  }

  public function deleteIzin($id){
    $this->db->query("DELETE FROM $this->table WHERE id='$id'");
    return $this->db->resultSet();
  }
}