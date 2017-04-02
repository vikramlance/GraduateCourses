<?php
include('db/connection.php');
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: signin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff Schedule</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link href="main.css" rel="stylesheet" type="text/css">
 
  <style>
  .fc-other-month #any,.fc-other-month #a ,.fc-other-month .block ,.fc-other-month #b{
	  display:none;
  }
  
  .a{
	  position: absolute;
	 top:50px;
	  left:50px;
	  
  }
  .b{
	  position: absolute;
	  top:70px;
	  left:50px;
  }
 
  
  .fc-week{
		height:100px !important;
  }
  .lbl{
	  color:red;
  }
  </style>

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-inverse navi" style=" margin-bottom:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
	<ul class="nav navbar-nav navbar-left ">
				<li  ><img src="pro1.jpg" class="img-responsive" alt="Chania"  style="padding-top:20px;padding-bottom:20px;"></li>
				<li  ><h1 style="padding-left:20px;color:white;">Appoinment<br/> Scheduler</h1></li>
			</ul>
    <ul class="nav navbar-nav navbar-center " style="background-color:#009591;margin-top:25px;margin-left:50px;">
	<li class="navigation   fnt" ><a href="booking.php"style="padding-left: 50px;padding-right: 30px;">Appoinment Booking</a></li>
   <li class="navigation   fnt" ><a href="student_calendar.php"style="padding-left: 50px;padding-right: 30px;">My Scheduler</a></li>
    <li class="navigation   fnt"><a href="logout.php?logout"style="padding-left: 50px;padding-right: 30px;">Logout</a></li>
   
    </ul>
	<ul class="nav navbar-nav navbar-right ">
				<li  ><img src="pro2.jpg" class="img-responsive" alt="Chania"  style="padding-top:20px;padding-bottom:20px;"></li>
			</ul>
  </div>
</nav>

</div>
</div>
<h1 style="padding-left:25px;">Appoinment Booking</h1>
<div class="wrapper" style="    background-color:white;">

   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-9" >
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
			  <br/>
			   
			  
				
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
		<div class="col-md-3">
			<?php
if(isset($_GET['id']))
{
	
											$sql = "SELECT * FROM `profile` where staff_id='".$_GET['id']."'";
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
		
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  

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

</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Day Wise Entry<span id="date" style="float:right;padding-right:10px;"></span></h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
			<div class="col-md-12">
				<div class="form-group">
					<select class="form-control input-sm" id="type" >
								<option selected="default" value='0' disabled>---Select Shift---</option>
									<option value='1' >Morning</option>
									<option  value='2' >Afternoon</option>	
									<option  value='3' >Evening</option>										
							
							</select>
				</div>
				<label id="t" class="lbl"></label>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<select class="form-control input-sm" id="time" >
								
																			
							
							</select>
				</div>
				<label id="tm" class="lbl"></label>
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="modal_save">Save</button>
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="hidden" id="staff_id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>">
		  <label id="msg" style="color:blue;"></label>
        </div>
      </div>
      
    </div>
  </div>
 
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- textarea max length js -->
<script type="text/javascript" src="js/MaxLength.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
   /*    events: [
        
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    }); */
	
	dayClick: function(date, jsEvent, view) {
		  var dt=date.format();
		dt = new Date(dt);
		var d = dt.getDate();
		var m = (dt.getMonth()+1);
		if (d<10)
			d = "0"+d;
		if(m < 10)
			m = "0"+m;
		dt= d+"-"+m+"-"+dt.getFullYear();
		$("#date").text('Selected Date:' + dt);
		//alert(date.format());
		$("#myModal").modal();/*
        alert('Clicked on: ' + date.format());

        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

        alert('Current view: ' + view.name);

        // change the day's background color just for fun
        $(this).css('background-color', 'red');*/

    }
    });


    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
	
	$(document).on("change","#type",function()
	{
		var type=document.getElementById('type').value;
		var id=document.getElementById('staff_id').value;
		var date = $('#date').text(); // Format:Selected Date:2017-02-15
		$.ajax({ 
							type: "POST",
							url: "ajax/booking_calendar.php?type="+type+"&id="+id+"&date="+date,
							success: function(data)
							{
								//alert(data);
								$('#time').html(data);
							}
		});
		
	});
	
	$('#modal_save').click(function () {
		
		var shift_type=document.getElementById('type').value;
		var time=document.getElementById('time').value;
		var staff_id=document.getElementById('staff_id').value;
		var dt = $('#date').text(); // Format:Selected Date:2017-02-15
		
		$.ajax({ 
							type: "POST",
							url: "ajax/booking_calendar.php?shift_type="+shift_type+"&time="+time+"&staff_id="+staff_id+"&dt="+dt,
							success: function(data)
							{
								$('#t').html(data);
								$('#tm').html(data);
								$('#msg').html(data);
								
								$('#type').val('0');
								$('#time').val('0');
								
							}
		});
	});
  });
</script>


</body>
</html>
