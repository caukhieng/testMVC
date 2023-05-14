<?php 
    include_once __DIR__ . '/../models/contractModel.php';

    $db= new Database();

    $query = "SELECT * From hopdongthue as a 
    left join phongtro as b on a.MaPhongTro = b.MaPhongTro 
    left join khachtro as c on a.MaKhachTro = c.MaKhachTro 
    left join nhatro as d on d.MaNhaTro = b.MaNhaTro
    where not a.visible = '2' 
    and not CURDATE()>DATE_ADD(a.ngaynhanphong, INTERVAL 3 DAY)
    and a.MaKhachTro={$_GET['idUser']} and a.MaPhongTro ={$_GET['idPhongTro']}";

    $res = $db->select($query);
    if(!$res){
        echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . 'transaction">';
        echo "<script language='javascript'>alert('Chức năng này không thể thực hiện được');</script>";
        exit;
    }

    $motelModel = new contractModel();
    $result = $motelModel->updateHistory($_GET['idPhongTro'],$_GET['idUser']);

    // $motel->render($result);
    if($result){
        echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . 'transaction">';
    }
    else{
        //
        echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . 'historybill">';
        echo "<script language='javascript'>alert('Chức năng này không thể thực hiện được');</script>";
    }

?>