<?php

include('../db/connection.php');
session_start();
//echo "<script>alert('gfmlrfg');</script>";
if(isset($_REQUEST['m_y']))
{
	$m_y=$_REQUEST['m_y'];
	$a=explode("-",$m_y);
	$month=$a[0];
	$year=$a[1];
	$events = array();
//	echo "<script>alert('".$year."');</script>";
	$e = array();
	$sql="SELECT * FROM `student_appoinment` WHERE month(shift_date)='$month' and year(shift_date)='$year' and staff_id='".$_SESSION['id']."' ";
	foreach($dbh->query($sql) as $row)
	{
		$id=$row['student_id'];
		$time=$row['shift_time'];
		$date=$row['shift_date'];
		
		$s1="SELECT `name` FROM `signup` WHERE id='$id'";
		foreach($dbh->query($s1) as $r1)
		{
			$name=$r1['name'];
		}
		
		$e['title'] = $name.' '.$time."";
		//$e['time'] = $time."";
		$e['start']=$date." ";
		$e['backgroundColor']="#"."C42121";
		
		array_push($events,$e);
	}
	
	echo json_encode($events);
}

?>