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
  .fc-time{
   display : none;
}
  
  </style>

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
	<li class="navigation   fnt"><a href="booking.php"style="padding-left: 50px;padding-right: 30px;">Appoinment Booking</a></li>
   <li class="navigation   fnt"><a href="student_calendar.php"style="padding-left: 50px;padding-right: 30px;">My Scheduler</a></li>
    <li class="navigation   fnt"><a href="logout.php?logout"style="padding-left: 50px;padding-right: 30px;">Logout</a></li>
   
    </ul>
	<ul class="nav navbar-nav navbar-right ">
				<li  ><img src="pro2.jpg" class="img-responsive" alt="Chania"  style="padding-top:20px;padding-bottom:20px;"></li>
			</ul>
        </div>
    </div>
</nav>

</div>
</div>
<h1 style="padding-left:25px;">My Scheduler</h1>
<div class="wrapper" style="    background-color:white;">

   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12" >
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

<!-- Page specific script -->
<script>
var json_events;
  $(document).ready(function () {
	  
	  
	  var date = new Date();
		var d = date.getDate(),
        m = date.getMonth()+1,
        y = date.getFullYear();
		
		if(m < 10)
		{
				 m='0'+m;
		}
		var m_y=m+"-"+y;
	  
	  $.ajax({
		  
		url: "ajax/allocation_data.php",
        type: 'POST', // Send post data
		data: 'm_y='+m_y,
        async: false,
        success: function(s)
		{
			
        	json_events = s;
			//alert(json_events);
			//var a=JSON.parse(json_events);
			   
			
        }
	});
  });

    /* initialize the external events
     -----------------------------------------------------------------*/
    /* function ini_events(ele) {
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

    ini_events($('#external-events div.external-event')); */

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
	$(function () {
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
		
	events: JSON.parse(json_events),
		
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
	
	 
    }); 


    /* ADDING EVENTS */
    /* var currColor = "#3c8dbc"; //Red by default
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
      } */

      //Create events
     /*  var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    }); */
	
	
  });
</script>


</body>
</html>
