<?php
include_once __DIR__ . '/../models/roomModel.php';
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
class detailsView
{
    public function render($get)
    {?>
        <div class="container">
        <h2 class="title__section">
          Chi tiết phòng trọ
        </h2>
        <?php foreach ($get as $row) {?>
        <div class="details__product">
          <?php if (!empty($row['url'])) { ?>
            <div class="details__product__left">
              <div class="details__product__left__img">
                <img src="<?php echo $row['url']; ?>" alt="">
              </div>
            </div>
          <?php } else { ?>
            <div class="details__product__left">
              <div class="details__product__left__img">
                <img src="https://viatravelers.com/wp-content/uploads/2021/01/single-hotel-room.jpg" alt="">
              </div>
            </div>
          <?php } ?>
            <div class="details__product__right">
                <h3 class="details__product__right__title">
                  <?php echo $row['SoPhong']; ?>
                </h3>
                <h4 class="details__product__right__price">
                  <span>Giá thuê: </span>
                  <?php echo $row['GiaThue']; ?>
                </h4>
                <h4 class="details__product__right__price">
                  <span>Diện tích: </span>
                  <?php echo $row['DienTich']; ?>
                </h4>
                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0) { ?>
                  <a href="<?php echo $_ENV['URL']; ?>configureroom?idPhongTro=<?php echo $_GET['idPhongTro']; ?>">
                    <button type="submit" name="submit" class="btn btn--add">
                    <i class='bx bx-shopping-bag' ></i>
                    Chỉnh sửa thông tin phòng
                    </button>
                  </a>
                  <a href="<?php echo $_ENV['URL']; ?>configureimage?idPhongTro=<?php echo $_GET['idPhongTro']; ?>">
                    <button type="submit" name="submit" class="btn btn--add">
                    <i class='bx bx-shopping-bag' ></i>
                    Chỉnh sửa hình ảnh
                    </button>
                  </a>
                <?php } else { ?>
                  <?php if (isset($_SESSION['user_id'])) { ?>
                  <a href = "<?php echo $_ENV['URL']; ?>rentalcontract?idPhongTro=<?php echo $_GET['idPhongTro']; ?>"
                  <?php } else { ?>
                   <a href = "<?php echo $_ENV['URL']; ?>login?idPhongTro=<?php echo $_GET['idPhongTro']; ?>&rent=true">
                  <?php } ?>
                      <button type="submit" name="submit" class="btn btn--add">
                      <i class='bx bx-shopping-bag' ></i>
                      Đặt phòng
                      </button>
                  </a>
                <?php }?>
              </div>
            </div>
            <div class="description">
              <h4 class="heading">Mô tả sản phẩm</h4>
              <p class="desc">
              <?php echo nl2br($row['MoTaPhongTro']); ?>
              </p>
            </div>
            
          <div class="product">
            <h3 class="heading">
              <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0) { ?>
              <?php } else { ?>
                  <!-- <i class="bx bx-cart-alt"></i> -->
                  Góc bình luận (<?php echo $row['LuotBinhLuan']; ?>)
                    <?php }?>
                  </h3>
                  <div class="product__container">


                  </div>
                </div>
              </div>
              <?php }?>
          </div>                    
<?php
    }
}
class detailsController
{
    public function __invoke()
    {
        $roomModel = new RoomModel();
        $get = $roomModel->getRoomDebug($_GET['idPhongTro']);
        $detailView = new detailsView();
        $detailView->render($get);
    }
}
?>