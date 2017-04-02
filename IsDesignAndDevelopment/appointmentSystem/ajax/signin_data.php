<?php
include('../db/connection.php');
session_start();

if(isset($_REQUEST['u_no']) && isset($_REQUEST['user_email']) )
{
	$uin=$_REQUEST['u_no'];
	$email=$_REQUEST['user_email'];
	
	
	if(!empty($uin) && !empty($email))
	{
	$s1="SELECT count(uin) as uin,id,type from signup where uin in ('$uin') and email in ('$email')";
	foreach ($dbh->query($s1) as $r1)
		{
			$uin=$r1['uin'];
			$id=$r1['id'];
			$type=$r1['type'];
		}
		
		if($uin == 0 && $id == null)
		{
			echo "<script>$('#msg1').html('your UIN or email not valid !!!');</script>";
		}
		else
		{
			if($type == 2)
			{
				$_SESSION['id'] = $id;
			
			?>
			<script>
			window.location.href = 'staff_profile.php';
			</script>
			<?php
			}
			else{
				$_SESSION['id'] = $id;
			
			?>
			<script>
			window.location.href = 'booking.php';
			</script>
			<?php
			}
			
		}
	}
	else
	{
		if($uin == '')
			{
				echo "<script>$('#uin').html('please enter  UIN number !!!');</script>";
			}
			else
			{
				echo "<script>$('#uin').html('');</script>";
			}
			
			if($email == '')
			{
				echo "<script>$('#email').html('please enter email !!!');</script>";
			}
			else
			{
				echo "<script>$('#email').html('');</script>";
			}
	}
}
?>