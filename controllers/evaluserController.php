<?php 
include_once __DIR__ . '/../models/evaluserModel.php';
// require __DIR__ . '/../vendor/autoload.php';
// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();
class evaluserView{
    public function render()
    {?>    
    <div class="center">
        <div class="container">
            <h3 class="heading">
                Phiếu Đánh Giá Phòng trọ
            </h3>
        </div>
        <form action="" method="POST" class="form" id="form-1">
            <table style="width:100%">  
                <tr>
                <th style="width: 60%; text-align: center;" >Nội Dung</th>
                <th style="text-align: center;">Điểm Đánh Giá</th>
                
                </tr>
                <tr>
                <td>1. độ thoải mái và chất lượng vệ sinh môi trường</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td>- Phòng trọ thoáng mát sạch sẽ </td>
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
                <td>- Nước dùng sạch không mùi </td>
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
                <td>- Tình trạng phòng hay căn hộ không bị ngập khi trời mưa </td>
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
                <td>2. An ninh & trật tự</td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>- Cửa và cửa sổ chắc chắn, khóa cửa an toàn </td>
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
                <td>- Có công tơ điện trước cửa phòng - tiện theo dõi, tránh câu trộm, chỉnh công tơ </td>
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
                <td>- Có nhà xe an toàn miễn phí hoặc có giá dưới 150k/1 tháng </td>
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

                <td>3. Thái độ</td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>- Hàng xóm thân thiện, đàng hoàng </td>
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

                <tr>
                <td>- Nhà chủ dễ tính thân thiện </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr8" value="0">0</label>
                    <label><input type="radio" name="optr8" value="2">2</label>
                    <label><input type="radio" name="optr8" value="4">4</label>
                    <label><input type="radio" name="optr8" value="6">6</label>
                    <label><input type="radio" name="optr8" value="8">8</label>
                    <label><input type="radio" name="optr8" value="10">10</label>
                    </div>
                </td>
                </tr>

                <td>3. Giá cả</td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>- Giá cả điện nước hợp lý không cao hơn quá nhiều so với giá thị trường </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr9" value="0">0</label>
                    <label><input type="radio" name="optr9" value="2">2</label>
                    <label><input type="radio" name="optr9" value="4">4</label>
                    <label><input type="radio" name="optr9" value="6">6</label>
                    <label><input type="radio" name="optr9" value="8">8</label>
                    <label><input type="radio" name="optr9" value="10">10</label>
                    </div>
                </td>
                </tr>

                <tr>
                <td>- Giá cho thuê tốt không quá đắt so với các khu vực lân cận xung quanh </td>
                <td>
                    <div class="radio">
                    <label><input type="radio" name="optr10" value="0">0</label>
                    <label><input type="radio" name="optr10" value="2">2</label>
                    <label><input type="radio" name="optr10" value="4">4</label>
                    <label><input type="radio" name="optr10" value="6">6</label>
                    <label><input type="radio" name="optr10" value="8">8</label>
                    <label><input type="radio" name="optr10" value="10">10</label>
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
class evaluserController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        $evaluser = new evaluserView();
        $evaluserModel= new evaluserModel();
        $evaluser->render();
        if (isset($_POST['submit'])) {
            $op1 = trim($_POST['optr1']);
            $op2 = trim($_POST['optr2']);
            $op3 = trim($_POST['optr3']);
            $op4 = trim($_POST['optr4']);
            $op5 = trim($_POST['optr5']);
            $op6 = trim($_POST['optr6']);
            $op7 = trim($_POST['optr7']);
            $op8 = trim($_POST['optr8']);
            $op9 = trim($_POST['optr9']);
            $op10 = trim($_POST['optr10']);
            $id = $_GET['idDanhGia'];
            $result = $evaluserModel->createEvalUser($id,$op1,$op2,$op3,$op4,$op5,$op6,$op7,$op8,$op9,$op10);
            if($result){
                echo "<script language='javascript'>alert('Cám ơn vì sự đánh giá của bãn');</script>";
                echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . '">';
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
