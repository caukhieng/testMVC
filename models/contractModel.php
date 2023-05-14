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

    public function createContract($idRoom, $idOwner, $idGuest, $price, $dateCreate,$month, $method, $sdt)
    {

        $ngaynhan= date('Y-m-d', strtotime($dateCreate. ' + 3 days'));
        $ngaytra=$ngaynhan;
        $monthbill = $month;
        $bill = $month*$price;

        $query = "INSERT INTO `hopdongthue`(`MaPhongTro`, `MaChuTro`, `MaKhachTro`, `thanhtien`, `ngaylaphoadon`, `sothangthue`, `ngaynhanphong` , `ngaytraphong`, `MaPhuongThuc`, `sdt`)
        VALUES ('{$idRoom}', '{$idOwner}', '{$idGuest}', '{$bill}', '{$dateCreate}', '{$month}','{$ngaynhan}', DATE_ADD('{$ngaynhan}', INTERVAL +{$monthbill} MONTH), '{$method}', '{$sdt}')";
        
        $que = "INSERT INTO phieudanhgiaphongtro (MaChuTro, MaKhachTro, MaPhongTro, RoleEval) 
            VALUES ('{$idOwner}','{$idGuest}','{$idRoom}',1)";

        $q = "INSERT INTO phieudanhgiakhachtro (MaChuTro, MaKhachTro, MaPhongTro, RoleEvalKhachTro) 
            VALUES ('{$idOwner}','{$idGuest}','{$idRoom}',1)";
        
        $result = $this->db->insert($query);
        $res = $this->db->insert($que);
        $re = $this->db->insert($q);
        if (!$result) {
            return false;
        }
        
        if(!$res){
            return false;
        }

        if(!$re){
            return false;
        }
        return true;
    }

    public function foundContract($idRoom)
    {

        $query = "SELECT * From hopdongthue where 
        not visible = 2 and not CURDATE()>DATE_ADD(ngaytraphong, INTERVAL 1 DAY) 
        and MaPhongTro={$idRoom} ORDER BY id DESC LIMIT 1";
        
        $result = $this->db->select($query);
        if ($result) {
            echo "<script>alert('Phòng này đã có người đặt rồi')</script>";
            return false;   
        }

        return true;  
        
    }

    public function historyContract($id_KT)
    {
        $query = "SELECT * From hopdongthue as a 
        left join phongtro as b on a.MaPhongTro = b.MaPhongTro 
        left join khachtro as c on a.MaKhachTro = c.MaKhachTro 
        left join nhatro as d on d.MaNhaTro = b.MaNhaTro
        where not a.visible = '2' 
        and not CURDATE()>DATE_ADD(a.ngaytraphong, INTERVAL 1 DAY)
        and a.MaKhachTro={$id_KT}";

        $result = $this->db->select($query);
        if (!$result) {
            echo '<div class="container" ><p style="margin:30px 0">Hiện tại không có phòng nào được dặt</p></div>';
            return;
        }
        $historybill = [];
        while ($row = $result->fetch_assoc()) {
            $historybill[] = $row;
        }

        return $historybill;
        
    }

    public function myhistoryContract($id_KT)
    {
        $query = "SELECT * From hopdongthue as a 
        left join phongtro as b on a.MaPhongTro = b.MaPhongTro 
        left join khachtro as c on a.MaKhachTro = c.MaKhachTro 
        left join nhatro as d on d.MaNhaTro = b.MaNhaTro
        where a.MaKhachTro={$id_KT}";

        $result = $this->db->select($query);
        if (!$result) {
            echo '<div class="container" ><p style="margin:30px 0">Hiện tại không có phòng nào được dặt</p></div>';
            return;
        }
        $historybill = [];
        while ($row = $result->fetch_assoc()) {
            $historybill[] = $row;
        }

        return $historybill;
        
    }

    public function updateHistory($idPhong, $idUser)
    {
        $query = "UPDATE `hopdongthue` SET `visible`='2' WHERE MaKhachTro ='{$idUser}' and MaPhongTro ='{$idPhong}'";
        // $query = "SELECT * FROM account WHERE Email = '$email'";
        $result = $this->db->update($query);
        if ($result) {
            // echo 'http://localhost/phpmvc/';
            return true;
        }
        echo "<script>alert('Không thể xóa');</script>";
        return false;
    }

    public function totalContract()
    {

        $query = "SELECT Sum(hopdongthue.thanhtien) as Tong From hopdongthue where visible='1'";

        $result = $this->db->select($query);
        if (!$result) {
            exit;
        }
        $motels = [];
        while ($row = $result->fetch_assoc()) {
            $motels[] = $row;
        }

        return $motels; 
        
    }

    public function bookroomContract()
    {

        $query = "SELECT Count(hopdongthue.id) as Dat From hopdongthue";
        $result = $this->db->select($query);
        if (!$result) {
            exit;
        }
        $motels = [];
        while ($row = $result->fetch_assoc()) {
            $motels[] = $row;
        }

        return $motels; 
        
        
    }

    public function endroomContract()
    {

        $query = "SELECT Count(hopdongthue.id) as Huy From hopdongthue where visible='2'";
        $result = $this->db->select($query);
        if (!$result) {
            exit;
        }
        $motels = [];
        while ($row = $result->fetch_assoc()) {
            $motels[] = $row;
        }

        return $motels; 
        
        
    }

}
