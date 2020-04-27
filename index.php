<?php
    include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
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

<section class="slideshow">
    <div class="container">
        <div class="my-slides">
            <img src="./img/san-bong1.jpg">
        </div>

        <div class="my-slides">
            <img src="./img/san-bong2.jpg">
        </div>

        <div class="my-slides">
            <img src="./img/san-bong3.jpg">
        </div>

        <a class="prev" onclick="prevSlide(-1)">&#10094;</a>
        <a class="next" onclick="nextSlide(1)">&#10095;</a>
    </div>
</section>

<section class="main">
    <div class="container">
        <aside class="navbar">
            <h3 class="title">Sân bóng</h3>
            <ul>
                <li><a class="current" href="index.php">Trang Chủ</a></li>
                <li><a href="dangky.php">Đăng Ký</a></li>
                <li><a href="registered.php">Lịch Đã Đăng Ký</a></li>
            </ul>
        </aside>
        <article class="main-content">
            <div class="header">
                <h3 class="title">Quy định của sân bóng DUE</h3>
            </div>

            <div class="tab">
                <button class="tablinks active" onclick="openTab(event, 'tab-1')">Quy định khi đăng ký sân</button>
                <button class="tablinks" onclick="openTab(event, 'tab-2')">Quy định khi sử dụng sân</button>
            </div>

            <div id="tab-1" class="tabcontent">
                <ol type="1">
                    <li>Thời gian đăng kí phải trước thời gian diễn ra trận đấu ít nhất 1 ngày.</li>
                    <li>Người đăng kí sử dụng tài khoản của mình và chịu hoàn toàn trách nhiệm khi có vấn đề xảy ra.</li>
                    <li>Trong quá trình đăng kí cần kiểm tra kỹ lịch và thời gian đăng kí, tránh trường hợp đăng kí trùng hoặc đăng kí sai.</li>
                </ol>
                <h3 class="alert">Lưu ý về việc hủy sân:</h3>
                <ul>
                    <li>- Nếu muốn hủy lịch đã đăng kí trên web, phải liên hệ đến Trung tâm hỗ trợ sinh viên và Quan hệ doanh nghiệp theo số điện thoại 0935120488 – gặp Lê Duy.</li>
                    <li>- Nếu sinh viên đã đăng kí sân nhưng không sử dụng theo đúng lịch đã đăng kí sẽ bị phạt theo quy định của Trung tâm (100k/1 lần đăng kí).</li>
                </ul>
            </div>

            <div id="tab-2" class="tabcontent">
                <ol type="1">
                    <li>Chỉ có thành viên theo quy định của Ban tổ chức giải được tham gia thi đấu và trong khu vực sân bóng.</li>
                    <li>Thi đấu với tinh thần trung thực, cao thượng và fair-play.</li>
                    <li>Không mang giày đinh nhọn, các vật dụng nguy hiểm và gây cháy nổ trong thời gian thi đấu.</li>
                    <li>Không sử dụng rượu bia, chất kích thích, chất cấm trong khu vực sân bóng.</li>
                    <li>Có ý thức, trách nhiệm bảo vệ sân bãi và tài sản chung của Nhà trường.</li>
                    <li>Không đem đồ ăn, không xả rác trong khu vực thể thao, sân bóng, có ý thức giữ vệ sinh chung.</li>
                    <li>Tất cả các cầu thủ, khán giả đến khu thể thao gửi xe đúng nơi quy định (bãi xe trường hoặc khu Kí túc xá).</li>
                </ol>
                <h4 class="alert">Nếu vi phạm nội quy, quy định và các cam kết trên sẽ chịu trách nhiệm và các hình thức xử lý kỷ luật của Nhà trường. </h4>
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