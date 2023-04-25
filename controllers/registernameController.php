<?php
include_once __DIR__ . '/../models/accountModel.php';
class registerName
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
              <label for="email" class="form-label">Tên</label>
              <input id="email" name="name" type="text" placeholder="VD: Lê Văn B" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="email" class="form-label">CMND</label>
              <input id="email" name="citizenID" type="text" placeholder="VD: 0792xxxxxxxx" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <button type="submit" name="submit" class="form-submit">Đăng ký</button>
          </form>
        </div>
        </div>
          <?php
    }
}
class registernameController
{
    public function __invoke()
    {
        $registerView = new registerName();
        $registerView->render();

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $cmnd = $_POST['citizenID'];
            $accountModel = new accountModel();
            $id = $_SESSION['user_id'];
            $result = $accountModel->registerName($id, $name, $cmnd);
            if ($result) {
                // Redirecting the user to the login page.
                echo '<meta http-equiv="refresh" content="0;url=login">';
            }
        }
    }
}
?>

