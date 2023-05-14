<?php 
include_once __DIR__ . '/../models/evallandlordModel.php';
// require __DIR__ . '/../vendor/autoload.php';
// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();
class evallandlordView{
    public function render()
    {?>    
    <div class="center">
        <div class="container">
            <h3 class="heading">
                Phiếu Đánh Giá Khách Trọ
            </h3>
        </div>
        <form action="" method="POST" class="form" id="form-1">
            <table style="width:100%">  
                <tr>
                <th style="width: 60%; text-align: center;" >Nội Dung</th>
                <th style="text-align: center;">Điểm Đánh Giá</th>
                
                </tr>

                <tr>
                <td>- Khách trọ giữ gìn vệ sinh môi trường </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr1" value="0">0</label>
                    <label><input type="radio" name="optr1" value="2">2</label>
                    <label><input type="radio" name="optr1" value="4">4</label>
                    <label><input type="radio" name="optr1" value="6">6</label>
                    <label><input type="radio" name="optr1" value="8">8</label>
                    <label><input type="radio" name="optr1" value="10">10</label>
                    </div>
                </td>
                </tr>

                <tr>
                <td>- Khách trọ có giữ gìn an ninh trật tự </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr2" value="0">0</label>
                    <label><input type="radio" name="optr2" value="2">2</label>
                    <label><input type="radio" name="optr2" value="4">4</label>
                    <label><input type="radio" name="optr2" value="6">6</label>
                    <label><input type="radio" name="optr2" value="8">8</label>
                    <label><input type="radio" name="optr2" value="10">10</label>
                    </div>
                </td>
                </tr>

                <tr>
                <td>- Khách trọ có chấp hành luật pháp trong thời gian thuê </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr3" value="0">0</label>
                    <label><input type="radio" name="optr3" value="2">2</label>
                    <label><input type="radio" name="optr3" value="4">4</label>
                    <label><input type="radio" name="optr3" value="6">6</label>
                    <label><input type="radio" name="optr3" value="8">8</label>
                    <label><input type="radio" name="optr3" value="10">10</label>
                    </div>
                </td>
                </tr>

                <tr>
                <td>- Khách trọ có thái độ thân thiện </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr4" value="0">0</label>
                    <label><input type="radio" name="optr4" value="2">2</label>
                    <label><input type="radio" name="optr4" value="4">4</label>
                    <label><input type="radio" name="optr4" value="6">6</label>
                    <label><input type="radio" name="optr4" value="8">8</label>
                    <label><input type="radio" name="optr4" value="10">10</label>
                    </div>
                </td>
                </tr>

                <tr>
                <td>- Khách trọ đóng tiền thuê đúng hẹn </td>
                <td>
                    <div class="radio">

                    <label><input type="radio" name="optr5" value="0">0</label>
                    <label><input type="radio" name="optr5" value="2">2</label>
                    <label><input type="radio" name="optr5" value="4">4</label>
                    <label><input type="radio" name="optr5" value="6">6</label>
                    <label><input type="radio" name="optr5" value="8">8</label>
                    <label><input type="radio" name="optr5" value="10">10</label>              
                    </div>
                </td>
                </tr>
                <tr>

                <tr>
                <td>- Khách trọ giũ gỉn tài sản chung, công cộng </td>
                <td>
                    <div class="radio">

                    <label><input type="radio" name="optr6" value="0">0</label>
                    <label><input type="radio" name="optr6" value="2">2</label>
                    <label><input type="radio" name="optr6" value="4">4</label>
                    <label><input type="radio" name="optr6" value="6">6</label>
                    <label><input type="radio" name="optr6" value="8">8</label>
                    <label><input type="radio" name="optr6" value="10">10</label>              
                    </div>
                </td>
                </tr>

                <tr>
                <td>- Khách trọ có văn hóa đạo đức tốt </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr7" value="0">0</label>
                    <label><input type="radio" name="optr7" value="2">2</label>
                    <label><input type="radio" name="optr7" value="4">4</label>
                    <label><input type="radio" name="optr7" value="6">6</label>
                    <label><input type="radio" name="optr7" value="8">8</label>
                    <label><input type="radio" name="optr7" value="10">10</label>
                    </div>
                </td>
                </tr>

            </table>
            <button type="submit" name="submit" class="form-submit">Lưu</button>
        </form>
    </div>
<?php 
    }
}
class evallandlordController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        $evallandlord = new evallandlordView();
        $evallandlordModel= new evallandlordModel();
        $evallandlord->render();
        if (isset($_POST['submit'])) {
            // $email = trim($_POST['email']);
            $op1 = trim($_POST['optr1']);
            $op2 = trim($_POST['optr2']);
            $op3 = trim($_POST['optr3']);
            $op4 = trim($_POST['optr4']);
            $op5 = trim($_POST['optr5']);
            $op6 = trim($_POST['optr6']);
            $op7 = trim($_POST['optr7']);

            $id = $_GET['idDanhGia'];
            $result = $evallandlordModel->createEvalLandLord($id,$op1,$op2,$op3,$op4,$op5,$op6,$op7);
            if($result){
                echo "<script language='javascript'>alert('Cám ơn vì sự đánh giá của bãn');</script>";
                echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . 'homepage">';
                return true; 
            }

               
            echo "<script language='javascript'>alert('Xin lỗi bạn hệ thống đang gặp lỗi vì bạn chưa nhập đầy đủ thông tin".$optr2. " ');</script>";
            echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] .'evaluser?idDanhGia='.$_GET['idDanhGia'].'">';
            return false;
        }else {
            return false;
        }
    }
}
?>