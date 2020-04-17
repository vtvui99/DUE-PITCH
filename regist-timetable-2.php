<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/vanilla-calendar.css">
    <script src="./js/vanilla-calendar.js"></script>
</head>
<body onload="getTimes()">
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
                <li><a class="current" href="regist-calendar.php">Đăng Ký</a></li>
                <li><a href="registered.php">Lịch Đã Đăng Ký</a></li>
            </ul>
        </aside>
        <article class="main-content">
            <div class="header">
                <h3 class="title">Đăng ký sân</h3>
                <a class="go-back" onclick="goBack()"><i class="fas fa-arrow-left"></i>Quay lại</a>
            </div>
            <div class="time">
                <h3 id="timedetails"></h3>
                <div class="tab">
                    <button id="tab1" class="tablinks pitches active" onclick="openTab(event, 'tab-1')" value="1">Sân 1</button>
                    <button id="tab2" class="tablinks pitches" onclick="openTab(event, 'tab-2')" value="2">Sân 2</button>
                </div>

                <div id="tab-1" class="tabcontent">
                    <table>
                        <tr>
                            <th class="times">Thời gian</th>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="7h30 - 8h30">7h30 - 8h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="7h30 - 8h30">17h30 - 18h30</button></td>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="8h30 - 9h30">8h30 - 9h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="18h30 - 19h30">18h30 - 19h30</button></td>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="9h30 - 10h30">9h30 - 10h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="19h30 - 20h30">19h30 - 20h30</button></td>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="16h30 - 17h30">16h30 - 17h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="20h30 - 21h30">20h30 - 21h30</button></td>
                        </tr>
                    </table>
                </div>

                <div id="tab-2" class="tabcontent">
                    <table>
                        <tr>
                            <th class="times">Thời gian</th>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="7h30 - 8h30">7h30 - 8h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="7h30 - 8h30">17h30 - 18h30</button></td>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="8h30 - 9h30">8h30 - 9h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="18h30 - 19h30">18h30 - 19h30</button></td>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="9h30 - 10h30">9h30 - 10h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="19h30 - 20h30">19h30 - 20h30</button></td>
                        </tr>
                        <tr>
                            <td class="times"><button class="button-regist" type="submit" value="16h30 - 17h30">16h30 - 17h30</button></td>
                            <td class="times"><button class="button-regist" type="submit" value="20h30 - 21h30">20h30 - 21h30</button></td>
                        </tr>
                    </table>
                </div>
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
<script>
    regist();
    setValue();
</script>
</body>
</html>