<?php 

class StatusModel {
  private $table = 'status';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAllStatus(){
    $this->db->query("SELECT * FROM $this->table");
    return $this->db->resultSet();
  }
}