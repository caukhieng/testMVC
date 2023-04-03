<?php
    include_once(__DIR__ . '/../models/accountModel.php');
    class verifyView
    {
        public function render()
        {?>
        <div class="container">
        <div class="center">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Xác nhận OTP</h3>
            <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span>❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
              <label for="password" class="form-label">Nhập OTP đã nhận</label>
              <input id="otp" name="otp" type="text" placeholder="OTP" class="form-control">
              <span class="form-message"></span>
            </div>

            <button type="submit" name="submit" class="form-submit">Xác nhận</button>
          </form>
        </div>
      </div>
          <?php
        }
    }
    class verifyController
    {
        public function __invoke()
        {
          $verifyView = new verifyView();
          $verifyView->render();
          // $db = new Database();
          if(isset($_POST['submit'])){
            $checkotp = $_SESSION['otp'];
            $otp = $_POST['otp']; //get otp from keyboard
            $email = $_SESSION['user_mail'];
            if($otp == ''){
              $errorMessage = "OTP không được để trống";
              // echo "<script language='javascript'>alert('$errorMessage');</script>";
              echo "<script language='javascript'>document.querySelector('#form-1 #otp + span.form-message').textContent = '$errorMessage';</script>";
            } else if($otp == $checkotp) {
              $accountModel = new accountModel();
              $result = $accountModel->foundUser($email);
              if($result){
                $id = $_SESSION['user_id'];
                // $queryStrUpdate = "UPDATE `account` SET `verify`=1 WHERE `MaAccount` = $id";
                $update = $accountModel->updateVerify($email, $id);
                if($update == true){
                  echo '<meta http-equiv="refresh" content="0;url=registerName.php">';
                }
              }
            }
            else {
              $errorMessage = "OTP sai!";
              // echo "<script language='javascript'>alert('$errorMessage');</script>";
              echo "<script language='javascript'>document.querySelector('#form-1 #otp + span.form-message').textContent = '$errorMessage';</script>";
            }
          }
        }
    }
    class verifyPassword
    {
      public function __invoke()
      {
        $verifyView = new verifyView();
        $verifyView->render();
        if(isset($_POST['submit'])){
          $checkotp = $_SESSION['otp'];
          $otp = $_POST['otp']; //get otp from keyboard
          // $email = $_SESSION['user_mail'];
          if($otp == ''){
            $errorMessage = "OTP không được để trống";
            // echo "<script language='javascript'>alert('$errorMessage');</script>";
            echo "<script language='javascript'>document.querySelector('#form-1 #otp + span.form-message').textContent = '$errorMessage';</script>";
          } else if($otp == $checkotp) {
            echo '<meta http-equiv="refresh" content="0;url=updatepassword.php">';
          }
          else {
            $errorMessage = "OTP sai!";
            // echo "<script language='javascript'>alert('$errorMessage');</script>";
            echo "<script language='javascript'>document.querySelector('#form-1 #otp + span.form-message').textContent = '$errorMessage';</script>";
          }
        }
      }
    }
?>