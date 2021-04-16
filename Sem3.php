<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!-- <!doctype html>
<html>
<link rel="stylesheet" href="styles1.css">
<head>
  <title>Welcome to CMPN Repository</title>
</head>
<body>
<Img Src="Capture.png">
  <div class="navbar">
  <a href="homepage.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Curriculum
      </button>
    <div class="dropdown-content">
      <a href="sem3.php">Sem 3</a>
      <a href="#">Sem 4</a>
      <a href="#">Sem 5</a>
      <a href="#">Sem 6</a>
      <a href="#">Sem 7</a>
      <a href="#">Sem 8</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Extra Curricular
      </button>
    <div class="dropdown-content">
      <a href="#">Praxis</a>
      <a href="#">Utsav</a>
      <a href="#">Illusions</a>
      <a href="#">Octaves</a>
      <a href="#">Sphurti</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Internships
      </button>
    <div class="dropdown-content">
      <a href="#">Inhouse</a>
      <a href="#">Industry</a>
    </div>
  </div>
  <a href="#">Research</a>
  <a class="logout" href=logout.php>Log Out</a>
</div>
<! -- Side navigation -->
<!-- <div class="sidenav"> -->
  <!-- <a href="sem3.php" class="active">2020-21</a>
  <a href="#">2019-20</a>
  <a href="#">2018-19</a>
  <a href="#">2017-18</a> -->
<!-- </div> -->

<!-- Page content -->
<!-- <div class="main">
  <h2><U>SEMESTER 3</U></h2>
  <br>
  <p style="font-size:20px">
  <a href="oopm.php">Object Oriented Programming Language</a>
  <br>
  <a href="dsgtexp.php">Discrete Structure And Graph Theory</a>
  <br>
  <a href="maths.php">Applied Mathematics</a>
  <br>
  <a href="ds.php">Data Structure</a>
  <br>
  <a href="cg.php">Computer Graphics</a>
</div>
</body>
</html> --> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles1.css">

    <title>Welcome to CMPN Repository</title>
  </head>
  <body>
  <Img Src="Capture.png">
  <div class="navbar">
  <a href="homepage.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Curriculum
      </button>
    <div class="dropdown-content">
      <a href="sem3.php">Sem 3</a>
      <a href="#">Sem 4</a>
      <a href="#">Sem 5</a>
      <a href="#">Sem 6</a>
      <a href="#">Sem 7</a>
      <a href="#">Sem 8</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Extra Curricular
      </button>
    <div class="dropdown-content">
      <a href="#">Praxis</a>
      <a href="#">Utsav</a>
      <a href="#">Illusions</a>
      <a href="#">Octaves</a>
      <a href="#">Sphurti</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Internships
      </button>
    <div class="dropdown-content">
      <a href="#">Inhouse</a>
      <a href="#">Industry</a>
    </div>
  </div>
  <a href="#">Research</a>
  <a class="logout" href=logout.php>Log Out</a>
</div>
<!-- Side navigation -->
<div class="sidenav">
  <a href="sem3.php" class="active">2020-21</a>
  <a href="#">2019-20</a>
  <a href="#">2018-19</a>
  <a href="#">2017-18</a>
</div>
<div class="main">
  <h2><U>SEMESTER 3</U></h2>
  <br>
  <p style="font-size:20px">
  <!-- <a href="oopm.php">Object Oriented Programming Language</a>
  <br>
  <a href="dsgtexp.php">Discrete Structure And Graph Theory</a>
  <br>
  <a href="maths.php">Applied Mathematics</a>
  <br>
  <a href="ds.php">Data Structure</a>
  <br>
  <a href="cg.php">Computer Graphics</a> -->
  <div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Object Oriented Programming Language</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="oopm.php" class="btn btn-primary">Button</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Discrete Structure And Graph Theory</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="dsgtexp.php" class="btn btn-primary">Button</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Applied Mathematics</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="maths.php" class="btn btn-primary">Button</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Data Structure</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="ds.php" class="btn btn-primary">Button</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Computer Graphics</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="cg.php" class="btn btn-primary">Button</a>
  </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>