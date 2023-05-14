<?php

include_once __DIR__ . '/../libs/database.php';
include_once __DIR__ . '/../models/motelModel.php';
include_once __DIR__ . '/../models/roomModel.php';

class evallandlordModel
{
    public $id;
    public $MoiTruong;
    public $AnNinh;
    public $LuatPhap;
    public $ThaiDo;
    public $TienDungHen;
    public $TaiSanChung;
    public $VanHoaDaoDuc;

    // public $dateTerminate;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createEvalLandLord($id, $MoiTruong, $AnNinh, $LuatPhap, 
    $ThaiDo, $TienDungHen, $TaiSanChung, $VanHoaDaoDuc )
    {
        $avg= ($MoiTruong+ $AnNinh+ $LuatPhap+ $ThaiDo+ $TienDungHen+ $TaiSanChung+ $VanHoaDaoDuc);
        $av = $avg/10;
// 
        $query = "UPDATE phieudanhgiakhachtro SET MoiTruong ='{$MoiTruong}', AnNinh='{$AnNinh}', 
        LuatPhap='{$LuatPhap}', ThaiDo='{$ThaiDo}',TienDungHen='{$TienDungHen}', 
        TaiSanChung='{$TaiSanChung}',VanHoaDaoDuc='{$VanHoaDaoDuc}',AvgKhachTro='{$av}',
        RoleEvalKhachTro=2, TimeEvelAbove= Now() WHERE id = '{$id}';";
        $result = $this->db->update($query);
        if ($result) {
            // echo "<script>alert(".$result.")</script>";
            return true;
        }
        return false;
        
    }

    public function landlordEval($idChu)
    {

        $query = "SELECT * From phieudanhgiakhachtro as a 
        left join chutro as b on b.MaChuTro = a.MaChuTro 
        left join khachtro as c on c.MaKhachTro = a.MaKhachTro 
        left join phongtro as d on d.MaPhongTro = a.MaPhongTro 
        left join nhatro as e on e.MaNhaTro = d.MaNhaTro
        where not a.RoleEvalKhachTro = 2 and a.MaChuTro={$idChu} ORDER BY a.id DESC;";
        
        $result = $this->db->select($query);
        if (!$result) {
            echo '<div class="container" ><p style="margin:30px 0">Hiện tại chưa có phiếu đánh giá</p></div>';
            return;
        }
        $evallandlord = [];
        while ($row = $result->fetch_assoc()) {
            $evallandlor[] = $row;
        }

        return $evallandlor;
        
    }

}