<?php
include('../db/connection.php');
SESSION_START();
if(isset($_REQUEST['type']) && isset($_REQUEST['id']) && isset($_REQUEST['date']))
{
	
	$type=$_REQUEST['type'];
	$id=$_REQUEST['id'];
	$date=$_REQUEST['date'];
	
	$date=explode(":",$date); // Explode String As "Select Date:2017-09-12"
	
	$d=format_date($date[1]);
	
	
		$mor_time='';
		$aft_time='';
		$eve_time='';
	
	
	
	$s1="select count(*) as cnt from change_avail where staff_id='$id' and date='$d'";
	foreach ($dbh->query($s1) as $r1)
	{
		$cnt=$r1['cnt'];
		
	}
	
	if($cnt == 1)
	{
		
		$sql="select * from change_avail where staff_id='$id' and date='$d'";
	foreach ($dbh->query($sql) as $row)
	{
		$mor_time=$row['mor_time'];
		$aft_time=$row['aft_time'];
		$eve_time=$row['eve_time'];
	}
	
	//echo "<script>alert('".$row['mor_time']."');</script>";
	
	$str=explode("-",$mor_time); // Explode String 
	
	$n=sizeof($str); // Size of Array
	
	for($i=0;$i<$n;$i++)
	{
		if($str[$i]=='undefined')
		{
			$str[$i]=0;
		}
	}
		
		
	$str1=explode("-",$aft_time); // Explode String 
	
	$n1=sizeof($str1); // Size of Array
	
	for($j=0;$j<$n1;$j++)
	{
		if($str1[$j]=='undefined')
		{
			$str[$j]=0;
		}
	}
	
	$str2=explode("-",$eve_time); // Explode String 
	
	$n2=sizeof($str2); // Size of Array
	
	for($k=0;$k<$n2;$k++)
	{
		if($str2[$k]=='undefined')
		{
			$str2[$k]=0;
		}
	}
	
		if($type == 1)
		{
			?>
				<option selected="default" value='0' disabled>---Select Time---</option>
			<?php
			for($i=0;$i<$n;$i++)
			{
				if($str[$i]!=0)
				{
				
				    ?>
						
						
						<option  value="<?php echo $str[$i]."AM"?>"><?php echo $str[$i]."AM"?></option>
					
					<?php
				
				}
		
			}
		}
		else if($type == 2)
		{
			?>
				<option selected="default" value='0' disabled>---Select Time---</option>
			<?php
			for($j=0;$j<$n1;$j++)
			{
				if($str1[$j]!=0)
				{
				
				    ?>
						
						
						<option  value="<?php echo $str1[$j]."PM"?>"><?php echo $str1[$j]."PM"?></option>
					
					<?php
				
				}
		
			}
		}
		else
		{
			?>
				<option selected="default" value='0' disabled>---Select Time---</option>
			<?php
			for($k=0;$k<$n2;$k++)
			{
				if($str2[$k]!=0)
				{
				
				    ?>
						
						
						<option  value="<?php echo $str2[$k]."PM"?>"><?php echo $str2[$k]."PM"?></option>
					
					<?php
				
				}
		
			}
		}
	}
	else
	{
		$sql="select * from profile where staff_id='".$id."'";
								
								foreach($dbh->query($sql) as $row)
								{
									$m_start=$row['mor_start'];
									$m_end=$row['mor_end'];
									$a_start=$row['aft_start'];
									$a_end=$row['aft_end'];
									$e_start=$row['eve_start'];
									$e_end=$row['eve_end'];
									$time_slot=$row['time_slot'];
									
								}	
								
								$m=array();
								
								
		
		if($type == 1)
		{
			?>
				<option selected="default" value='0' disabled>---Select Time---</option>
			<?php
			$m=time_slot($m_start,$m_end,$time_slot);
			for($i=0;$i<count($m);$i++)
			{
				?>
						
						
						<option  value="<?php echo $m[$i]."AM"?>"><?php echo $m[$i]."AM"?></option>
					
					<?php
			}
		}
		else if($type == 2)
		{
			?>
				<option selected="default" value='0' disabled>---Select Time---</option>
			<?php
			$m=time_slot($a_start,$a_end,$time_slot);
			for($i=0;$i<count($m);$i++)
			{
				?>
						
						
						<option  value="<?php echo $m[$i]."PM"?>"><?php echo $m[$i]."PM"?></option>
					
					<?php
			}
		}
		else
		{
			?>
				<option selected="default" value='0' disabled>---Select Time---</option>
			<?php
			$m=time_slot($e_start,$e_end,$time_slot);
			for($i=0;$i<count($m);$i++)
			{
				?>
						
						
						<option  value="<?php echo $m[$i]."PM"?>"><?php echo $m[$i]."PM"?></option>
					
					<?php
			}
		}
	}
}
else if(isset($_REQUEST['shift_type'])  && isset($_REQUEST['time']) && isset($_REQUEST['staff_id']) && isset($_REQUEST['dt']))
{
	$type=$_REQUEST['shift_type'];
	$time=$_REQUEST['time'];
	$staff_id=$_REQUEST['staff_id'];
	$dt=$_REQUEST['dt'];
	$std_id=$_SESSION['id'];
	
	if($type != 0  && $time != 0 && !empty($staff_id) && !empty($dt))
	{
		$date=explode(":",$dt); // Explode String As "Select Date:2017-09-12"
	
	     $d=format_date($date[1]);
		 
		 $sql="INSERT INTO `student_appoinment`(`staff_id`, `student_id`, `shift_time`, `shift_date`) VALUES ('$staff_id','$std_id','$time','$d')";
		     if($dbh->query($sql))
			{
				echo "<script>$('#msg').html('Appoinment scheduled successfully');</script>";
			}
			else
			{
				echo "<script>$('#msg').html('Error To Save Data');</script>";
			}
	}
	else
	{
			if($type == 0)
			{
				
					echo "<script>$('#t').html('please select shift !!!');</script>";
			}
			else
			{
				echo "<script>$('#t').html('');</script>";
			}
			
			
			
			if($time == 0)
			{
				echo "<script>$('#tm').html('please select time !!!');</script>";
			}
			else
			{
				echo "<script>$('#tm').html('');</script>";
			}
	}
}
function format_date($r)
{
	$timezone = "America/Detroit";

    $tz = new DateTimeZone($timezone);
	$r = date("Y-m-d", strtotime($r));
	
	return $r;
	
}
function time_slot($start,$end,$slot)
{
	$starttime = $start;  // your start time
	$endtime = $end;  // End time
	$duration = $slot;  // split by 30 mins

	$array_of_time = array ();
	$start_time    = strtotime ($starttime); //change to strtotime
	$end_time      = strtotime ($endtime); //change to strtotime

	$add_mins  = $duration * 60;

	while ($start_time <= $end_time) // loop between time
	{
	   $array_of_time[] = date ("h:i", $start_time);
	   $start_time += $add_mins; // to check endtie=me
	} 
	
	return $array_of_time;
}
?>