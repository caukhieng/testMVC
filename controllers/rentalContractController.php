<?php
require __DIR__ . '/../models/roomModel.php';
require __DIR__ . '/../models/paymentModel.php';
require __DIR__ . '/../models/contractModel.php';
class contractInfo
{
    public function render($dataRoom, $paymentMethod)
    {?>
    <div class="container">
        <div class="center">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Hợp đồng</h3>
            <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span> ❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
              <label for="email" class="form-label">Phòng trọ muốn thuê</label>
              <input id="room" name="room" type="text" placeholder="" value = "<?php echo $dataRoom['SoPhong']; ?>" class="form-control" readonly>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Chủ trọ</label>
              <input id="chutro" name="chutro" type="text" placeholder="" value="<?php echo $dataRoom['Ten']; ?>" class="form-control" readonly>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Số tháng thuê</label>
              <input id="month" name="month" type="number" placeholder="VD:1" value="1" min="1" max="24" class="form-control" oninput="(!validity.rangeOverflow||(value=10)) && (!validity.rangeUnderflow||(value=1)) &&
                (!validity.stepMismatch||(value=parseInt(this.value)));" required autofocus>
              <span class="form-message"></span>

            </div>

            <div class="form-group">
              <label for="password" class="form-label">Số điện thoại</label>
              <input id="sdt" name="sdt" type="text" placeholder="Nhập số điện thoại của bạn" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Giá phòng</label>
              <input id="price" name="price" type="text" placeholder="" value="<?php echo htmlspecialchars($dataRoom['GiaThue']); ?> VND" class="form-control" readonly>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="checkin-date" class="form-label">Ngày lập hóa đơn</label>
                <input id="checkin-date" name="checkin-date" type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" readonly>
                <span class="form-message"></span>
            </div>


            <div class="form-group">
                <label for="" class="form-label">
                    Phương thức thanh toán
                </label>
                <select name="method" id="" class="form-control" required>
                    <?php foreach ($paymentMethod as $itemMethod) { ?>
                      <option value="<?php echo $itemMethod['MaPhuongThuc']; ?>"><?php echo $itemMethod['tenphuongthuc']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="submit" class="form-submit">Đặt phòng</button>
          </form>
        </div>
    </div>
        <?php
    }
}
class contractViews
{
    public function __invoke()
    {
        $roomModel = new RoomModel();
        $paymetModel = new paymentModel();
        $dataRoom = $roomModel->getRoomWithName($_GET['idPhongTro'])->fetch_assoc();
        $paymentMethod = $paymetModel->getMethod();
        $contractInfo = new contractInfo();
        $contractInfo->render($dataRoom, $paymentMethod);

        if (isset($_POST['submit'])) {
            $method = $_POST['method'];
            $room = $dataRoom['MaPhongTro'];
            $chutro = $dataRoom['MaChuTro'];
            $khachtro = $_SESSION['user_idNum'];
            $sdt = $_POST['sdt'];
            $month = $_POST['month'];
            $price = $_POST['price'];
            $checkindate = $_POST['checkin-date'];
            var_dump($khachtro);
            $contractModel = new contractModel();
            $res = $contractModel->foundContract($room);
            if(!$res){
              // echo "<script>alert('Phòng này đã có người đặt rồi')</script>";
              return false;
            }
            $result = $contractModel->createContract($room, $chutro, $khachtro, $price, $checkindate,$month, $method, $sdt);
            if (!$result) {
                return false;
            }
            $message = 'Đặt thành công';
            echo "<script>alert('{$message}')</script>";
            echo '<meta http-equiv="refresh" content="0;url=' . $_ENV['URL'] . '">';
        }
    }
}
