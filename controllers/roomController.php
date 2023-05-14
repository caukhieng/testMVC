<?php
include_once __DIR__ . '/../models/roomModel.php';
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

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
                <a href="<?php echo $_ENV['URL']; ?>indetails?idPhongTro=<?php echo $row['MaPhongTro']; ?>&idNhaTro=<?php echo $row['MaNhaTro']; ?>">
                  <img src="<?php echo $row['url'] ? $row['url'] : 'https://viatravelers.com/wp-content/uploads/2021/01/single-hotel-room.jpg'; ?>" alt="">
                </a>
              </div>
              <h4 class="product__item__title">
              <a href="#">
                  Nhà Trọ <?php echo $row['DiaChi']; ?>
              </a>
              </h4>
              <h4 class="product__item__title">
              <a href="#">
                  Phòng Số <?php echo $row['SoPhong']; ?>
                </a>
              </h4>
              <p class="product__item__price">
                <span>Giá</span>  <?php echo number_format($row['GiaThue'],0,",","."); ?> VNĐ
              </p>
              <p style="padding-top: 1rem; margin-bottom: 1rem">
                  Diện tích <span><?php echo $row['DienTich']; ?></span>
              </p>
              <p style="padding-top: 1rem; margin-bottom: 1rem">
                  Tình trạng <span><?php 
                    $db = new Database();
                    $query = "SELECT * From hopdongthue where 
                    not visible = 2 and not CURDATE()>DATE_ADD(ngaytraphong, INTERVAL 1 DAY) 
                    and MaPhongTro={$row['MaPhongTro']} ORDER BY id DESC LIMIT 1";
                    $res = $db->select($query);
                    if(!$res) {
                      echo "còn phòng"; 
                    }else {
                      echo "hết phòng"; 
                    }
                    
                  ?></span>
              </p>
              <a href="<?php echo $_ENV['URL']; ?>indetails?idPhongTro=<?php echo $row['MaPhongTro']; ?>&idNhaTro=<?php echo $row['MaNhaTro']; ?>" class="product__item__action">
                <i class='bx bx-category' ></i>
                Xem chi tiết
              </a>
            </div>
            <script>
            window.env = {
              URL: "<?php echo base64_encode($_ENV['ADMIN_URL']); ?>",
              ADMIN_SECRET_KEY: "<?php echo base64_encode($_ENV['ADMIN_SECRET_KEY']); ?>"
            };
          </script>
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