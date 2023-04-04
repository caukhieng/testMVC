<?php
    include_once(__DIR__ . '/../models/motelModel.php');
    class motelView
    {
        public function render($motel)
        {?>
        <div class="product__container">
            <?php foreach ( $motel as $row){ ?>
            <div class="product__item">
              <div class="product__item__img">
                <a href="../views/roomdetails.php?idNhaTro=<?php echo $row['MaNhaTro'] ?>">
                  <img src="https://cdn.luatvietnam.vn/uploaded/Images/Original/2022/09/05/mau-hop-dong-thue-tro-2022-1_0509150415.jpg" alt="">
                </a>
              </div>
              <h4 class="product__item__title">
              <a href="">
                  <?php echo $row['DiaChi']; ?>
                </a>
              </h4>
              <p class="product__item__price">
                <span>Mô tả: </span>  <?php echo $row['MoTaNhaTro']; ?>
              </p>
              <a href="" class="product__item__action">
                <i class='bx bx-category' ></i>
                Xem chi tiết
              </a>
            </div>
            <?php } ?>
        </div>
<?php
    }
}
class motelController
{
    public function __invoke()
    {
        $motelModel = new motelModel();
        $result = $motelModel->getAllMotels($_SESSION['user_idNum']);
        $motel = new motelView();
        $motel->render($result);
    }
}