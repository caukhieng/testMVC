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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.18.0/ckeditor.js" integrity="sha512-woYV6V3QV/oH8txWu19WqPPEtGu+dXM87N9YXP6ocsbCAH1Au9WDZ15cnk62n6/tVOmOo0rIYwx05raKdA4qyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="assets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/user.css">
  <title>Thêm phòng trọ</title>
</head>
<body>
  <?php 
    include '../components/mommom/Header.php';
  ?>
    <div class="main">
      <?php 
      include '../components/mommom/slider.php';
      ?>
     <?php 
      include '../controllers/createroomController.php';
      $room = new CreateRoom();
      $room();
     ?>
    </div>
  <?php
    include '../components/mommom/Footer.php'
  ?>
  <script type="text/javascript" src="assets/scripts/app1.js"></script>
  <script type="text/javascript">
        CKEDITOR.replace('des',{
            height: "360px"
        }); 
    </script>
</body>