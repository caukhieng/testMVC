<?php
    include_once('../libs/database.php');
class roomModel
{
    private $db;
    public $id;
    public $idMotel;
    public $description;
    public $price;
    public $area;
    public $roomNumber;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllRooms() 
    {
        $query = "SELECT * FROM phongtro";
        $result = $this->db->select($query);
        if (!$result) {
          echo "Database Error: " . $this->db->error;
          exit;
        }
        $rooms = array();
        while ($row = $result->fetch_assoc()) {
          $rooms[] = $row;
        }
        return $rooms;
    }
    public function addRoom($idMotel, $description, $price, $area, $roomNumber)
    {
      $query = "INSERT INTO phongtro (MaNhaTro, MoTaPhongTro, GiaThue, DienTich, SoPhong)
                VALUES($idMotel, '$description', '$price', '$area', '$roomNumber')";
      $result = $this->db->insert($query);
      if($result) return true;
      else return false;
    }
}
?>