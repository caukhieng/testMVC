<?php
    include_once(__DIR__ . '/../models/roomModel.php');
    class roomView
    {
        public function render($rooms)
        {?>
            <div class="product__container">
            <?php
                foreach ($rooms as $row) {
            ?>
            <div class="product__item">
              <div class="product__item__img">
                <a href="../views/indetails.php?idPhongTro=<?php echo $row['MaPhongTro'];?>&idNhaTro=<?php echo $row['MaNhaTro'];?>">
                  <img src="https://cdn.luatvietnam.vn/uploaded/Images/Original/2022/09/05/mau-hop-dong-thue-tro-2022-1_0509150415.jpg" alt="">
                </a>
              </div>
              <h4 class="product__item__title">
              <a href="#">
                  <?php echo $row['SoPhong']; ?>
                </a>
              </h4>
              <p class="product__item__price">
                <span>VNĐ</span>  <?php echo $row['GiaThue']; ?>
              </p>
              <p style="padding-top: 1rem; margin-bottom: 1rem">
                  Diện tích <span><?php echo $row['DienTich']; ?></span>
              </p>
              <a href="#" class="product__item__action">
                <i class='bx bx-category' ></i>
                Xem chi tiết
              </a>
            </div>
            <?php } ?>
          </div>
          <?php
        }
    }
    class roomController
    {
        public function __invoke()
        {
            // $roomModel = new App\Models\roomModel();
            $roomModel = new roomModel();
            $rooms = $roomModel->getAllRooms();
            $roomView = new roomView();
            $roomView->render($rooms);
        }
    }
?>