<?php

class roomModel
{
    private $db = new Database();
    public $id;
    public $idMotel;
    public $description;
    public $price;
    public $area;
    public $roomNumber;
    public function __construct()
    {
        //empty
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
    public function getAllRooms()
    {
        $sql = "SELECT * FROM phongtro";
        $query = $this->db->select($sql);
        $result = $query->fetch_assoc();
        return $result;
    }
}
?>