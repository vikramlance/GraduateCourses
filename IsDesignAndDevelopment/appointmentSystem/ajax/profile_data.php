<?php
include('../db/connection.php');
session_start();

 if(isset($_REQUEST['nm']))
{
	$r=array();
	$s1="SELECT `name` FROM `signup` WHERE id='".$_SESSION['id']."'";
	    foreach ($dbh->query($s1) as $r1)
		{
			$nm=$r1['name'];
		}
		array_push($r,$nm);
		//file_put_contents('./log_'.date("j.n.Y").'.txt', $nm, FILE_APPEND);
		echo json_encode($r);
}

else if(isset($_REQUEST['dept'])  && isset($_REQUEST['frm']) && isset($_REQUEST['to']) && isset($_REQUEST['t_slot']) && isset($_REQUEST['m_start']) && isset($_REQUEST['m_end']) && isset($_REQUEST['a_start']) && isset($_REQUEST['a_end']) && isset($_REQUEST['e_start']) && isset($_REQUEST['e_end']) )
{
	
	
	$dept=$_REQUEST['dept'];
	
	$frm=$_REQUEST['frm'];
	$to=$_REQUEST['to'];
	$t_slot=$_REQUEST['t_slot'];
	$m_start=$_REQUEST['m_start'];
	$m_end=$_REQUEST['m_end'];
	$a_start=$_REQUEST['a_start'];
	$a_end=$_REQUEST['a_end'];
	$e_start=$_REQUEST['e_start'];
	$e_end=$_REQUEST['e_end'];
	$file=$_REQUEST['file'];
	
	if($dept != 'NA'  && $frm != 'NA' && $to != 'NA' && $t_slot != 'NA' && !empty($file)) //&& !empty($m_start) && !empty($m_end) && !empty($a_start) && !empty($a_end) && !empty($e_start) && !empty($e_end) && !empty($file))
	{
		
		
			$sql = "INSERT INTO `profile`(`staff_id`, `dept`, `from_day`, `to_day`, `time_slot`, `mor_start`, `mor_end`, `aft_start`, `aft_end`, `eve_start`, `eve_end`, `file`) VALUES ('".$_SESSION['id']."','$dept','$frm','$to','$t_slot','$m_start','$m_end','$a_start','$a_end','$e_start','$e_end','$file')";		
			
			if($dbh->query($sql))
			{
				echo "<script>$('#msg').html('Data Save Successfully');</script>";
			}
			else
			{
				echo "<script>$('#msg').html('Error To Save Data');</script>";
			}
		
		
	}
	else
	{
			if($dept == 0)
			{
				
					echo "<script>$('#s').html('please select department !!!');</script>";
			}
			else
			{
				echo "<script>$('#s').html('');</script>";
			}
			
			
			
			if($frm == 0)
			{
				echo "<script>$('#f').html('please select  from day !!!');</script>";
			}
			else
			{
				echo "<script>$('#f').html('');</script>";
			}
			if($to == 0)
			{
				echo "<script>$('#t').html('please select to day !!!');</script>";
			}
			else
			{
				echo "<script>$('#t').html('');</script>";
			}
			if($t_slot == 0)
			{
				echo "<script>$('#t_s').html('please select time slot !!!');</script>";
			}
			else
			{
				echo "<script>$('#t_s').html('');</script>";
			}
			if($m_start == '')
			{
				echo "<script>$('#m_s').html('please select morning start time !!!');</script>";
			}
			else
			{
				echo "<script>$('#m_s').html('');</script>";
			}
			if($m_end == '')
			{
				echo "<script>$('#m_e').html('please select morning end time !!!');</script>";
			}
			else
			{
				echo "<script>$('#m_e').html('');</script>";
			}
			if($a_start == '')
			{
				echo "<script>$('#a_s').html('please select afternoon start time !!!');</script>";
			}
			else
			{
				echo "<script>$('#a_s').html('');</script>";
			}
			if($a_end == '')
			{
				echo "<script>$('#a_e').html('please select afternoon end time !!!');</script>";
			}
			else
			{
				echo "<script>$('#a_e').html('');</script>";
			}
			if($e_start == '')
			{
				echo "<script>$('#e_s').html('please select evening start time !!!');</script>";
			}
			else
			{
				echo "<script>$('#e_s').html('');</script>";
			}
			if($e_end == '')
			{
				echo "<script>$('#e_e').html('please select evening end time !!!');</script>";
			}
			else
			{
				echo "<script>$('#e_e').html('');</script>";
			}
	}
	

	
}
else if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['userImage']['tmp_name'])) 
			{
				$sourcePath = $_FILES['userImage']['tmp_name'];
				//mkdir($_SERVER['DOCUMENT_ROOT'].'/harsh/'.'upload_image/'.$_SESSION['id']);
				$targetPath = $_SERVER['DOCUMENT_ROOT'].'/harsh/'.'upload_image/'.$_FILES['userImage']['name'];
				if(move_uploaded_file($sourcePath,$targetPath))
				{
					echo "<script>$('#file_up').html('File upload succesfully !!!');</script>";

				}
				else
				{
					echo "<script>$('#file_up').html('Error to upload upload !!!');</script>";
				}
			}
}

?>