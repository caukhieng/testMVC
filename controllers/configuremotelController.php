<?php

    include_once(__DIR__ . '/../models/motelModel.php');
    class configureMotel
    {
        public function render($details)
        {
          foreach($details as $row){
        ?>
       <div class="container">
        <div class="center">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Chỉnh sửa nhà trọ</h3>
            <p class="desc">Hãy nhập thông tin bên dưới <br> L<span>ONG</span> N<span>HONG</span> ❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
              <label for="email" class="form-label">Địa chỉ nhà trọ của bạn</label>
              <input id="email" name="address" type="text" placeholder="VD: 2x Điện Biên Phủ" value="<?php echo $row['DiaChi']; ?>" class="form-control" required autofocus>
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Mô tả nhà trọ</label>
              <!-- <input style="resize:none;" id="password" name="description" placeholder="VD: Sạch, có nước nóng" class="form-control" value="" required autofocus> -->
              <textarea style="resize:none;" id="password" name="description" placeholder="VD: Sạch, có nước nóng" class="form-control" required autofocus><?php echo $row['MoTaNhaTro']; ?></textarea>
              <span class="form-message"></span>
            </div>
            <button type="submit" name="submit" class="form-submit">Chỉnh sửa</button>
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
      $id = $_GET['idNhaTro'];
      $motel = new motelModel();
      $details = $motel->getDetails($id);
      $config = new configureMotel();
      $config->render($details);

      if(isset($_POST['submit']))
      {
        $oldAdd = '';
        $oldDes = '';
        $newAdd = $_POST['address'];
        $newDes = $_POST['description'];
        foreach($details as $row){
          $oldAdd = $row['DiaChi'];
          $oldDes = $row['MoTaNhaTro'];
        }
        if($oldAdd == $newAdd && $oldDes == $newDes)
        {
          $errorMessage = "Vui lòng kiểm tra lại thông tin đã nhập";
          echo "<script language='javascript'>document.querySelector('#form-1 #email + span.form-message').textContent = '$errorMessage';</script>";
          echo "<script language='javascript'>document.querySelector('#form-1 #password + span.form-message').textContent = '$errorMessage';</script>";
          return;
        }
        $result = $motel->updateDetails($_GET['idNhaTro'], $newAdd, $newDes);
        if(!$result) return;
        echo '<meta http-equiv="refresh" content="0;url=homepage">';
      }
    }
}
