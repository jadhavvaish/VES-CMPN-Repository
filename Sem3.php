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
<a class="upload" href="upload.php">Upload</a>
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
