<?php

include_once __DIR__ . '/../libs/database.php';
include_once __DIR__ . '/../models/motelModel.php';
include_once __DIR__ . '/../models/roomModel.php';

class contractModel
{
    public $price;
    public $dateCreate;
    public $visible;
    public $dateTerminate;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createContract($idRoom, $idOwner, $idGuest, $price, $dateCreate, $method, $sdt)
    {
        $query = "INSERT INTO `hopdongthue`(`MaPhongTro`, `MaChuTro`, `MaKhachTro`, `thanhtien`, `ngaylaphoadon`, `MaPhuongThuc`, `sdt`)
        VALUES ('{$idRoom}', '{$idOwner}', '{$idGuest}', '{$price}', '{$dateCreate}', '{$method}', '{$sdt}')";
        $result = $this->db->insert($query);
        if (!$result) {
            return false;
        }

        return true;
    }
}
