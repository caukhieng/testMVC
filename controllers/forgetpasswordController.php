<?php
include_once __DIR__ . '/../models/accountModel.php';
class accountView
{
    public function render()
    {?>
       <div class="container">
        <div class="center">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Quên mật khẩu</h3>
            <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span> ❤️</p>

            <div class="spacer"></div>
            <div class="form-group">
              <label for="email" class="form-label">Email của bạn</label>
              <input id="email" name="email" type="email" placeholder="Nhập vào email" class="form-control">
              <span class="form-message"></span>
            </div>
            <button type="submit" name="submit" class="form-submit">
              Nhấn để nhận OTP
            </button>
          </form>
        </div>
      </div>
<?php
    }
}
class userController
{
    public function __invoke()
    {
        $user = new accountView();
        $user->render();

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $_SESSION['user_mail'] = $email;
            $accountModel = new accountModel();
            $result = $accountModel->forgetpassword($email);
            if ($result) {
                echo '<meta http-equiv="refresh" content="0;url=verify?forget=yes">';
            }
        }
    }
}
