<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
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
<!-- Side navigation -->
<div class="sidenav">
  <a href="sem3.php" class="active">2020-21</a>
  <a href="#">2019-20</a>
  <a href="#">2018-19</a>
  <a href="#">2017-18</a>
</div>

<!-- Page content -->
<div class="main">
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
</html>
