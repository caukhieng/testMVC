<?php

include_once __DIR__ . '/../libs/database.php';
include_once __DIR__ . '/../models/pictureModel.php';

class roomModel
{
    public $id;
    public $idMotel;
    public $description;
    public $price;
    public $area;
    public $roomNumber;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllRooms()
    {
        
        // $rowCount = $db->query('SELECT count(*) FROM phongtro');

// pass number of records to
        // $pages->set_total($rowCount); 
        $query = "SELECT phongtro.*, picture.url, nhatro.DiaChi
              FROM phongtro
              Left join nhatro on nhatro.MaNhaTro = phongtro.MaNhaTro
              Left join hopdongthue on hopdongthue.MaPhongTro =phongtro.MaPhongTro
              LEFT JOIN (
              SELECT MaPhongTro, url
              FROM picture
              ORDER BY RAND()
              LIMIT 1 ) picture
              ON phongtro.MaPhongTro = picture.MaPhongTro ";
        $result = $this->db->select($query);
        if (!$result) {
            echo 'Database Error: ' . $this->db->error;
            exit;
        }
        $rooms = [];
        while ($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }

        return $rooms;
    }

    public function getRoom($id)
    {
        $query = "SELECT phongtro.*, picture.id, picture.url, nhatro.DiaChi as DiaChiNhaTro 
              FROM phongtro
              LEFT JOIN (
                  SELECT id, url, MaPhongTro
                  FROM picture
                  ORDER BY RAND() > 0 DESC
                LIMIT 1
              ) AS picture ON phongtro.MaPhongTro = picture.MaPhongTro
              LEFT JOIN nhatro ON phongtro.MaNhaTro = nhatro.MaNhaTro
              WHERE nhatro.MaNhaTro = '{$id}'
              ORDER BY phongtro.MaPhongTro ASC";
        $result = $this->db->selectWithoutDebug($query);
        if (!$result) {
            return null;
        }

        return $result;
    }

    public function getRoomDebug($id)
    {
        $query = "SELECT phongtro.*, picture.url, count(reviews.MaReviews) as LuotBinhLuan
              FROM phongtro
              left join reviews on reviews.MaPhongTro = phongtro.MaPhongTro 
              LEFT JOIN picture ON phongtro.MaPhongTro = picture.MaPhongTro
              WHERE phongtro.MaPhongTro = {$id}
              ORDER BY RAND()
              LIMIT 1";
        $result = $this->db->select($query);
        if (!$result) {
            return null;
        }

        return $result;
    }

    public function getRoomInfo($id)
    {
        $query = "SELECT * FROM phongtro where MaPhongTro = {$id}";
        $result = $this->db->select($query);
        if (!$result) {
            return null;
        }

        return $result;
    }

    public function addRoom($idMotel, $description, $price, $area, $roomNumber,)
    {
        $query = "INSERT INTO phongtro (MaNhaTro, MoTaPhongTro, GiaThue, DienTich, SoPhong)
              VALUES({$idMotel}, '{$description}', '{$price}', '{$area}', '{$roomNumber}')";
        $result = $this->db->insert($query);
        if ($result) {
            return true;
        }

        return false;
    }

    public function updateRoom($id, $description, $price, $area, $roomNumber)
    {
        $query = "UPDATE phongtro SET
    MoTaPhongtro = '{$description}', GiaThue = '{$price}', DienTich = '{$area}`', SoPhong = '{$roomNumber}'
    WHERE MaPhongTro = {$id}";
        $result = $this->db->update($query);
        if (!$result) {
            return false;
        }

        return true;
    }

    public function findRoom($searchValue)
    {
        $query = "SELECT pt.MaPhongTro, pt.MaNhaTro, pt.MoTaPhongTro, pt.GiaThue, pt.DienTich, pt.SoPhong 
              FROM phongtro pt
              JOIN nhatro nt ON pt.MaNhaTro = nt.MaNhaTro
              WHERE nt.DiaChi LIKE '%{$searchValue}%'";
        $result = $this->db->select($query);
        if (!$result) {
            return false;
        }

        return $result;
    }

    public function getRoomWithName($id)
    {
        $query = "SELECT phongtro.*, chutro.MaChuTro, chutro.Ten
        FROM phongtro
        JOIN nhatro ON phongtro.MaNhaTro = nhatro.MaNhaTro
        JOIN chutro ON nhatro.MaChuTro = chutro.MaChuTro
        WHERE phongtro.MaPhongTro = {$id}";
        $result = $this->db->select($query);
        if (!$result) {
            return false;
        }

        return $result;
    }
}
