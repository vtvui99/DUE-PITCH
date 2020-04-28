<?php
    include("session.php");
?>
<?php 
$mysqli=new mysqli('localhost','root','','datapitch');
$mysqli->query("SET NAMES 'utf8'");
$stmt = $mysqli->query("SELECT * FROM table_name", MYSQLI_STORE_RESULT);
if(isset($_GET['date'])){
  $date=$_GET['date'];
  $stmt=$mysqli->prepare("select*from book2 where date=?");
  $stmt->bind_param('s',$date);
  $bookings=array();
  if($stmt->execute()){
    $result=$stmt->get_result();
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        $bookings[]=$row['timeslot'];
      }

      $stmt->close();
    }
  }
}

if(isset($_POST['submit'])){
  $name=$_SESSION['login_user'];
  $student_id=$_SESSION['saveid'];
  $timeslot=$_POST['timeslot'];
  $class=$_SESSION['saveclass'];
  $phone1=$_POST['phone1'];
  $phone2=$_POST['phone2'];
  $purpose=$_POST['purpose'];

  $stmt=$mysqli->prepare("select*from book2 where date=? AND timeslot=?");
  $stmt->bind_param('ss',$date,$timeslot);
 
  if($stmt->execute()){
    $result=$stmt->get_result();
    if($result->num_rows>0){
      $msg="<div class='alert alert-dangers'>Already Booked</div>";
      
    }else{
      $stmt=$mysqli->prepare("INSERT INTO book2 (name,timeslot,student_id,class,phone1,phone2,purpose,date) VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bind_param('ssssssss',$name,$timeslot,$student_id,$class,$phone1,$phone2,$purpose,$date);
  $stmt->execute();
  $msg="<div class='alert alert-success'>Đặt lịch thành công</div>";
  $bookings[]=$timeslot;
  $stmt->close();
  $mysqli->close();

    }
  }
  
  
}

$duration=60;
$cleanup=0;
$start="07:00";
$end="21:00";


function timeslots($duration,$cleanup,$start,$end){
  $start=new DateTime($start);
  $end=new DateTime($end);
  $interval=new DateInterval("PT".$duration."M");
  $cleanupInterval=new DateInterval("PT".$cleanup."M");
  $slots=array();

  for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
    $endPeriod=clone $intStart;
    $endPeriod->add($interval);
    if($endPeriod>$end){
      break;
    }

    $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");

  }

  return $slots;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đặt lịch</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
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
            <aside class="navbar" style="display: inline-block; margin: 20px 0 -20px;">
                <h3 class="title">Lịch đặt sân</h3>
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a class="current" href="dangky.php">Đăng Ký</a></li>
                    <li><a href="registered.php">Lịch Đã Đăng Ký</a></li>
                </ul>
            </aside>
        </div>
    </section>
    <div class="container">
        <h1 class="text-center">Ngày đang chọn: <?php echo date('m/d/Y',strtotime($date)); ?></h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($msg)?$msg:""; ?>
            </div>
            <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
          foreach($timeslots as $ts){
         ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php if(in_array($ts,$bookings)){?>
                    <button class="btn btn-danger"><?php echo $ts;?></button>
                    <?php }else{ ?>
                    <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>

                    <?php } ?>

                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chọn lịch: <span id="slot"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Khung giờ: </label>
                                    <input required type="text" readonly name="timeslot" id="timeslot"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Họ và tên: </label>
                                    <b><?php echo $_SESSION['login_user']; ?></b>
                                </div>

                                <div class="form-group">
                                    <label for="">Lớp: </label>
                                    <b><?php echo $_SESSION['saveclass']; ?></b>
                                </div>
                                <div class="form-group">
                                    <label for="">Mã sinh viên: </label>
                                    <b><?php echo $_SESSION['saveid']; ?></b>
                                </div>

                                <div class="form-group">
                                    <label for="">Số điện thoại liên hệ: </label>
                                    <input required type="text" name="phone1" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Số điện thoại dự phòng: </label>
                                    <input type="text" name="phone2" class="form-control">
                                </div>

                                <div class="form-group purpose">
                                    <label for="">Mục đích: </label><br>
                                    <div>
                                        <input required type="radio" name="purpose" value="0">
                                        <label for="">Tổ chức giải đấu khoa</label><br>
                                        <input required type="radio" name="purpose" value="1">
                                        <label for="">Đá giao hữu</label><br>
                                    </div>
                                </div>

                                <div class="form-group pull-right">
                                    <button class="btn btn-primary" type="submit" name="submit">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container" style="text-align: center; margin-bottom: 15px;">
        <button class="back"><a href="dangky.php">Quay lại</a></button>
    </div>
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
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7I2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script>
    $(".book").click(function() {
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
    })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

</html>