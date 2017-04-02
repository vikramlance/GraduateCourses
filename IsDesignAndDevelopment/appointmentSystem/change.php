<?php
include('db/connection.php');
session_start();
if(!isset($_SESSION['id']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Change Availability</title>
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
  
  </style>

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-inverse navbar-static-top " role="navigation">
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
			
	<li class="navigation   fnt"><a href="staff_profile.php"style="padding-left: 50px;padding-right: 30px;">Profile</a></li>
   <li class="navigation   fnt"><a href="change.php"style="padding-left: 50px;padding-right: 30px;">Change Availability</a></li>
   <li class="navigation   fnt"><a href="staff_schedule.php"style="padding-left: 50px;padding-right: 30px;">My Scheduler</a></li>
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
<h1 style="padding-left:25px;">Change Availability</h1>
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
		<span id="date"></span>
          <div class="box-body">
			<div class="col-md-12">
				<div class="form-group">
                  <label for="loc">Morning Time:</label><br/>
				  		<?php
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
								
								$sql="select * from profile where staff_id='".$_SESSION['id']."'";
								
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
								$j=1;
								$m=time_slot($m_start,$m_end,$time_slot);
								for($i=0;$i<count($m);$i++)
								{
								?>
								<li style="display:inline;padding-left:0px;">
								<input type="checkbox" name="arr1" class='check' id="<?php echo "any".$j; ?>" value="<?php echo $m[$i].'AM'; ?>" checked>&nbsp;&nbsp;<?php echo $m[$i].'AM'; ?>&nbsp;&nbsp;
								</li>
									
								<?php
								$j++;
								}
								?>
						
                </div>
              
				</div>
				<div class="col-md-12">
				<div class="form-group">
                  <label for="loc">Afternoon TIme: </label><br/>
				  <?php
								$m=array();
								$j=1;
								$m=time_slot($a_start,$a_end,$time_slot);
								for($i=0;$i<count($m);$i++)
								{
								?>
								<li style="display:inline;padding-left:0px;">
								<input type="checkbox" name="arr2" class='check' id="<?php echo "aft".$j; ?>" value="<?php echo $m[$i].'PM'; ?>" checked>&nbsp;&nbsp;<?php echo $m[$i].'PM'; ?>&nbsp;&nbsp;
								</li>
									
								<?php
								$j++;
								}
								?>
							
                </div>
              
				</div>
				<div class="col-md-12">
				<div class="form-group">
                  <label for="loc">Evening TIme: </label><br/>
				  <?php
								$m=array();
								$j=1;
								$m=time_slot($e_start,$e_end,$time_slot);
								for($i=0;$i<count($m);$i++)
								{
								?>
								<li style="display:inline;padding-left:0px;">
								<input type="checkbox" name="arr3" class='check' id="<?php echo "eve".$j; ?>" value="<?php echo $m[$i].'PM'; ?>" checked>&nbsp;&nbsp;<?php echo $m[$i].'PM'; ?>&nbsp;&nbsp;
								</li>
									
								<?php
								$j++;
								}
								?>
							
                </div>
              
				</div>
				
				<div class="col-md-12">
				   
				</div>
		  </div>
		  
        </div>
        <div class="modal-footer">
		  <button type="button" class="btn btn-primary" style="width:10%;" id="modal_save" >Save</button>
          <button type="button" class="btn btn-default" id="modal_close" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div id='msg'></div>
 <!--    Modal Over --> 
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
  $(function () {
	  
	  
setTimeout(function() {
	/*-------- Onload Retrive Checkbox Data---------------*/
			var mon_year=$('#calendar .fc-toolbar .fc-center').find('h2').text(); // March,2016 
			var m = mon_year.split(" ");
			var monthNames =["January","February","March","April","May","June","July","August","September","October","November","December"];
			temp =  monthNames.indexOf(m[0]);
			
			temp++;
			if(temp < 10)
			{
				 temp='0'+temp;
			}
			
			//alert(temp);
			var m_y=temp+"-"+m[1];
			//alert(m_y);
		
		$.ajax({ 
							type: "POST",
							url: "ajax/change_data.php?m_y="+m_y,
							
							success: function(data)
							{
								//alert(data);
									$('#msg').html(data);
									
							}
								
		}); 
 }, 500);/* initialize the external events
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
    var j=1;
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
  });
  
  /*------------	Modal Save Button	----------*/ 
	var i=0;
	
	var str="";
	var j=1;
	
	var k=0;
	var str1="";
	var l=1;
	
	var k1=0;
	var str2 ="";
	var l1=1;
	var temp='';
    $('#modal_save').click(function () {
		
			var date = $('#date').text(); // Format:Selected Date:2017-02-15

			            $('input[name=arr1]').each(function() {
								
									i++;
								
							});
							
							i++;
							//alert(i);
							
							for(j = 1; j <  i; j++)
							{
								var temp="any"+j;
								var temp = $('#any'+j+':checked').val();
								if(j==1)
								{
									str=temp;
								}
								else
								{
									str=str+"-"+temp;	// Location Value in String
								}
								//alert(str);
							} 
							i=0;
							j=1;
							
							
							$('input[name=arr2]').each(function() {
								
									k++;
								
							});
							
							k++;
							//alert(k);
							for(l = 1; l <  k; l++)
							{
								var temp1="aft"+l;
								var temp1 = $('#aft'+l+':checked').val();
								if(l==1)
								{
									str1=temp1;
								}
								else
								{
									str1=str1+"-"+temp1;	// Location Value in String
								}
								//alert(str);
							} 
							k=0;
							l=1;
							
							$('input[name=arr3]').each(function() {
								
									k1++;
								
							});
							
							k1++;
							//alert(k1);
							for(l1 = 1; l1 <  k1; l1++)
							{
								var temp2="eve"+l1;
								var temp2 = $('#eve'+l1+':checked').val();
								if(l1==1)
								{
									str2=temp2;
								}
								else
								{
									str2=str2+"-"+temp2;	// Location Value in String
								}
								//alert(str);
							} 
							k1=0;
							l1=1;
							$.ajax
								({ 
									type: "POST",
									url: "ajax/change_data.php?date="+date+"&str="+str+"&str1="+str1+"&str2="+str2,
									
									success: function(data)
									{
										str='';
										str1='';
										str2='';
										//alert(data);
										$('#msg').html(data);
										$('#myModal').modal('hide'); 
										alert('Data Save Successfully');
										
									}
								});
			
	
	});
	
</script>


</body>
</html>
