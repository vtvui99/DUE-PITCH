<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đặt sân</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.css">
</head>

<body onload="showSlides(slideIndex)">
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
                <h3 class="title">Đăng ký</h3>
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a class="current" href="dangky.php">Đăng Ký</a></li>
                    <li><a href="registered.php">Lịch Đã Đăng Ký</a></li>
                </ul>
            </aside>
            <div class="main-content">
                <div class="header">
                    <h3 class="title">Đăng ký lịch</h3>
                </div>
                <div class="form-box">
                    <h2>Mời bạn chọn sân để đặt!</h2>
                    <div class="form">
                        <button type="button" class="btn btn-primary btn-lg"><a class="pitch" href="calendar1.php">SÂN
                                1</a></button>
                        <button type="button" class="btn btn-primary btn-lg"><a class="pitch" href="calendar2.php">SÂN
                                2</a></button>
                    </div>
                </div>
            </div>
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
    <!--     <h3><button><a href="index.php">Quay lại</a></button></h3>-->

    <script type="text/javascript" src="./js/scripts.js"></script>
</body>

</html>