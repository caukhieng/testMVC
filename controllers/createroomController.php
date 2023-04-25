<?php
include_once __DIR__ . '/../models/roomModel.php';
class createMotelController
{
    public function render()
    {
        ?>
            <div class="container">
                <div class="center">
                <form action="" method="POST" class="form" id="form-1">
                    <h3 class="heading">Thêm phòng trọ của bạn</h3>
                    <p class="desc">Hãy nhập thông tin bên dưới để đăng lên L<span>ONG</span> N<span>HONG</span> ❤️</p>

                    <div class="spacer"></div>

                    <div class="form-group">
                    <label for="email" class="form-label">Giá thuê (VNĐ)</label>
                    <input id="email" name="price" type="text" placeholder="VD: 300000" class="form-control" required autofocus>
                    <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                    <label for="email" class="form-label">Diện tích (m2)</label>
                    <input id="email" name="size" type="text" placeholder="VD: 40" class="form-control" required autofocus>
                    <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                    <label for="email" class="form-label">Số phòng</label>
                    <input id="email" name="room" type="text" placeholder="VD: B04.02" class="form-control" required autofocus>
                    <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                    <label for="password" class="form-label">Mô tả nhà trọ</label>
                    <textarea style="resize:none;" id="password" name="des" placeholder="VD: Sạch, có nước nóng" class="form-control" required autofocus></textarea>
                    <span class="form-message"></span>
                    </div>
                    <button type="submit" name="submit" class="form-submit">Đăng lên</button>
                </form>
                </div>
            </div>
<?php
    }
}
class CreateRoom
{
    public function __invoke()
    {
        $create = new createMotelController();
        $create->render();
        if (isset($_POST['submit'])) {
            $price = $_POST['price'];
            $size = $_POST['size'];
            $room = $_POST['room'];
            $des = $_POST['des'];
            $id = $_GET['idNhaTro'];
            $roomModel = new RoomModel();
            $result = $roomModel->addRoom($id, $des, $price, $size, $room);
            if ($result) {
                echo '<meta http-equiv="refresh" content="0;url=homepage">';
            } else {
                echo '<meta http-equiv="refresh" content="0;url=notfound">';
            }
        }
    }
}
