<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
// Check if the user is faculty, if not then redirect them to login page
if($_SESSION["role"]==0){
    header("location: login.php");
    exit;}

// Define variables and initialize with empty values
$title = $filelink =$subject=$sem=$type= "";
$title_err = $filelink_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter a Title.";
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM upload WHERE Title = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_title);

            // Set parameters
            $param_title = trim($_POST["title"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $title_err = "This Link is already uploaded.";
                } else{
                    $title = trim($_POST["title"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            $sem = trim($_POST["Sem"]);
            $subject = trim($_POST["Subject"]);
            $type = trim($_POST["Category"]);
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate link
    if(empty(trim($_POST["link"]))){
        $filelink_err = "Please enter a link.";
    }else{
        $filelink = trim($_POST["link"]);
    }

    // Check input errors before inserting in database
    if(empty($title_err) && empty($filelink_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO upload (Title, Link, Sem, Subject, Category) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_title, $param_filelink , $param_sem, $param_subject, $param_type);

            // Set parameters
            $param_title = $title;
            $param_filelink = $filelink;
            $param_sem =$sem;
            $param_subject =$subject;
            $param_type =$type;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to Homepage
                header("location: fhomepage.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}

    // Close connection
    mysqli_close($link);
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
  <a class="logout" href=logout.php>Log Out</a>
</div>
<centre>
<div class="form">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post" style="border:2px solid #ccc" name="uploadForm">
    <div class="container">

        <br><br><label for="title" style="font-size: large;" ><b>Title:</b></label>
        <input type="text" placeholder="Title" name="title" size="70" value="<?php echo $title; ?>" required>
        <span class="help-block"><?php echo $title_err; ?></span><br><br><br>

        <label for="link" style="font-size: large;"><b>Link:</b></label>
        <input type="text" placeholder="Link" name="link" size="70" value="<?php echo $filelink; ?>" required>
        <span class="help-block"><?php echo $filelink_err; ?></span><br><br><br>


        <label for="Sem" style="font-size: large;"><b>Semester:</b></label>
        <select id="Sem" name="Sem">
        <option value="3">Semester 3</option>
        <option value="4">Semester 4</option>
        <option value="5">Semester 5</option>
        <option value="6">Semester 6</option>
        <option value="7">Semester 7</option>
        <option value="8">Semester 8</option>
        </select><br><br><br>


        <label for="Subject" style="font-size: large;"><b>Subject:</b></label>
        <select id="Subject" name="Subject">
        <option value="DLCA">Digital Logic and Computer Architecture</option>
        <option value="DSGT">Discrete Structures and Graph Theory</option>
        <option value="Maths3">Applied Mathematics III</option>
        <option value="CG">Computer Graphics</option>
        <option value="OOPM">Object Oriented Programming </option>
        <option value="DS">Data Structures</option>
        </select><br><br><br>


        <label for="Category" style="font-size: large;"><b>Category:</b></label>
        <select id="Category" name="Category">
        <option value="notes">Notes</option>
        <option value="assignment">Assignments</option>
        <option value="experiment">Experiments</option>
        </select><br><br>
      </div>
        <button type="submit" value="Submit" class = "submitbutton">Submit</button>

  </form>
</div>
</centre>
</body>
</html>
