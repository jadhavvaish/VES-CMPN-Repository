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

<!doctype html>
<html>
<link rel="stylesheet" href="styles1.css">
<head>
  <title>Welcome to CMPN Repository</title>
</head>
<body>
<?php include ("navbar.php"); ?>
<!-- Side navigation -->
<div class="sidenav">
  <a href="dsgtexp.php">Experiments</a>
  <a href="dsgtass.php">Assignments</a>
  <a href="dsgtnotes.php">Notes</a>
</div>

<!-- Page content -->
<div class="main">
  <br>
  <br>
  <form>
    <fieldset>
<h2> <legend exp><strong> <ins><p style="font-size:30px">DSGT Experiments(2020-21)</legend> </h2>
  <center>
  <!-- TABLE CONSTRUCTION-->
          <table>
              <tr>
                  <th><H2>Title</H2></th>
              </tr>
              <!-- PHP CODE TO FETCH DATA FROM ROWS-->
              <?php   // LOOP TILL END OF DATA
                  while($rows=$result->fetch_assoc())
                  {
               ?>
              <tr>
                  <!--FETCHING DATA FROM EACH
                      ROW OF EVERY COLUMN-->
                  <td><a href="<?php echo $rows['Link'];?>"><?php echo $rows['Title'];?></td>
              </tr>
              <?php
                  }
               ?>
               </table>
             </center>

</fieldset>
<form>
</div>
</body>
</html>
