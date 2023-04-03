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
  <meta name="description" content="Web tìm nhà trọ">
  <meta name="author" content="Nhóm x">
  <meta name="keywords" content="HTML , CSS , SCSS , JavaScript , PHP" >
  <link rel="stylesheet" href="../assets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/user.css">
  <title>Xác nhận</title>
</head>
<body>
  <?php 
    include '../components/mommom/Header.php';
  ?>
    <div class="main">
      <?php include '../components/mommom/slider.php';?>
      <?php 
        include('../controllers/verifyController.php');
        if(isset($_GET['forget']) && $_GET['forget'] == 'yes'){
          $verify = new verifyPassword();
          $verify(); // call the __invoke() method to render the verifyView
        }
        else {
          $verify = new verifyController();
          $verify(); // call the __invoke() method to render the verifyView
        }
      ?>
      </div>
    </div>
  <?php 
    include '../components/mommom/Footer.php'
  ?>
  <script type="text/javascript" src="../assets/scripts/app1.js"></script>
</body>