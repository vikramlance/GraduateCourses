<?php
include('../db/connection.php');

if(isset($_REQUEST['type']) && isset($_REQUEST['name']) && isset($_REQUEST['uin']) && isset($_REQUEST['email']) && isset($_REQUEST['pass1']) && isset($_REQUEST['pass2']))
{
	$type=$_REQUEST['type'];
	$name=$_REQUEST['name'];
	$uin=$_REQUEST['uin'];
	$email=$_REQUEST['email'];
	$pass1=$_REQUEST['pass1'];
	$pass2=$_REQUEST['pass2'];
	
	if($pass1 == $pass2)
	{
	
	if($type != 0 && !empty($name) && !empty($uin) && !empty($email) && !empty($pass1) && !empty($pass2))
	{
		$s1="select count(uin_no) as cnt from uin where uin_no in ('$uin')";
		foreach ($dbh->query($s1) as $r1)
		{
			$cnt=$r1['cnt'];
		}
		
		if($cnt != 0)
		{
			$sql = "INSERT INTO `signup`(`type`, `name`, `uin`, `email`, `pass`) VALUES ('$type','$name','$uin','$email','$pass1')";		
			
			if($dbh->query($sql))
			{
				echo "<script>$('#msg').html('Data Save Successfully');</script>";
			}
			else
			{
				echo "<script>$('#msg').html('Error To Save Data');</script>";
			}
		}
		else{
			echo "<script>$('#msg').html('please enter valid UIN number !!!');</script>";
		}
		
	}
	else
	{
			if($type == 0)
			{
				
					echo "<script>$('#t').html('please select user type !!!');</script>";
			}
			else
			{
				echo "<script>$('#t').html('');</script>";
			}
			
			if($name == '')
			{
				echo "<script>$('#n').html('please enter  name !!!');</script>";
			}
			else
			{
				echo "<script>$('#n').html('');</script>";
			}
			
			if($uin == '')
			{
				echo "<script>$('#u').html('please select UIN number !!!');</script>";
			}
			else
			{
				echo "<script>$('#u').html('');</script>";
			}
			if($email == '')
			{
				echo "<script>$('#e').html('please enter email !!!');</script>";
			}
			else
			{
				echo "<script>$('#e').html('');</script>";
			}
			if($pass1 == '')
			{
				echo "<script>$('#p1').html('please enter password !!!');</script>";
			}
			else
			{
				echo "<script>$('#p1').html('');</script>";
			}
			if($pass2 == '')
			{
				echo "<script>$('#p2').html('please re-enter password !!!');</script>";
			}
			else
			{
				echo "<script>$('#p2').html('');</script>";
			}
	}
	}
	else
	{
		echo "<script>$('#msg').html('password do not match !!!');</script>";
	}
}
?>