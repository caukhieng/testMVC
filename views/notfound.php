<?php session_start();?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Web tìm trọ nè">
  <meta name="author" content="Nhóm x">
  <meta name="keywords" content="HTML , CSS , SCSS , JavaScript , PHP" >
  <link rel="stylesheet" href="asssets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="asssets/css/styles.css">
  <title>Not Found</title>
</head>
<body>
  <?php
    include '../components/mommom/Header.php';
  ?>
    <div class="main">
      <?php
        include '../components/mommom/slider.php';
      ?>
      <div class="container">
        <h2 class="heading">
          Not found .......
          Nhấp vào
          <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0): ?>
            <span>
              <a href="homepage.php">Trở về trang chủ</a>
            </span>
          <?php else: ?>
            <span>
              <a href="index.php">Trở về trang chủ</a>
            </span>
          <?php endif;?>
        </h2>
      </div>
    </div>
  <?php
    include '../components/mommom/Footer.php'
  ?>

  <script type="text/javascript" src="asssets/scripts/app1.js"></script>
</body>
