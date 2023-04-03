<?php
  if (isset($_GET['login']) && $_GET['login'] == 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
  } // use to logout account
?>
<header class="header">
  <div class="header__menu__toggle">
    <i class='bx bx-menu-alt-left' ></i>
  </div>
  <h4 class="header__logo">
  <a href="<?php echo isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0 ? 'homepage.php' : 'index.php'; ?>">
    L<span>ONG</span> N<span>HONG</span>
  </a>
  </h4>
  <div class="header__search">
    <i class='bx bx-search icon-search header__search__icon' ></i>
    <input type="text" spellcheck="false"
      placeholder="Tìm kiếm nhà trọ bạn cần"
    class="header__search__input">
  </div>
  <div class="header__action">
    <button class="btn btn--cart header__action__btn">
        <?php if(isset($_SESSION['user_name'])): ?>
      <a href="?login=logout">
        <i class="bx bxs-user"></i>
        Đăng xuất
      </a>
    <?php else: ?>
      <a href="">
        <i class="bx bxs-user"></i>
        Xác nhận tài khoản
      </a>
    <?php endif; ?>
    </button>
    <button class="btn btn--primary header__action__btn">
      <?php if (isset($_SESSION['user_name'])): ?>
        <a href="user_info.php">
          <i class="bx bxs-user"></i> <?php echo $_SESSION['user_name']; ?>
        </a>
      <?php else: ?>
        <a href="/../phpmvc/views/login.php">
          <i class="bx bxs-user"></i> Đăng nhập
        </a>
      <?php endif; ?>
  </button>
  </div>
</header>