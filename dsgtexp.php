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
$sql = "SELECT * FROM upload WHERE Subject='DSGT' AND Category='experiment' ";
$result = $link->query($sql);
$link->close();
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
< !-- Side navigation -->
<!-- <div class="sidenav">
  <a href="dsgtexp.php">Experiments</a>
  <a href="dsgtass.php">Assignments</a>
  <a href="dsgtnotes.php">Notes</a>
</div> -->

<!-- Page content -->


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
<!-- <div class="sidenav">
  <a href="dsgtexp.php">Experiments</a>
  <a href="dsgtass.php">Assignments</a>
  <a href="dsgtnotes.php">Notes</a>
</div> -->

<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dsgtexp.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Experiment</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="dsgtass.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Assignment</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="dsgtnotes.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Notes</a>
  <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->
</div>
<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>

<!-- Page content -->
<div class="main">
  <br>
  <br>
  <form>
    <fieldset>
<h2> <legend exp><strong> <ins><p style="font-size:30px">DSGT Experiments(2020-21)</legend> </h2>
  
           <?php 
               while($rows=$result->fetch_assoc())
              {
              ?>
              <div class="card w-75">
              <div class="card-body">
                <h5 class="card-title"><?php echo $rows['Title'];?></h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="<?php echo $rows['Link'];?>" class="btn btn-primary">Button</a>
              </div>
              </div>
              <?php
              }
              ?>

</fieldset>
<form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
