<?php
include_once __DIR__ . '/../models/accountModel.php';
class accountView
{
    public function render()
    { ?>

        <div class="container">
            <div class="center">
                <form action="" method="POST" class="form" id="form-1">
                    <h3 class="heading">Đặt lại mật khẩu</h3>
                    <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span> ❤️</p>

                    <div class="spacer"></div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu mới: </label>
                        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="passwordConfirm" class="form-label">Xác nhận lại mật khẩu: </label>
                        <input id="passwordConfirm" name="passwordconfirm" type="password" placeholder="Nhập mật khẩu xác nhận" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <button type="submit" name="submit" class="form-submit">Đổi mật khẩu</button>
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
            $password = $_POST['password'];
            $passwordconfirm = $_POST['passwordconfirm'];
            // VALIDATE PASSWORD
            $uppercase = preg_match('@[A-Z]@', $passwordconfirm);
            $lowercase = preg_match('@[a-z]@', $passwordconfirm);
            $number = preg_match('@[0-9]@', $passwordconfirm);
            // $specialChars = preg_match('@[^\w]@', $passwordconfirm);
            // VALIDATE PASSWORD
            if (!$uppercase || !$lowercase || !$number || strlen($passwordconfirm) < 6) {
                $errorMessage = 'Mật khẩu phải có ít nhất 6 ký tự, 1 chữ số, 1 chữ hoa';
                echo "<script language='javascript'>document.querySelector('#form-1 #password + span.form-message').textContent = '{$errorMessage}';</script>";
            } elseif ($password === '' || $password !== $passwordconfirm) {
                $errorMessage = 'Vui lòng kiểm tra lại mật khẩu';
                echo "<script language='javascript'>document.querySelector('#form-1 #password + span.form-message').textContent = '{$errorMessage}';</script>";
            } else {
                $email = $_SESSION['user_mail'];
                $accountModel = new accountModel();
                $result = $accountModel->updatePassword($email, $password);
                if ($result) {
                    // echo "ok";
                    echo '<meta http-equiv="refresh" content="0;url=login">';
                }
            }
        }
    }
}
