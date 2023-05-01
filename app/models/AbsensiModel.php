<?php 

class AbsensiModel {
  private $table = 'absensi';
  private $templat = "AND hari_kerja = 'Ya' OR hari_kerja = 'Ya-Fix'";
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAbsensiHariIni($table2, $fkey1, $fkey2=""){
    if ($fkey2==="") $fkey2 = $fkey1;
    $tgl = date('Y-m-d');
    $this->db->query("SELECT * FROM $this->table JOIN $table2 ON $this->table.$fkey1=$table2.$fkey2
      WHERE tanggal = '$tgl' AND hari_kerja = 'Ya'");
    return $this->db->resultSet();
  }

  public function getAbsensiWhereTgl($bulan, $tahun, $hariKerja){
    $this->db->query("SELECT * FROM $this->table WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND hari_kerja = '$hariKerja'");
    return $this->db->resultSet();
  }

  public function getHariKerja($bulan, $tahun, $hariKerja=""){
    if ($hariKerja=="") $query = "SELECT DISTINCT(tanggal), hari_kerja FROM $this->table WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ORDER BY `tanggal` ASC";
    else $query = "SELECT DISTINCT(tanggal), hari_kerja FROM $this->table WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND hari_kerja = '$hariKerja' ORDER BY `tanggal` ASC";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getSingleAbsensiOrder($nokartu, $bulan, $tahun, $hariKerja, $order){
    $this->db->query("SELECT * FROM $this->table WHERE nokartu='$nokartu' 
      AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND hari_kerja = '$hariKerja' ORDER BY $order");
    return $this->db->resultSet();
  }

  public function updateKeterangan($nokartu, $keterangan, $tanggal){
    $this->db->query("UPDATE $this->table SET keterangan = '$keterangan' WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
    return $this->db->resultSet();
  }
  
  public function insertAbsensi($nokartu, $tanggal, $keterangan){
    $this->db->query("INSERT INTO $this->table (nokartu, tanggal, keterangan) VALUES ('$nokartu','$tanggal', '$keterangan')");
    return $this->db->resultSet();
  }

  public function updateHariKerja($tanggal, $hariKerja) {
    $this->db->query("UPDATE $this->table SET hari_kerja = '$hariKerja' WHERE tanggal = '$tanggal'");
    return $this->db->resultSet();
  }

  public function checkPermanentHari($bulan, $tahun){
    $this->db->query("SELECT id FROM $this->table WHERE MONTH(tanggal) = '$bulan' 
      AND YEAR(tanggal) = '$tahun' AND hari_kerja = 'Ya-Fix' LIMIT 1");
    return $this->db->resultSet();
  }

  public function updateToYaFix($bulan, $tahun){
    $this->db->query("UPDATE $this->table SET hari_kerja = 'Ya-Fix' 
      WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND hari_kerja = 'Ya'");
    return $this->db->resultSet();
  }

  public function deleteAbsensiWhere($bulan, $tahun){
    $this->db->query("DELETE FROM $this->table WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND hari_kerja = 'Tidak'");
    return $this->db->resultSet();
  }
}