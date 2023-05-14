<?php
  header("Cache-Control: no-cache,must-revalidate");
  header("Pragma: no-cache");
  header("Cache-Control: max-age=2592000");
  session_start();
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Web long tìm nhà trọ">
  <meta name="author" content="Nhóm x">
  <meta name="keywords" content="HTML , CSS , SCSS , JavaScript , PHP" >
  <link rel="stylesheet" href="./assets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="./assets/css/styles1.css">
  <title>Trang chủ</title>
</head>
<body>
  <?php
    include './components/mommom/Header.php';
  ?>
    <div class="main">
      <?php
      include './components/mommom/slider.php';
      // include '../components/mommom/Navigation.php';
      ?>
      <div class="container">
        <div class="product">
          <h3 class="heading">
            <i class='bx bx-shopping-bag' ></i>
            Sản phẩm nhà trọ
          </h3>
        <?php
          include_once(__DIR__ .'/controllers/roomController.php');
          $roomController = new roomController();
          $roomController();
        ?>
      </div>
    </div>
  <?php
    include './components/mommom/Footer.php'
  ?>
  <button onclick="scrollToTop()" id="scroll-to-top">↑</button>
  <script type="text/javascript" src="./assets/scripts/app1.js"></script>
  <script src="./assets/scripts/key.js"></script>
</body>
