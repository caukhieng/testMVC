<?php 
  session_start();
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Web long tìm nhà trọ">
  <meta name="author" content="Nhóm x">
  <meta name="keywords" content="HTML , CSS , SCSS , JavaScript , PHP" >
  <link rel="stylesheet" href="../assets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="../assets/css/styles1.css">
  <title>Trang chủ</title>
</head>
<body>
  <?php
    include '../components/mommom/Header.php';
  ?>
    <div class="main">
      <?php
      include '../components/mommom/slider.php';
      // include './components/mommom/Navigation.php';
      ?>
      <div class="container">
        <div class="product">
          <h3 class="heading">
            <i class='bx bx-shopping-bag' ></i>
            Sản phẩm nhà trọ mới nhất
          </h3>
        <?php 
          include_once(__DIR__ .'/../controllers/roomController.php');
          $roomController = new roomController();
          $roomController();
        ?>
        </div>
          <div class="product">
            <h3 class="heading">
              <i class="bx bx-cart-alt"></i>
              Sản phẩm được yêu thích
            </h3>
            <div class="product__container">
              <div class="product__item">
                <div class="product__item__img">
                  <a href="productDetail.php?productId=<?php echo $result['productId'] ?>">
                    <img src="https://i1-kinhdoanh.vnecdn.net/2020/08/31/a-tb-phoi-canh-du-an-phong-3868-1598855134.jpg?w=0&h=0&q=100&dpr=2&fit=crop&s=3PgwyZtZqJLlpIjcBw7ABw" alt="">
                  </a>
                </div>
                <h4 class="product__item__title">
                  <a href="productDetail.php?productId=<?php echo $result['productId'] ?>">
                    productName
                  </a>
                </h4>
                <p class="product__item__price">
                  <span>$</span>400
                </p>
                <p style="padding-top: 1rem; margin-bottom: 1rem">
                    Số view <span>400</span>
                </p>
                <a href="" class="product__item__action">
                  <i class='bx bx-category' ></i>
                  Xem chi tiết
                </a>
              </div>
            </div>
            <ul class="list-page">
              <li><a href='index.php?page=$i'>1</a></li>
              <li><a href='index.php?page=$i'>2</a></li>
              <li><a href='index.php?page=$i'>3</a></li>
              <li><a href='index.php?page=$i'>4</a></li>
              <li><a href='index.php?page=$i'>5</a></li>
              <li><a href='index.php?page=$i'>6</a></li>
              <li><a href='index.php?page=$i'>7</a></li>
          </ul>
            <div class="brands">
              <div class="heading">
                <i class='bx bx-check-shield' ></i>
                Thương hiệu chính hãng
              </div>
              <div class="brands__container">
                <div class="brands__item">
                  <img src="../assets/images/aurus.png" alt="">
                </div>
                <div class="brands__item">
                  <img src="../assets/images/msi.png" alt="">
                </div>
                <div class="brands__item">
                  <img src="../assets/images/logo.png" alt="">
                </div>
                <div class="brands__item">
                  <img src="../assets/images/rog.png" alt="">
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  <?php
    include '../components/mommom/Footer.php'
  ?>

  <script type="text/javascript" src="../assets/scripts/app1.js"></script>
</body>
