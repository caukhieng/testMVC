<?php 
include_once __DIR__ . '/../models/reviewsModel.php';

class commentsView{
    public function renders()
        {?>    
    <div class="container">      
        <form method="POST" class="form" id="form-2">
            <div class="group-cm">
                <textarea name="txtContent" rows="1" pattern=".{10,1000}" maxlength="1000" minlength="10" required="required" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity(this.validity.valueMissing ? 'Vui lòng điền vào trường này.' : 'Nội dung tối thiểu 10 ký tự.')" placeholder="Mời bạn bình luận hoặc đặt câu hỏi" class="extend"></textarea>
            </div>                 
            <?php if (isset($_SESSION['user_id'])) { ?>
            
 
            <div class="box-cmt-item">
                
                <input name="txtEmail" type="text" value="<?php echo $_SESSION['user_name']; ?>" maxlength="50" placeholder="Tên hoặc Email" class="form-control" readonly>
            </div>    
            <div class="dcap">
                <button type="submit" class="submit box-cmt-item btn-send" name="submit2">GỬI</button>              
            </div>

            <?php } else { ?>
                <div class="box-cmt-item">
                
                    <input name="txtEmail" type="text" maxlength="50" placeholder="Tên hoặc Email" class="form-control" readonly>
                </div>    
                <div class="dcap">
                    <button class="submit box-cmt-item btn-send"  name="submit2" ><a class="help-submit" href="http://localhost/phpmvc/login"> GỬI</a></button>
                    <!--               -->
                </div>
            <?php } ?>
                
            
        </form>       
    </div>
<?php 
}}
class commentController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        
        // $reviews = $reviewsModel->getAllReviews($_GET['idPhongTro']);
        $commentsView = new commentsView();
        $commentsView->renders();
        if (isset($_POST['submit2'])) {
            $con = trim($_POST['txtContent']);
            
            $idP= $_GET['idPhongTro'];
            $idU = $_SESSION['user_id'];
            $reviewsModel = new reviewsModel();
            $rescheck = $reviewsModel->addReviews($idP,$idU, $con);

            if ($rescheck) {
                // Redirecting the user to the login page.idNhaTro
                // echo 'http://localhost/phpmvc/indetails?idPhongTro='.$_GET['idPhongTro'].'&idNhaTro='.$_GET['idNhaTro'].'';
                echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . 'homepage">';
            }else{
                echo '<meta http-equiv="refresh" content="0;url=login">';
            }
        }
        else{
            // echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'].'">';
            return false;
        }
    }
}
?>