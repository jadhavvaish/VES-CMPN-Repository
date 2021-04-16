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
  <?php include ("navbar.php"); ?>
<!-- Side navigation -->
<div class="sidenav">
  <a href="sem3.php" class="active">2020-21</a>
  <a href="#">2019-20</a>
  <a href="#">2018-19</a>
  <a href="#">2017-18</a>
</div>
<div class="main">
  <h2 class='mt-3 mb-0 ml-5'><U>SEMESTER 3</U></h2>
  <br>
  <div class="mt-0 card w-75">
  <div class="card-body">
    <h5 class="card-title">Object Oriented Programming Language</h5>
    <a href="oopm.php" class="btn btn-primary">Open</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Discrete Structure And Graph Theory</h5>
    <a href="dsgtexp.php" class="btn btn-primary">Open</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Applied Mathematics</h5>
    <a href="maths.php" class="btn btn-primary">Open</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Data Structure</h5>
    <a href="ds.php" class="btn btn-primary">Open</a>
  </div>
</div>
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Computer Graphics</h5>
    <a href="cg.php" class="btn btn-primary">Open</a>
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