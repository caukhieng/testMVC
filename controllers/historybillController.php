<?php
include_once __DIR__ . '/../models/contractModel.php';
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class historybillView
{
    public function render($historybill)
    {

        ?>     
    <div class="container">
        <h3 class="heading">
            Đặt Phòng
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
    <th>Hủy</th>
  </tr>
  <?php
        if(isset($_SESSION['user_idNum']))
            {          
                $STT =1;      
        foreach ($historybill as $row)
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
        <a href="<?php echo $_ENV['URL']; ?>cancelhistorybill?idPhongTro=<?php echo $row['MaPhongTro']; ?>&idUser=<?php 
            $id=$_SESSION['user_idNum'];
            echo $id;
            ?>">Hủy
        </a>


  <?php 

            }        
  
    }
  ?>
</table>
<?php
    }
}
class historybillController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        $id=$_SESSION['user_idNum'];
        $contractModel = new contractModel();
        $historybill = $contractModel->historyContract($id);
        $historyView = new historybillView();

        $historyView->render($historybill);
    }
}
?>

