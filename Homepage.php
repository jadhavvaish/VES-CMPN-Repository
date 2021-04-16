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
// Check if the user is student, if not then redirect them to login page
if($_SESSION["role"]==1){
    header("location: login.php");
    exit;
}
// SQL query to select data from database
$sql = "SELECT * FROM upload ORDER BY id DESC LIMIT 10;";
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
<center>
  <h1>Welcome to VES CMPN Repository</h1>
  <fieldset>
<h2> <legend exp><strong> <ins><p style="font-size:30px">Recently Added</legend> </h2>
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

</fieldset>
</body>
</html>
