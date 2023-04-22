<?php 
    include_once(__DIR__ . '/../models/accountModel.php');
    class accountView
    {
        public function render()
        {?>
           <div class="container">
        <div class="center">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Thành viên đăng ký</h3>
            <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span> ❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Nhập mật khẩu</label>
              <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Nhập lại mật khẩu</label>
              <input id="password" name="comfirmpassword" type="password" placeholder="Nhập lại mật khẩu" class="form-control" required autofocus>
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

            <button type="submit" name="submit" class="form-submit">Đăng ký</button>
            <a href="login" class="register">Đăng nhập tại đây</a><br>
          </form>
        </div>
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
                $password = trim($_POST['password']);
                $comfirmPassword = trim($_POST['comfirmpassword']);
                $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // regular expression pattern for email address
                $role = $_POST['role'];
                 // VALIDATE PASSWORD
                $uppercase = preg_match('@[A-Z]@', $comfirmPassword);
                $lowercase = preg_match('@[a-z]@', $comfirmPassword);
                $number    = preg_match('@[0-9]@', $comfirmPassword);
                // $specialChars = preg_match('@[^\w]@', $comfirmPassword);
                // VALIDATE PASSWORD
                if(!$uppercase || !$lowercase || !$number || strlen($comfirmPassword) < 6) {
                    $errorMessage = "Mật khẩu phải có ít nhất 6 ký tự, 1 chữ số, 1 chữ hoa";
                    echo "<script language='javascript'>document.querySelector('#form-1 #password + span.form-message').textContent = '$errorMessage';</script>";
                    return;
                }
                if($password === '' || $password !== $comfirmPassword) {
                    $errorMessage = "Vui lòng kiểm tra lại mật khẩu";
                    echo "<script language='javascript'>document.querySelector('#form-1 #password + span.form-message').textContent = '$errorMessage';</script>";
                    return;
                }
                if(!preg_match($pattern, $email)){
                    $errorMessage = "Vui lòng kiểm tra lại email.";
                    echo "<script language='javascript'>document.querySelector('#form-1 #email + span.form-message').textContent = '$errorMessage';</script>";
                    return;
                }
                $accountModel = new accountModel();
                $check = $accountModel->foundUser($email);
                if($check){
                    $errorMessage = "Tài khoản đã tồn tại";
                    echo "<script language='javascript'>document.querySelector('#form-1 #email + span.form-message').textContent = '$errorMessage';</script>";
                    return;
                }
                $addUser = $accountModel->register($email, $password, $role);
                if($addUser){
                    $_SESSION['user_mail'] = $email;
                    echo '<meta http-equiv="refresh" content="0;url=verify">'; //going to verify page
                }
                else {
                    echo '<meta http-equiv="refresh" content="0;url=notfound">'; //we're going to brazil
                }
            }
            else {
                // i don't know how to fix this so ok
                // echo "<script language='javascript'>alert('already');</script>";
                return false;
            }
        }
    }