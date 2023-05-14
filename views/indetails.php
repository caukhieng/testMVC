<?php 
  header("Cache-Control: no-cache,must-revalidate");
  header("Pragma: no-cache");
  header("Cache-Control: max-age=2592000");
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Web tim nhà trọ">
  <meta name="author" content="Nhóm x">
  <meta name="keywords" content="HTML , CSS , SCSS , JavaScript , PHP" >


  <link rel="stylesheet" href="assets/boxicons-2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/reviews.css">
  <script src="stylesheet" href="assets/scripts/reviewsroom.js"></script>
  <title>Chi tiết</title>
</head>
<style>
.form .group-cm textarea {
    border-radius: 8px;
    border: 1px solid #8f9bb3;
    height: 80px;
    padding: 6px 10px 6px;
    transition: all .5s ease;
    width: 100%;
    line-height: unset;

}

.comment-list {
    color: #222b45;
    margin-top: 20px;
    text-align: left;
}
.comment-list li:first-child {
    border-top: 1px solid #ebf0f9;padding: 15px 0;
}
.comment-list .cmtd {
    color: #8f9bb3;
    font-size: 12px;
}
.box-cmt-item input[type="text"] {
    border-radius: 8px;
    border: 1px solid #d7d7d7;
    padding: 18px 10px 6px;
    width: 100%;
    line-height: unset;    
    margin: 15px 0;
}
.submit.box-cmt-item.btn-send {
    width: 100%;
    background-color: transparent;
    border-width: 1px;
    border-style: solid;
    border-radius: 8px;
    color: #fff;
    cursor: pointer;
    display: block;
    font-weight: bold;
    height: 44px;
    line-height: 44px;
    transition: .3s;
    background-color: #eebc49;
    border-color: #eebc49;

}
p.cmt-top-name {
    color: #222b45;
    display: inline;
    font-weight: bold;
    font-size: 14px;
    line-height: 16px;
    margin-right: 10px;
}
p.cmt-txt {
    margin: 2px !important;
    line-height: unset !important;
}
a.help-submit {
    width: -webkit-fill-available;
    display: block;
    text-align: center;
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
      include '../controllers/indetailsController.php';
      include '../controllers/commentController.php';
      include '../controllers/reviewsController.php';
      $details = new detailsController();
      $details();
    ?>
    <?php      
      $co = new commentController();
      $co();
      $re = new reviewController();
      $re();?>
      </div>
      
      
    
    </div>

  <?php
    include '../components/mommom/Footer.php'
  ?>
  <?php
  
  ?>
  <button onclick="scrollToTop()" id="scroll-to-top">↑</button>
  <script type="text/javascript" src="assets/scripts/app1.js"></script>

</body>
</html>