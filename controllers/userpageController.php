<?php
include_once __DIR__ . '/../models/evaluserModel.php';
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class userpageView
{
    public function render($evaluser)
    {

        ?>            
    <div class="container">
        <h3 class="heading">
            Đánh Giá Phòng trọ
        </h3>
    </div>
<table>
  <tr>
    <th>STT</th>
    <th>Nhà Trọ</th>
    <th>Phòng Trọ</th>
    <th>Trạng Thái</th>
    <th>Đánh Giá</th>
  </tr>
  <?php
        if(isset($_SESSION['user_idNum']))
            {          
                $STT =1;      
        foreach ($evaluser as $row)
        {
            ?>  
  <tr>
    <td><?php echo $STT++; ?></td>
    <td><?php echo $row['DiaChi']; ?></td>
    <td><?php echo $row['SoPhong']; ?></td>
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
    <td>
        <a href = "<?php echo $_ENV['URL']; ?>evaluser?idDanhGia=<?php
            echo $row['IdEval']; ?>">Chưa Đánh Giá</a>
    </td>


  <?php 

            }        
  
    }    
    ?>

</table>
<?php
    }
}
class userpageController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        $id=$_SESSION['user_idNum'];
        $evaluserModel = new evaluserModel();
        $evaluser = $evaluserModel->userEval($id);
        $userpageView = new userpageView();

        $userpageView->render($evaluser);
    }
}
?>