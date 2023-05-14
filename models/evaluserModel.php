<?php

include_once __DIR__ . '/../libs/database.php';
include_once __DIR__ . '/../models/motelModel.php';
include_once __DIR__ . '/../models/roomModel.php';

class evaluserModel
{
    public $id;
    public $SachSe;
    public $NguonNuoc;
    public $KhongNgapNuoc;
    public $KhoaCua;
    public $CongToDien;
    public $NhaXe;
    public $HangXom;
    public $NhaChu;
    public $GiaNuocHopLy;
    public $GiaThueHopLy;
    // public $dateTerminate;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createEvalUser($id, $SachSe, $NguonNuoc, $KhongNgapNuoc, 
        $KhoaCua, $CongToDien, $NhaXe, $HangXom,$NhaChu,$GiaNuocHopLy, $GiaThueHopLy )
    {
        $avg= ($SachSe+ $NguonNuoc+ $KhongNgapNuoc+ $KhoaCua+ $CongToDien+ $NhaXe+ $HangXom+$NhaChu+$GiaNuocHopLy+ $GiaThueHopLy);
        $av = $avg/10;
// 
        $query = "UPDATE phieudanhgiaphongtro SET SachSe ='{$SachSe}', NguonNuoc='{$NguonNuoc}', 
        KhongNgapNuoc='{$KhongNgapNuoc}', KhoaCua='{$KhoaCua}',CongToDien='{$CongToDien}', 
        NhaXe='{$NhaXe}',HangXom='{$HangXom}', NhaChu='{$NhaChu}',GiaNuocHopLy='{$GiaNuocHopLy}',
        GiaThueHopLy='{$GiaThueHopLy}',AvgPhongTro='{$av}',  RoleEval=2, TimeEval= Now() WHERE IdEval = '{$id}';";
        $result = $this->db->update($query);
        if ($result) {
            // echo "<script>alert(".$result.")</script>";
            return true;
        }
        return false;
        
    }

    public function userEval($idKhach)
    {

        $query = "SELECT * From phieudanhgiaphongtro as a 
        left join chutro as b on b.MaChuTro = a.MaChuTro 
        left join khachtro as c on c.MaKhachTro = a.MaKhachTro 
        left join phongtro as d on d.MaPhongTro = a.MaPhongTro 
        left join nhatro as e on e.MaNhaTro = d.MaNhaTro
        where not a.RoleEval = 2 and a.MaKhachTro={$idKhach} ORDER BY a.IdEval DESC;";
        
        $result = $this->db->select($query);
        if (!$result) {
            echo '<div class="container" ><p style="margin:30px 0">Hiện tại chưa có phiếu đánh giá</p></div>';
            return;
        }
        $evaluser = [];
        while ($row = $result->fetch_assoc()) {
            $evaluser[] = $row;
        }

        return $evaluser;
        
    }

}