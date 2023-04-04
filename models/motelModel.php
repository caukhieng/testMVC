<?php
    include_once('../libs/database.php');
class motelModel
{
    private $db;
    private $idMotel;
    private $addressMotel;
    private $description;
    private $idOwner;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllMotels($idOwner){
        $query = "SELECT * FROM nhatro where MaChuTro = $idOwner";
        $result = $this->db->select($query);
        if (!$result) {
            echo "Database Error: " . $this->db->error;
            exit;
          }
          $motels = array();
          while ($row = $result->fetch_assoc()) {
            $motels[] = $row;
          }
          return $motels;
    }
    public function addMotel($addressMotel, $description, $idOwner)
    {
        $query = "INSERT INTO nhatro (DiaChi, MoTaNhaTro, MaChuTro) VALUES ('$addressMotel', '$description', $idOwner)";
        $result = $this->db->insert($query);
        if($result) return true;
        else return false;
    }
    public function getDetails($idMotel)
    {
        $query = "SELECT * FROM nhatro where MaNhaTro = $idMotel";
        $result = $this->db->select($query);
        if (!$result) {
            echo "Database Error: ". $this->db->error;
            exit;
          }
          $motels = array();
          while ($row = $result->fetch_assoc()) {
            $motels[] = $row;
          }
          return $motels;
    }
}
?>