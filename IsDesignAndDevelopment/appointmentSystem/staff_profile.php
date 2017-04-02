<?php
include('db/connection.php');
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff Profile</title>
  
   <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link href="main.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  .lbl
  {
	  color:red;
  }
  </style>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-left ">
				<li  ><img src="pro1.jpg" class="img-responsive" alt="Chania"  style="padding-top:20px;padding-bottom:20px;"></li>
				<li  ><h1 style="padding-left:20px;color:white;">Appoinment<br/> Scheduler</h1></li>
			</ul>
            <ul class="nav navbar-nav navbar-center " style="background-color:#009591;margin-top:25px;margin-left:50px;">
	<li class="navigation   fnt"><a href="staff_profile.php" style="padding-left: 50px;padding-right: 30px;">Profile</a></li>
   <li class="navigation   fnt"><a href="change.php" style="padding-left: 50px;padding-right: 30px;">Change Availability</a></li>
   <li class="navigation   fnt"><a href="staff_schedule.php" style="padding-left: 50px;padding-right: 30px;">My Scheduler</a></li>
    <li class="navigation   fnt"><a href="logout.php?logout" style="padding-left: 50px;padding-right: 30px;">Logout</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right ">
				<li  ><img src="pro2.jpg" class="img-responsive" alt="Chania"  style="padding-top:20px;padding-bottom:20px;"></li>
			</ul>
        </div>
    </div>
</nav>

</div>
</div>
<!--   main  -->
  <!-- Main content -->
		
    <section class="content">
      <div class="row">
		<div class="col-md-3">
			<?php
if(isset($_SESSION['id']))
{
	
											$sql = "SELECT * FROM `profile` where staff_id='".$_SESSION['id']."'";
												foreach ($dbh->query($sql) as $row)
												{
													//$user_id=$row['user_id'];
													
													$target='upload_image/'.$row['file'];
													//$targetPath = $_SERVER['DOCUMENT_ROOT'].'/harsh/'.'upload_image/'.$row['file'];
													
										?>										
										<div class="col-md-12">
			                               <div class="panel panel-default">
									<?php
									  $s1="SELECT `name` FROM `signup` WHERE id='".$row['staff_id']."'";
									  foreach ($dbh->query($s1) as $row1)
									  {
										  $name=$row1['name'];
									  }
									?>
									<div class="panel-heading"><center><h3><?php echo $name; ?></h3></center></div>
									<div class="panel-body"><center><img src="<?php echo $target; ?>" width="100px" height="100px"></center>
									<br/>
									<center style="color:green;"><h3><?php echo $row['dept']; ?></h3></center>
									<br/>
									<center><h4><?php echo $row['time_slot'].'min'.' '.'| Availability'; ?></h4> </center>
									</div>
									<center>
									<div class="panel-footer"></div>
									</center>
									</div>
									</div>
									
									
								
								<?php
								
										}
								?>	   
	
								

	<?php
}
?>
		</div>
		<div class="col-md-9">
        <!-- left column -->
		<div class="box box-primary">
			<div class="box-header with-border">
              <h3 class="box-title">Enter Your Details</h3>
            </div>
			
            <div class="box-body">
			
				<div class="col-sm-3">
	<div class="form-group">
						<label>Select Department</label>
						<select class="form-control input-sm" id="dept" >
								<option selected="default" value='NA' disabled>---Select YOur Department---</option>
									<option value='MCG School' >MCG School</option>
									<option  value='Dental Science' >Dental Science</option>
									<option  value='Others' >Others</option>
									
							
							</select>
							<label class="lbl" id="s"></label>
					</div>
	</div>
				
			
			<!--	<div class="col-md-4">
					<div class="form-group">
							<label>Date:</label>
								<div class="input-group date">
									<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
									</div>
											<input type="text" class="form-control pull-right input-sm" id="date" placeholder="Select Date">
								</div>
					</div>
				</div>  -->
				
				<div class="col-sm-3">
	<div class="form-group">
					<label>Name</label>
						<input type="text" class="form-control" id="name" name="name">
						<label class="lbl" id="n"></label>
					</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
					<label>Availability from</label>
						<select class="form-control input-sm col-sm-4" id="from" >
								<option selected="default" value='NA' disabled>---Select Day---</option>
									<option value='Mon' >Mon</option>
									<option  value='Tue' >Tue</option>
									<option  value='Wed' >Wed</option>
									<option  value='Thr' >Thr</option>
									<option  value='Fri' >Fri</option>
									<option  value='Sat' >Sat</option>
									
							
							</select>
							
		</div>
		<label class="lbl" id="f"></label>
	</div>
	<div class="col-sm-2">
	<div class="form-group">
		<label>Availability to</label>
						<select class="form-control input-sm col-sm-4" id="to" >
								<option selected="default" value='NA' disabled>---Select Day---</option>
									<option value='Mon' >Mon</option>
									<option  value='Tue' >Tue</option>
									<option  value='Wed' >Wed</option>
									<option  value='Thr' >Thr</option>
									<option  value='Fri' >Fri</option>
									<option  value='Sat' >Sat</option>
									
							
							</select>
							</div>
							<label class="lbl" id="t"></label>
	</div>
				
	<div class="col-sm-2">
	<div class="form-group">
		<label>Time slot</label>
						<select class="form-control input-sm col-sm-4" id="t_slot" >
								<option selected="default" value='NA' disabled>---Select Day---</option>
									<option value='30' >30</option>
									
							
							</select>
							</div>
							<label class="lbl" id="t_s"></label>
	</div>			
				
				
				
				
			</div>
			<div class="box-body">
			
			<div class="col-md-2">
						<div class="bootstrap-timepicker">
             
							<div class="form-group">
							  <label>Morning start time</label>

							  <div class="input-group">
								<input type="text" class="form-control input-sm timepicker"  id="m_start">

								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div>
							</div>
							</div>
						<label class="lbl" id="m_s"></label>
					</div>
					<div class="col-md-2">
						<div class="bootstrap-timepicker">
             
							<div class="form-group">
							  <label>Morning end time</label>

							  <div class="input-group">
								<input type="text" class="form-control input-sm timepicker"  id="m_end">

								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div>
							</div>
							</div>
						<label class="lbl" id="m_e"></label>
					</div>
					<div class="col-md-2">
						<div class="bootstrap-timepicker">
             
							<div class="form-group">
							  <label>Afternoon start time</label>

							  <div class="input-group">
								<input type="text" class="form-control input-sm timepicker"  id="a_start">

								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div>
							</div>
							</div>
						<label class="lbl" id="a_s"></label>
					</div>
					<div class="col-md-2">
						<div class="bootstrap-timepicker">
             
							<div class="form-group">
							  <label>Afternoon end time</label>

							  <div class="input-group">
								<input type="text" class="form-control input-sm timepicker"  id="a_end">

								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div>
							</div>
							</div>
						<label class="lbl" id="a_e"></label>
					</div>
					<div class="col-md-2">
						<div class="bootstrap-timepicker">
             
							<div class="form-group">
							  <label>Evening start time</label>

							  <div class="input-group">
								<input type="text" class="form-control input-sm timepicker"  id="e_start">

								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div>
							</div>
							</div>
						<label class="lbl" id="e_s"></label>
					</div>
					<div class="col-md-2">
						<div class="bootstrap-timepicker">
             
							<div class="form-group">
							  <label>Evening end time</label>

							  <div class="input-group">
								<input type="text" class="form-control input-sm timepicker"  id="e_end">

								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div>
							</div>
							</div>
						<label class="lbl" id="e_e"></label>
					</div>
			
			</div>
			
			<div class="box-body">
			
			<div class="col-md-8">
			<form id="uploadForm" action="ajax/profile_data.php" method="post">
				<div class="col-md-6">
				
							<label>Upload File</label>
							
									<input type="file" class="form-control input-sm" id="userImage"  name="userImage"  >
									
									<input type="hidden" id="file1" value="">
				
				</div> 
				<div class="col-md-6">
				<br/>
					<input type="submit" value="Submit" class=" btn btn-success btnSubmit" />		
				</div> 
				<label style="color:blue;" id="file_up"></label>
				</form>	
			</div>
			</div>
			
			<div class="box-body">	
			</div>
			<center>
              <div class="box-footer">
                <button type="button" class="btn btn-primary"  id="save">Save</button>
				
                
								</div>
								<label id="msg" style="color:blue;"></label>
								</center>
			
			</div>
         </div>
		</div>
		
		<!-- /.End of Form -->
		
    </section>
   <!-- /.content -->
	
 

<!--   main over -->

  <div class="navbar navbar-default navbar-fixed-bottom grey">
    <div class="container">
      <div class="row">
		<div class="col-md-12">
      <p class="navbar-text pull-left" >© 2014 - Site Built By Mr. M.
          
      </p>
	  </div>
	  </div>
    
    </div>
    
    
  </div>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- page script -->
<script src="js/profile.js"></script>
<script>
 //Date picker

  $(function(){  
	//Timepicker
    $("#m_start").timepicker({
      showInputs: false
    });
	
	//Timepicker
    $("#m_end").timepicker({
      showInputs: false
    });
	
	$("#a_start").timepicker({
      showInputs: false
    });
	
	//Timepicker
    $("#a_end").timepicker({
      showInputs: false
    });
	
	$("#e_start").timepicker({
      showInputs: false
    });
	
	//Timepicker
    $("#e_end").timepicker({
      showInputs: false
    });
  });
	
	</script>
	<script>
	
	
		
  $("#uploadForm").on('submit',(function(e) {
			
			//alert('hi');
		e.preventDefault();
		$.ajax({
        	url: "ajax/profile_data.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
				
			$("#file_up").html(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
  </script>
</body>
</html>
