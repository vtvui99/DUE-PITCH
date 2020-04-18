
<?php 
function build_calendar($month,$year){
	$mysqli=new mysqli('localhost','root','','duepitch');
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
	<style>
		
		table{
			table-layout: fixed;
		}

		td{
			width: 33%;
		}

		.today{
			background: yellow;
		}
		
		h3{
		  text-align: center;
		  margin-top:50px; 
		  text-decoration: none;
 
		}
		h3 a{
		  color: red;
		  text-decoration: none;

		}
	</style>
	<title>Lich</title>
</head>
<body>
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
</body>
<footer>
     <h3><button><a href="dangky.php">Back</a></button></h3>
</footer>
</html>