<?php
include_once __DIR__ . '/../models/contractModel.php';
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class myhistoryView
{
    public function render($myhistory)
    {

        ?>    
    <div class="container">
        <h3 class="heading">
            Lịch Sử
        </h3>
    </div>        
<table>
  <tr>
    <th>STT</th>
    <th>Nhà Trọ</th>
    <th>Phòng Trọ</th>
    <th>Ngày Nhận Phòng</th>
    <th>Ngày Trả Phòng</th>
    <th>Ngày Lập Hóa Đơn</th>
    <th>Tổng Tiền</th>
    <th>Trạng Thái</th>
  </tr>
  <?php
        if(isset($_SESSION['user_idNum']))
            {          
                $STT =1;      
        foreach ($myhistory as $row)
        {
            ?>  
  <tr>
    <td><?php echo $STT++; ?></td>
    <td><?php echo $row['DiaChi']; ?></td>
    <td><?php echo $row['SoPhong']; ?></td>
    <td><?php echo $row['ngaynhanphong']; ?></td>
    <td><?php echo $row['ngaytraphong']; ?></td>
    <td><?php echo $row['ngaylaphoadon']; ?></td>
    <td><?php echo $row['thanhtien']; ?> VNĐ</td>
    <td>
        <?php 
            $db = new Database();
            $query = "SELECT * From hopdongthue as a 
                left join phongtro as b on a.MaPhongTro = b.MaPhongTro 
                left join khachtro as c on a.MaKhachTro = c.MaKhachTro 
                left join nhatro as d on d.MaNhaTro = b.MaNhaTro
                where not a.visible = 2 
                and a.MaKhachTro={$_SESSION['user_idNum']} and a.MaPhongTro={$row['MaPhongTro']}";
            $res = $db->select($query);
            if($res){
                echo "Thành Công";
            }
            else{
                echo "Đã Hủy";
            }
        ?>
    </td>


  <?php 

            }        
  
    }
  ?>
</table>
<?php
    }
}
class myhistoryController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        $id=$_SESSION['user_idNum'];
        $contractModel = new contractModel();
        $myhistory = $contractModel->myhistoryContract($id);
        $myhistoryView = new myhistoryView();

        $myhistoryView->render($myhistory);
    }
}
?>