<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// SQL query to select data from database
$sql = "SELECT * FROM upload ORDER BY id DESC LIMIT 10;";
$result = $link->query($sql);
$link->close();
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
  <center>
  <h1 class='mt-2'>Welcome to VES CMPN Repository</h1>
  <fieldset>
  <h2 class='mt-2'> <legend exp><strong> <ins><p style="font-size:30px">Recently Added</legend> </h2>
  <!-- TABLE CONSTRUCTION-->
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
             <?php 
               while($rows=$result->fetch_assoc())
              {
              ?>
              <div class="card w-75">
              <div class="card-body">
              <a href="<?php echo $rows['Link'];?><h5 class="card-title"><?php echo $rows['Title'];?></a></h5>
              </div>
              </div>
              <?php
              }
              ?>
  </fieldset>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>