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
    // public function __construct($id, $idMotel, $description, $price, $area, $roomNumber)
    // {
    //     $this->id = $id;
    //     $this->idMotel = $idMotel;
    //     $this->description = $description;
    //     $this->price = $price;
    //     $this->area = $area;
    //     $this->roomNumber = $roomNumber;
    // }
    public function getAllRooms() {
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
}
?>