<?php
require __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
if (isset($_GET['login']) && $_GET['login'] == 'logout') {
    session_destroy();
    header('Location:' . $_ENV['URL']);
    exit;
} // use to logout account
?>
<header class="header">
  <div class="header__menu__toggle">
    <i class='bx bx-menu-alt-left' ></i>
  </div>
  <h4 class="header__logo">
  <a href="<?php echo isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0 ? $_ENV['URL'] . 'homepage' : $_ENV['URL']; ?>">
    L<span>ONG</span> N<span>HONG</span>
  </a>
  </h4>
  <div class="header__search">
    <i class='bx bx-search icon-search header__search__icon'></i>
    <input type="text" spellcheck="false"
          placeholder="Tìm kiếm nhà trọ bạn cần"
          class="header__search__input" id="search-input">
    <div id="search-results"></div>
  </div>
  <div class="header__action">
    <?php if (isset($_SESSION['user_name'])) { ?>
      <button class="btn btn--cart header__action__btn">
      <a href="?login=logout">
        <i class="bx bxs-user"></i>
        Đăng xuất
      </a>
    </button>
      <!-- <a href="">
        <i class="bx bxs-user"></i>
        Xác nhận tài khoản
      </a> -->
    <?php } ?>
    <button class="btn btn--primary header__action__btn">
      <?php if (isset($_SESSION['user_name'])) { ?>
        <a href="user_info">
          <i class="bx bxs-user"></i> <?php echo $_SESSION['user_name']; ?>
        </a>
      <?php } else { ?>
        <a href="<?php echo $_ENV['URL']; ?>login">
          <i class="bx bxs-user"></i> Đăng nhập
        </a>
      <?php } ?>
  </button>
  </div>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
