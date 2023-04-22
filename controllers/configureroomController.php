<?php

    include_once(__DIR__ . '/../models/roomModel.php');
    class configureHotel
    {
        public function render($details)
        {
        foreach($details as $row){
        ?>
        <div class="container">
          <div class="center">
            <form action="" method="POST" class="form" id="form-1">
              <h3 class="heading">Chỉnh sửa phòng trọ</h3>
              <p class="desc">Hãy nhập thông tin bên dưới<br> L<span>ONG</span> N<span>HONG</span> ❤️</p>

              <div class="spacer"></div>

              <div class="form-group">
              <label for="email" class="form-label">Giá thuê (VNĐ)</label>
              <input id="email" name="price" type="text" placeholder="VD: 300000" class="form-control" value="<?php echo $row['GiaThue'] ?>" required autofocus>
              <span class="form-message"></span>
              </div>

              <div class="form-group">
              <label for="email" class="form-label">Diện tích (m2)</label>
              <input id="email" name="size" type="text" placeholder="VD: 40" class="form-control" required autofocus value="<?php echo $row['DienTich']; ?>">
              <span class="form-message"></span>
              </div>

              <div class="form-group">
              <label for="email" class="form-label">Số phòng</label>
              <input id="email" name="room" type="text" placeholder="VD: B04.02" class="form-control" required autofocus value="<?php echo $row['SoPhong']; ?>">
              <span class="form-message"></span>
              </div>

              <div class="form-group">
              <label for="password" class="form-label">Mô tả nhà trọ</label>
              <textarea style="resize:none;" id="password" name="des" placeholder="VD: Sạch, có nước nóng" class="form-control" required autofocus><?php echo $row['MoTaPhongTro']; ?></textarea>
              <span class="form-message"></span>
              </div>
              <button type="submit" name="submit" class="form-submit">Đăng lên</button>
            </form>
          </div>
        </div>
    <?php }?>
<?php
        }
  }
class configure
{
    public function __invoke()
    {
      $id = $_GET['idPhongTro'];
      $roomModel = new roomModel();
      $details = $roomModel->getRoomDebug($id);
      $config = new configureHotel();
      $config->render($details);

      if(isset($_POST['submit']))
      {
        /* These lines of code are retrieving the values submitted through a form using the POST method
        and assigning them to variables. The values are retrieved based on the name attribute of the
        input fields in the form. In this case, the variables are named , , , and
        , and they correspond to the values entered in the form fields with the names
        "price", "size", "room", and "des", respectively. */
        $price = $_POST['price'];
        $size = $_POST['size'];
        $room = $_POST['room'];
        $description = $_POST['des'];

        foreach($details as $row){
          $oldPrice = $row['GiaThue'];
          $oldSize = $row['DienTich'];
          $oldRoom = $row['SoPhong'];
          $oldDes = $row['MoTaPhongTro'];
        }
        if($oldPrice == $price && $oldSize == $size && $oldRoom == $room && $oldDes == $description)
        {
          $errorMessage = "Vui lòng kiểm tra lại thông tin đã nhập";
          echo "<script language='javascript'>document.querySelector('#form-1 #email + span.form-message').textContent = '$errorMessage';</script>";
          return;
        }
        $result = $roomModel->updateRoom($id, $description, $price, $size, $room);
        if(!$result) return;
        echo '<meta http-equiv="refresh" content="0;url=homepage">';
      }
    }
}
