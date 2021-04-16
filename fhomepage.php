<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();

// Check if the user is faculty, if not then redirect them to login page
if($_SESSION["role"]==0){
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
<Img Src="Capture.png">
  
  <div class="navbar">
  <a href="fhomepage.php">Home</a>
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
  <a class="upload" href="upload.php">Upload</a>
  <a class="logout" href=logout.php>Log Out</a>
</div>
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
