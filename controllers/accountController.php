<?php 
    include_once(__DIR__ . '/../models/accountModel.php');
    class accountView
    {
        public function render()
        {?>
        </div>
        <div class="main">
          <div class="container">
            <div class="center">
            <form action="" method="POST" class="form" id="form-2">
                <h3 class="heading">Đăng nhập</h3>
                <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span> ❤️</p>

                <div class="spacer"></div>
                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" required autofocus>
                  <span class="form-message"></span>
                </div>

                <div class="form-group">
                  <label for="passwordUser" class="form-label">Mật khẩu</label>
                  <input id="passwordUser" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" required autofocus>
                  <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="" class="form-label">
                        Chọn loại tài khoản
                    </label>
                    <select name="role" id="" class="form-control" required autofocus>
                        <option value="">-- Chọn tài khoản --</option>
                        <option value="0">Chủ trọ</option>
                        <option value="1">Khách trọ</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="form-submit">Đăng nhập</button>
                <a href="register.php" class="register">Đăng ký tài khoản tại đây!</a><br>
                Quên mật khẩu ? <a href="forgetPassword.php" class="register">Nhấn vào đây!</a>
            </form>
<?php
    }
}
class userController
{
    public function __invoke()
    {
        $accountView = new accountView();
        $accountView->render();

        if(isset($_POST['submit'])){
            $email = trim($_POST['email']);
            $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // regular expression pattern for email address
            $password = trim($_POST['password']);
            $accountModel = new accountModel();
            if(!preg_match($pattern, $email)){
                $errorMessage = "Vui lòng kiểm tra lại email.";
                echo "<script language='javascript'>document.querySelector('#form-1 #email + span.form-message').textContent = '$errorMessage';</script>";
                return;
            }
            $loginSuccessful = $accountModel->login($email, $password);
            if($loginSuccessful){
                $userid = $_SESSION['user_id'];
                if($_SESSION['user_role'] == 0){
                    $query = "SELECT * FROM chutro where MaAccount = '$userid'";
                    $db = new Database();
                    $user = $db->select($query)->fetch_assoc();
                    $_SESSION['user_name'] = $user['Ten'];
                    $_SESSION['user_idNum'] = $user['MaChuTro'];
                    echo '<meta http-equiv="refresh" content="0;url=homepage.php">';
                }
                else if($_SESSION['user_role'] == 1){
                    $query = "SELECT * FROM khachtro where MaAccount = '$userid'";
                    $db = new Database();
                    $user = $db->select($query)->fetch_assoc();
                    $_SESSION['user_name'] = $user['Ten'];
                    $_SESSION['user_idNum'] = $user['MaKhachTro'];
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';

                }
                else {
                    echo '<meta http-equiv="refresh" content="0;url=notfound.php">';
                }
                // $redirect = $_SESSION['user_role'] == 0 ? 'index.php' : 'index.php';
                // header('Location:' . $redirect);
                // exit();
            } else {
                return false;
            }
        }
        else {
            // i don't know how to fix this so ok
            // echo "<script language='javascript'>alert('already');</script>";
            return false;
        }
    }
}
