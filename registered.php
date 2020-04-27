<?php
    include "session.php";

    //connect
    $conn = mysqli_connect('localhost', 'root', '', 'datapitch');

    //check connect
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
    function prints($tab){
        $saveid = $_SESSION['saveid'];
        //echo $saveid;
        $conn = mysqli_connect('localhost', 'root', '', 'datapitch');
        $sql = "SELECT `date`, `timeslot`, `registdate` FROM `$tab` WHERE student_id = '$saveid'";
        $query = mysqli_query($conn, $sql) ;
        //$row = mysqli_fetch_assoc($query);

        //Kiem tra co lich dang ki khong
        if (mysqli_num_rows($query) > 0){
            $stt = 1;
            echo "<table>";
            echo "<tr>";
            echo "<th class='tableId'>STT</th>";
            echo "<th class='tableDay'>NGÀY</th>";
            echo "<th class='tableTime'>GIỜ</th>";
            echo "<th class='tableDate'>THỜI GIAN ĐĂNG KÍ</th>";
            echo "</tr>";

            //in du lieu ra tren tung dong
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td class='tableId'>" .$stt ."</td>";
                $date = date_create($row["date"]);
                echo "<td class='tableDay'>" .date_format($date, "d-m-Y") ."</td>";
                echo "<td class='tableTime'>" .$row["timeslot"] ."</td>";
                $datetime = date_create($row["registDate"]);
                echo "<td class='tableDate'>" .date_format($datetime, "d-m-Y H:i:s") ."</td>";
                echo "</tr>";
                $stt++;
            }
            echo "</table>";
        }
        else{
            echo "Không có lịch đăng kí ở sân";
        }
    }
    mysqli_close($conn);
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
                <li><a href="dangky.php">Đăng Ký</a></li>
                <li><a class="current" href="registered.php">Lịch Đã Đăng Ký</a></li>
            </ul>
        </aside>
        <article class="main-content">
            <div class="header">
                <h3 class="title">Sân đã đăng ký</h3>
            </div>
            <div class="tables">
                <?php
                    // Kiem tra va in lich san 1
                    echo "<h1>SÂN 1</h1>";
                    prints("book1");

                    // Kiem tra va in lich san 2
                    echo "<h1>SÂN 2</h1>";
                    prints("book2");
                ?>
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