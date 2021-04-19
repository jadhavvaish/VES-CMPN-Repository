<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$ves_id = $password = $confirm_password = "";
$ves_id_err = $password_err = $confirm_password_err = "";
$role ="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

     //post $role
     $role=$_POST['role'];
    // Validate ves_id
    if(empty(trim($_POST["ves_id"]))){
        $ves_id_err = "Please enter a VES ID.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE ves_id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ves_id);

            // Set parameters
            $param_ves_id = trim($_POST["ves_id"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $ves_id_err = "This ves_id is already registered.";
                } else{
                    $ves_id = trim($_POST["ves_id"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }



    // Check input errors before inserting in database
    if(empty($ves_id_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (ves_id, password, role) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_ves_id, $param_password ,$param_role);

            // Set parameters
            $param_ves_id = $ves_id;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_role= $role;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
  <title>Sign Up</title>
  <script type = "text/javascript">
    function validateves_id() {
       var ves_id = document.signupForm.ves_id.value;
      //  for ves id validation
       atpos = ves_id.indexOf("@");
       dotpos = ves_id.lastIndexOf(".");

       if (atpos < 1 || ( dotpos - atpos < 2 )) {
          alert("Please enter correct Ves ID")
          document.signupForm.ves_id.focus() ;
          return false;
       }
       if (ves_id.indexOf("@ves.ac.in")<1){
         alert("Please enter a valid Ves ID")
         document.signupForm.ves_id.focus() ;
         return false;
       }
    //    return true;
    //  }
    //  function validatepass() {
       //for password validation
       var pass = document.signupForm.password.value;
       var con_pass = document.signupForm.confirm_password.value;
       var lowerCaseLetters = /[a-z]/g;
       var upperCaseLetters = /[A-Z]/g;
       var numbers = /[0-9]/g;
       if(pass.match(numbers)==null){
        alert("A password must contain an upper case, a lower case and a numeric digit.")
        document.signupForm.pass.focus() ;
        return false;
       }
       if(pass.match(upperCaseLetters)==null){
        alert("A password must contain an upper case, a lower case and a numeric digit.")
        document.signupForm.pass.focus() ;
        return false;
       }
       if(pass.match(lowerCaseLetters)==null){
        alert("A password must contain an upper case, a lower case and a numeric digit.")
        document.signupForm.pass.focus() ;
        return false;
       }
       if(pass.length<8){
        alert("A password must contain atleast 8 characters")
        document.signupForm.pass.focus() ;
        return false;
       }
       if(pass != con_pass){
        alert("Please enter same password and confirm password")
        document.signupForm.con_pass.focus() ;
        return false;
       }
       return true;
    }
</script>
</head>
<body>
<A href="homepage.html"><Img Src="Capture.png"></a>
    <form name="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post" style="border:1px solid #ccc" onsubmit="return validateves_id()">
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label for="ves_id"><b>VES ID</b></label>
          <input type="text" placeholder="Enter VES ID" name="ves_id" value="<?php echo $ves_id; ?>"  required>
          <span class="help-block"><?php echo $ves_id_err; ?></span>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" onblur="validatepass()" value="<?php echo $password; ?>" required>
          <span class="help-block"><?php echo $password_err; ?></span>

          <label for="confirm_password"><b>Confirm Password</b></label>
          <input type="password" placeholder="Confirm Password" name="confirm_password" onblur="validatepass()" value="<?php echo $confirm_password; ?>" required>
          <span class="help-block"><?php echo $confirm_password_err; ?></span>

          <label>
              <input type="radio" id="faculty" name="role" value="1">
              <label for="faculty">Faculty</label>
              <input type="radio" id="student" name="role" value="0">
              <label for="student">Student</label><br>
          </label>

          <!-- <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label> -->
          <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

          <div class="clearfix">
              <!-- <div class="horizontal-center"> -->
            <button type="button" class="cancelbtn" value="Reset">Cancel</button>
            <button type="submit" class="signupbtn" value="Submit">Sign Up</button>
        <!-- </div> -->
          </div>
        </div>
      </form>
</body>
</html>
