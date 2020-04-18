<?php
    include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Đã Đăng Ký</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>
<header>
    <div class="container">
        <a class="logo" href="index.php"><img src="./img/logo-truong.png" alt="Logo DUE" title="Logo DUE"></a>
        <div class="header-right">
            <button onclick="dropdownMenu()" class="dropdown-button"><?php echo $_SESSION['login_user']; ?></button>
            <div id="dropdown" class="dropdown-content">
                <a href="#">Thiết lập tài khoản</a>
                <a href="login.php">Đăng xuất</a>
            </div>
        </div>
    </div>
</header>

<section class="main">
    <div class="container">
        <aside class="navbar">
            <h3 class="title">Sân bóng</h3>
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="regist-calendar.php">Đăng Ký</a></li>
                <li><a class="current" href="registered.php">Lịch Đã Đăng Ký</a></li>
            </ul>
        </aside>
        <article class="main-content">
            <div class="header">
                <h3 class="title">Sân đã đăng ký</h3>
                <div><?php echo "" ?></div>
            </div>
        </article>
    </div>
</section>

<footer>
    <div class="container">
        <div class="footer-content">
            <div class="information">
                <h3>Thông tin tuyển sinh</h3>
                <ul>
                    <li><a href="#">Kế hoạch tuyển sinh</a></li>
                    <li><a href="#">Các chương trình đào tạo</a></li>
                    <li><a href="#">Điều kiện giảng dạy</a></li>
                    <li><a href="#">Tư vấn tuyển sinh</a></li>
                </ul>
            </div>
            <div class="links">
                <h3>Các liên kết khác</h3>
                <ul>
                    <li><a href="#">Điều hành tác nghiệp</a></li>
                    <li><a href="#">E-learning</a></li>
                    <li><a href="#">Thư viện</a></li>
                    <li><a href="#">Email</a></li>
                </ul>
            </div>
            <div class="connection">
                <h3>Kết nối</h3>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                    <li><a href="#"><i class="fas fa-rss"></i>RSS</a></li>
                    <li><a href="#"><i class="fas fa-rss"></i>Linked in</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            Bản quyền Trường Đại học Kinh Tế Đà Nẵng
        </div>
    </div>
</footer>

<script type="text/javascript" src="./js/scripts.js"></script>
</body>
</html>