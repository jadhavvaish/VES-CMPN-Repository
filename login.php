<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$ves_id = $password = "";
$ves_id_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if ves_id is empty
    if(empty(trim($_POST["ves_id"]))){
        $ves_id_err = "Please enter ves_id.";
    } else{
        $ves_id = trim($_POST["ves_id"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($ves_id_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, ves_id, password, role FROM users WHERE ves_id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ves_id);

            // Set parameters
            $param_ves_id = $ves_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if ves_id exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $ves_id, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["ves_id"] = $ves_id;
                            $_SESSION["role"]=$role;
                            // Redirect user to homepage
                              header("location: homepage.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if ves_id doesn't exist
                    $ves_id_err = "No account found with that ves_id.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!doctype html>
<html>
<link rel="stylesheet" href="styles.css">
<head>
  <title>Sign IN</title>
  <script type = "text/javascript">
    function validateves_id() {
       var ves_id = document.loginForm.ves_id.value;
      //  for ves id validation
       atpos = ves_id.indexOf("@");
       dotpos = ves_id.lastIndexOf(".");

       if (atpos < 1 || ( dotpos - atpos < 2 )) {
          alert("Please enter correct Ves ID")
          document.loginForm.ves_id.focus() ;
          return false;
       }
       if (ves_id.indexOf("@ves.ac.in")<1){
         alert("Please enter a valid Ves ID")
         document.loginForm.ves_id.focus() ;
         return false;
       }
       return true;
     }
</script>
</head>
<body>
<Img Src="Capture.png">
    <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Sign In</h1>
          <hr>
          <label for="ves_id"><b>VES ID</b></label>
          <input type="text" placeholder="Enter VES ID" name="ves_id" value="<?php echo $ves_id; ?>"  required>
          <span class="help-block"><?php echo $ves_id_err; ?></span>
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <span class="help-block"><?php echo $password_err; ?></span>
          <label>
            <a href="signup.php">New Here?Click Here to Sign up</a>
          </label>

          <div class="clearfix">

            <button type="submit" class="signinbtn" value="Login" onclick="validateves_id()">Sign In</button>
          </div>
        </div>
      </form>
</body>
</html>
