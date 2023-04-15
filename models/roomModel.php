<?php
    include_once('../libs/database.php');
    include_once('../models/pictureModel.php');
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
        $query = "SELECT phongtro.*, picture.url
                FROM phongtro
                LEFT JOIN (
                SELECT MaPhongTro, url
                FROM picture
                ORDER BY RAND()
                LIMIT 1 ) picture
                ON phongtro.MaPhongTro = picture.MaPhongTro";
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
    public function getRoom($id)
    {
      $query = "SELECT phongtro.*, picture.url, nhatro.DiaChi as DiaChiNhaTro 
                FROM phongtro
                LEFT JOIN (
                  SELECT url, MaPhongTro FROM picture
                  GROUP BY MaPhongTro
                  ORDER BY RAND()
                ) picture ON phongtro.MaPhongTro = picture.MaPhongTro
                LEFT JOIN nhatro ON phongtro.MaNhaTro = nhatro.MaNhaTro
                WHERE nhatro.MaNhaTro = '$id'
                ORDER BY phongtro.MaPhongTro ASC";
      $result = $this->db->selectWithoutDebug($query);
      if (!$result) {
          return null;
      }
      return $result;
    }
    public function getRoomDebug($id)
    {
      $query = "SELECT phongtro.*, picture.url
                FROM phongtro
                LEFT JOIN picture ON phongtro.MaPhongTro = picture.MaPhongTro
                WHERE phongtro.MaPhongTro = '$id'
                ORDER BY RAND()
                LIMIT 1";
      $result = $this->db->select($query);
      if (!$result) {
          return null;
      }
      return $result;
    }
    public function addRoom($idMotel, $description, $price, $area, $roomNumber)
    {
      $query = "INSERT INTO phongtro (MaNhaTro, MoTaPhongTro, GiaThue, DienTich, SoPhong)
                VALUES($idMotel, '$description', '$price', '$area', '$roomNumber')";
      $result = $this->db->insert($query);
      if($result) return true;
      else return false;
    }
    public function updateRoom($id ,$description, $price, $area, $roomNumber)
    {
      $query = "UPDATE phongtro SET
      MoTaPhongtro = '$description', GiaThue = '$price', DienTich = '$area`', SoPhong = '$roomNumber'
      WHERE MaPhongTro = $id";
      $result = $this->db->update($query);
      if(!$result) return false;
      return true;
    }
}
?>