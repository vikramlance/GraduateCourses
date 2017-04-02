
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="main.css" rel="stylesheet" type="text/css">
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
	  HEIGHT:50%;
     
  }
 .lbl
 {
	 color:red;
 }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="col-md-4">
</div>


<div class="col-md-4">



</div>

<div class="col-md-4 pull-right" style="padding-bottom:10px;padding-top:10px;">

<a href="signup.php" ><button type="button" class="btn btn-primary">sign up</button></a>

<a href="signin.php"><button type="button" class="btn btn-primary">sign in</button></a>

</div>
</div>
</div>
</div>

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
            <ul class="nav navbar-nav navbar-center" style="background-color:#009591;margin-top:25px;margin-left:50px;">
      <li class="navigation fnt"><a href="index.php" style="
    padding-left: 50px;
    padding-right: 50px;
">Home</a></li>
 
      <li  class="navigation fnt"><a href="about.php"style="
    padding-left: 20px;
    padding-right: 50px;
">ABOUT US</a></li>
     <li class="dropdown navigation fnt">
        <a class="dropdown-toggle navigation " data-toggle="dropdown" href="#">DEPARTMENT
        <span class="caret"></span></a>
        <ul class="dropdown-menu ">
          <li><a href="mcg.php"  style="
    padding-left: 20px;
    padding-right: 50px;
">MCG SCHOOL</a></li>
          <li class="navigation "><a href="detal.php"style="
    padding-left: 20px;
    padding-right: 50px;
">Detal School</a></li>
          <li class="navigation "><a href="other.php"style="
    padding-left: 20px;
    padding-right: 50px;
">Other</a></li>
        </ul>
      </li>
      <li class="navigation   fnt"><a href="contact.php"style="
    padding-left: 20px;
    padding-right: 50px;
">Contact</a></li>

    </ul>
	
	<ul class="nav navbar-nav navbar-right ">
				<li  ><img src="pro2.jpg" class="img-responsive" alt="Chania"  style="padding-top:20px;padding-bottom:20px;"></li>
			</ul>
        </div>
    </div>
</nav>
<!--   main  -->
<h1 style="padding-left:25px;">Sign Up Form</h1>
<div class="container-fluid bg-main" style="height:600px;">
  <div class="row">
   <div class="col-md-12" >
  
    <div class="col-sm-4">
	</div>
    <div class="col-sm-4">
     
  <p style="font-size: 30px;">



    <div class="form-area">  
	
        <form role="form">
		
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Enter Your Details</h3>
					<div class="form-group">
						<select class="form-control input-sm" id="type" >
								<option selected="default" value='0' disabled>---Select User Type---</option>
									<option value='1' >Student</option>
									<option  value='2' >Staff</option>		
							
							</select>
							
							<label class="lbl" id="t"></label>
					</div>
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
						<label class="lbl" id="n"></label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="uin" name="uin" placeholder="Enter Your UIN" required>
						<label class="lbl" id="u"></label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
						<label class="lbl" id="e"></label>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter Password" required>
						<label class="lbl" id="p1"></label>
					</div>
                    <div class="form-group">
						<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Re-enter password" required>
						<label class="lbl" id="p2"></label>
					</div>
                    
          <div class="form-group">  
        <button type="button" id="signup_save" class="btn btn-primary " >Save</button>
		<label id="msg" style="color:blue;"></label>
		</div>
		
        </form>
		
    </div>

    </div>
	<div class="col-sm-4">
	</div>
  </div>
</div>
</div>


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
<!-- page script -->

<script src="js/signup.js"></script>

</body>
</html>
