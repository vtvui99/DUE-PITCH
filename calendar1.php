<?php
    include("session.php");
?>
<?php 
function build_calendar($month,$year){
	$mysqli=new mysqli('localhost','root','','datapitch');
	$daysOfWeek=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$firstDayOfMonth=mktime(0,0,0,$month,1,$year);
	$numberDays=date('t',$firstDayOfMonth);
	$dateComponents=getdate($firstDayOfMonth);
	$monthName=$dateComponents['month'];
	$dayOfWeek=$dateComponents['wday'];
	$datetoday=date('Y-m-d');
	$calendar="<table class='table table-bordered'>";
	$calendar.="<center><h2>$monthName $year</h2>";
	$calendar.="<a class='btn btn-xs btn-primary'href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a>";

	$calendar.="<a class='btn btn-xs btn-primary'href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";

	$calendar.="<a class='btn btn-xs btn-primary'href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br>";

	$calendar.="<tr>";
	foreach($daysOfWeek as $day){
		$calendar.="<th class='header'>$day</th>";
	}

	$currentDay=1;

	$calendar.="</tr><tr>";

	if($dayOfWeek>0){
		for($k=0;$k<$dayOfWeek;$k++){
			$calendar.="<td class='empty'></td>";

		}
	}


	$month=str_pad($month,2,"0",STR_PAD_LEFT);

	while($currentDay<=$numberDays){

		if($dayOfWeek==7){

			$dayOfWeek=0;
			$calendar.="</tr><tr>";

		}
	

	$currentDayRel=str_pad($currentDay,2,"0",STR_PAD_LEFT);
	$date="$year-$month-$currentDayRel";

	 $dayname=strtolower(date('I',strtotime($date)));
	 $eventNum=0;
	 $today=$date==date('Y-m-d')?"today":"";
	 if($date<date('Y-m-d')){
	 	$calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
	 }else{

	 	$totalbookings=checkSlots($mysqli,$date);
	 	if($totalbookings==14){
	 		$calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#'class='btn btn-danger btn-xs'>All Booked</a>";

	 	}else{
	 		$calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book1.php?date=".$date."'class='btn btn-success btn-xs'>Book</a>";
	 	}
	 	
	 }



	 $calendar.="</td>";

	 $currentDay++;
	 $dayOfWeek++;
	}

  if($dayOfWeek!=7){
  	$remainingDays=7-$dayOfWeek;
  	for($i=0;$i<$remainingDays;$i++){
  		$calendar.="<td></td>";
  	}
  }

  $calendar.="</tr>";
  $calendar.="</table>";

  echo $calendar;



}

function checkSlots($mysqli,$date){
	$stmt=$mysqli->prepare("select*from book1 where date =?");
	$stmt->bind_param('s',$date);
	$totalbookings=0;
	if($stmt->execute()){
		$result=$stmt->get_result();
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$totalbookings++;
			}

			$stmt->close();
		}
	}

	return $totalbookings;

}

?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.css">
    <title>Lich</title>
</head>

<body>
    <header>
        <div class="container">
            <a class="logo" href="index.php"><img src="./img/logo-truong.png" alt="Logo DUE" title="Logo DUE"></a>
            <div class="header-right">
                <button onclick="dropdownMenu()" class="dropdown-button"><?php echo $_SESSION['login_user']; ?></button>
                <div id="dropdown" class="dropdown-content">
                    <a href="#">Thiết lập tài khoản</a>
                    <a href="logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="container">
            <aside class="navbar" style="display: inline-block; margin: 20px 0 -20px;">
                <h3 class="title">Sân 1</h3>
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a class="current" href="dangky.php">Đăng Ký</a></li>
                    <li><a href="registered.php">Lịch Đã Đăng Ký</a></li>
                </ul>
            </aside>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
				$dateComponents=getdate();
				if(isset($_GET['month']) && isset($_GET['year'])){
					$month=$_GET['month'];
					$year=$_GET['year'];
				}else{

					$month=$dateComponents['mon'];
					$year=$dateComponents['year'];
				}

				echo build_calendar($month,$year);
				?>
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
</body>

</html>