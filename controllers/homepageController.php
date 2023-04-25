<?php
    include_once(__DIR__ . '/../models/motelModel.php');
    require __DIR__ . '/../vendor/autoload.php';
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();
    class motelView
    {
        public function render($motel)
        {?>
        <div class="product__container">
            <?php foreach ( $motel as $row){ ?>
            <div class="product__item">
              <div class="product__item__img">
                <a href="<?php echo $_ENV['URL'];?>roomdetails?idNhaTro=<?php echo $row['MaNhaTro'] ?>">
                <img src="<?php echo $row['url'] ? $row['url'] : 'https://firebasestorage.googleapis.com/v0/b/project-motel.appspot.com/o/images%2FMotel-Nacht.webp?alt=media&token=8ae8f91f-2adc-44a5-8928-9a3009ed84fe'; ?>" alt="">
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