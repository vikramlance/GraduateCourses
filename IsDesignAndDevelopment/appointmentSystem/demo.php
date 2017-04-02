<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Home Page</title>
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

<div class="col-md-4" style="padding-bottom:10px;padding-top:10px;">

<a href="signup.php" style="margin-left:150px"><button type="button" class="btn btn-primary">sign up</button></a>

<a href="signin.php" ><button type="button" class="btn btn-primary">sign in</button></a>

</div>
</div>
</div>
</div>


<nav class="navbar navbar-inverse navbar-static-top navi" role="navigation">
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
            <ul class="nav navbar-nav navbar-right ">
      <li class="navigation fnt"><a href="index.php" style="
    padding-left: 50px;
    padding-right: 50px;
">Home</a></li>
 
      <li  class="navigation fnt"><a href="about.php"style="
    padding-left: 50px;
    padding-right: 50px;
">ABOUT US</a></li>
     <li class="dropdown navigation fnt">
        <a class="dropdown-toggle navigation " data-toggle="dropdown" href="#">DEPARTMENT
        <span class="caret"></span></a>
        <ul class="dropdown-menu ">
          <li><a href="mcg.php"  style="
    padding-left: 50px;
    padding-right: 50px;
">MCG SCHOOL</a></li>
          <li class="navigation "><a href="detal.php"style="
    padding-left: 50px;
    padding-right: 50px;
">Detal School</a></li>
          <li class="navigation "><a href="other.php"style="
    padding-left: 50px;
    padding-right: 50px;
">Other</a></li>
        </ul>
      </li>
      <li class="navigation   fnt"><a href="contact.php"style="
    padding-left: 50px;
    padding-right: 50px;
">Contact</a></li>
    </ul>
        </div>
    </div>
</nav>
<div class="container" style="line-height:0px;">
<div class="row">
<div class="col-md-12">

  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" >
      <div class="item active">
        <img src="11.jpg" class="img-responsive" alt="Chania" >
      </div>

      <div class="item">
        <img src="22.jpg" class="img-responsive" alt="Chania" >
      </div>
    
      <div class="item">
        <img src="33.jpg" class="img-responsive" alt="Flower" >
      </div>

      <div class="item">
        <img src="22.jpg" class="img-responsive" alt="Flower" >
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</div>
</div>

  
  
  
  
  
<div class="container-fluid bg-grey">
  <div class="row">
  <div class="col-md-12" style="padding-top: 25px;padding-bottom: 75px;">
  <div class="col-md-4">
  </div>
  
    <div class="col-md-4">
      <h1> Schedule your appointment online</h1>
    </div>
	<div class="col-md-4">
<a href="booking.php">	<button type="button"  class="btn btnn btn-primary">Book An Appointment</button></a>

  </div>
  
	
	
  </div>
</div>
</div>




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

</body>
</html>
