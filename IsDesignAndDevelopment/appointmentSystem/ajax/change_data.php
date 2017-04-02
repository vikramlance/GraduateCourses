<?php
include('../db/connection.php');
session_start();
$str='';
$str1='';
$str2='';
if(isset($_REQUEST['date']) && isset($_REQUEST['str']) && isset($_REQUEST['str1'])  && isset($_REQUEST['str2']))
{
	$a=$_REQUEST['date'];	// Date
	
	$date=explode(":",$a); // Explode String As "Select Date:2017-09-12"
	
	$d=format_date($date[1]);
	
	//echo "<script>alert('".$_SESSION['id']."');</script>";
	
	$str=$_REQUEST['str']; //morning time Array as String
	
	$str1=$_REQUEST['str1']; //afternoon time Array as String
	
	$str2=$_REQUEST['str2']; //evening time Array as String
	
	$sql="select count(*) as cnt from change_avail where date='$d' and staff_id='".$_SESSION['id']."'";
	foreach($dbh->query($sql) as $row)
	{
		$cnt=$row['cnt'];
	}
	if($cnt==1)
	{
		$sql="UPDATE `change_avail` SET `mor_time`='$str',`aft_time`='$str1',`eve_time`='$str2' WHERE `date`='$d' and `staff_id`='".$_SESSION['id']."'";
		if($dbh->query($sql))
		{
			
		}
	}
	else
	{
		$sql="INSERT INTO `change_avail`(`staff_id`, `date`, `mor_time`, `aft_time`, `eve_time`) VALUES ('".$_SESSION['id']."','$d','$str','$str1','$str2')";
	           if($dbh->query($sql))
				{
					//echo '<script>$(".fc-widget-content").find("[data-date="'.$d.'"]").css("background-color", "#FFDEAD"); </script>';
				echo '<script>$(".fc-widget-content .fc-day-grid-container .fc-day-grid .fc-row .fc-bg table tbody tr ").find("[data-date='.$d.']").text("Modified");</script>';
				echo '<script>$(".fc-widget-content .fc-day-grid-container .fc-day-grid .fc-row .fc-bg table tbody tr ").find("[data-date='.$d.']").css("background-color", "#FFDEAD");</script>';
					
				}
				else
				{
					echo "<script>alert('Error to Save Data');</script>";
				}
	
	}
	$str='';
	$str1='';
	$str2='';
}
else if(isset($_REQUEST['m_y']))
{
	$m_y=$_REQUEST['m_y'];
	$date=explode("-",$m_y);
	$sql="SELECT `date` FROM `change_avail` WHERE month(`date`)='$date[0]' and year(`date`)='$date[1]' and `staff_id`='".$_SESSION['id']."' GROUP BY date ASC ";
	foreach($dbh->query($sql) as $row)
	{
			
			$date=$row['date'];
			echo '<script>$(".fc-widget-content .fc-day-grid-container .fc-day-grid .fc-row .fc-bg table tbody tr ").find("[data-date='.$date.']").text("Modified");</script>';
			echo '<script>$(".fc-widget-content .fc-day-grid-container .fc-day-grid .fc-row .fc-bg table tbody tr ").find("[data-date='.$date.']").css("background-color", "#FFDEAD");</script>';
				
		
	}
	
}
function format_date($r)
{
	$timezone = "America/Detroit";

    $tz = new DateTimeZone($timezone);
	$r = date("Y-m-d", strtotime($r));
	
	return $r;
	
}
?>