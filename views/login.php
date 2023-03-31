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

  <title>Đăng nhập</title>

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
        <div class="center">
          <form action="" method="POST" class="form" id="form-2">
        <h3 class="heading">Đăng nhập</h3>
        <p class="desc">Cùng nhau tìm trọ tại L<span>ONG</span> N<span>HONG</span> ❤️</p>

        <div class="spacer"></div>

        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="mail" type="text" placeholder="VD: email@domain.com" class="form-control" required autofocus>
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <label for="passwordUser" class="form-label">Mật khẩu</label>
          <input id="passwordUser" name="pass" type="password" placeholder="Nhập mật khẩu" class="form-control" required autofocus>
          <span class="form-message"></span>
        </div>

        <div class="form-group">
                <label for="" class="form-label">
                    Chọn loại tài khoản
                </label>
                <select name="role" id="" class="form-control" required autofocus>
                    <option value="">-- Chọn tài khoản --</option>
                    <option value="0">Chủ trọ</option>
                    <option value="1">Khách trọ</option>
                </select>
            </div>

        <button type="submit" name="submit" class="form-submit">Đăng nhập</button>
        <a href="register.php" class="register">Đăng ký tài khoản tại đây!</a><br>
        Quên mật khẩu ? <a href="forgetPassword1.php" class="register">Nhấn vào đây!</a>
      </form>
    </div>
      </div>
    </div>
  <?php 
    include '../components/mommom/Footer.php'
  ?>

  <script type="text/javascript" src="../assets/scripts/app1.js"></script>
</body>
