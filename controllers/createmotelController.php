<?php 
    include_once(__DIR__ . '/../models/motelModel.php');
    class motelView
    {
        public function render()
        {?>
       <div class="container">
        <div class="center">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Thêm phòng trọ</h3>
            <p class="desc">Hãy nhập thông tin bên dưới để đăng lên L<span>ONG</span> N<span>HONG</span> ❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
              <label for="email" class="form-label">Địa chỉ nhà trọ của bạn</label>
              <input id="email" name="address" type="text" placeholder="VD: 2x Điện Biên Phủ" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Mô tả nhà trọ</label>
              <input id="password" name="des" type="text" placeholder="VD: Nhà trọ đẹp, máy lạnh..." class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>
            <button type="submit" name="submit" class="form-submit">Đăng lên</button>
          </form>
        </div>
      </div>
<?php
    }
}
class motelController
{
    public function __invoke()
    {
        $motel = new motelView();
        $motel->render();
        if(isset($_POST['submit'])){
            $id = $_SESSION['user_idNum'];
            $address = $_POST['address'];
            $des = $_POST['des'];
            $motelModel = new motelModel();
            $result = $motelModel->addMotel($address, $des, $id);
            if($result) echo '<meta http-equiv="refresh" content="0;url=homepage.php">';
            else echo '<meta http-equiv="refresh" content="0;url=notfound.php">';
        }
    }
}