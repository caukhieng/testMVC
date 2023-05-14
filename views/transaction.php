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
  <link rel="stylesheet" href="assets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="assets/css/styles1.css">
  <title>Trang chủ</title>
  
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
  <?php 
    include '../components/mommom/Header.php';
  ?>
    <div class="main">
      <?php
        include '../components/mommom/slider.php';
      ?>
    <?php
        // include '../controllers/historybillController.php'
        // $his = new historybillController();
        // $his();
        include '../controllers/historybillController.php';
        $details = new historybillController();
        $details();
    ?>
      </div>
    </div>
      </div>
    </div>
  <?php 
    include '../components/mommom/Footer.php'
  ?>

  <script type="text/javascript" src="assets/scripts/app1.js"></script>
</body>