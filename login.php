<?php
	if (isset($_POST['login'])) {
        $conn = mysqli_connect('localhost', 'root', '123456', 'datapitch');
        //check connect
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        }
        $username = addslashes($_POST['userid']);
        $password = addslashes($_POST['password']);

        $query = mysqli_query($conn, "SELECT username FROM account WHERE username='$username' AND password='$password' ");
        $count = mysqli_num_rows($query);
        if ($count != 0) {
            header("location:index.html");
        } else{
            header( "refresh:0;url=login.php" );
            echo '<script type="text/javascript">';
            echo 'alert("Kiểm tra lại mã sinh viên hoặc mật khẩu")';
            echo '</script>';
        }
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="login" >
        <form action="" class="form-login" autocomplete="off" method="POST">
            <div class="form">
                <label for="userid" class="label-login">
                    Mã SV
                </label>
                <input type="text" name="userid" id="userid" placeholder="Nhập mã sinh viên..." required>
            </div>
            <div class="form">
                <label for="password" class="label-login">
                    Mật khẩu
                </label>
                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." required>
            </div>
            <label for="" class="show-password"><input type="checkbox" onclick="showYourPassword()">Hiển thị mật khẩu</label>
            <p id="alertText" class="alert"></p>
            <button type="submit" class="submit-login" name="login">Đăng Nhập</button>
        </form>
    </div>

    <script type="text/javascript" src="./js/scripts.js"></script>
</body>
</html>