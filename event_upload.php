<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
// Check if the user is admin, if not then redirect them to login page
if($_SESSION["role"]!=2){
    header("location: login.php");
    exit;}

// Define variables and initialize with empty values
$name = $image =$year=$description= "";
$name_err = $year_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    // if(empty(trim($_POST["name"]))){
    //     $name_err = "Please enter a Name.";
    // }else{
        // Prepare a select statement
        // $sql = "SELECT id FROM event WHERE name = ?";

        // if($stmt = mysqli_prepare($link, $sql)){
        //     // Bind variables to the prepared statement as parameters
        //     mysqli_stmt_bind_param($stmt, "s", $param_title);

        //     // Set parameters
        //     $param_title = trim($_POST["name"]);

        //     // Attempt to execute the prepared statement
        //     if(mysqli_stmt_execute($stmt)){
        //         /* store result */
        //         mysqli_stmt_store_result($stmt);

        //         // if(mysqli_stmt_num_rows($stmt) == 1){
        //         //     $title_err = "This Link is already uploaded.";
        //         // } else{
        //         //     $title = trim($_POST["title"]);
        //         // }
        //     } else{
        //         echo "Oops! Something went wrong. Please try again later.";
        //     }

        //     $desc = trim($_POST["desc"]);
        //     // Close statement
        //     mysqli_stmt_close($stmt);
        // }
    // }
    // Validate link
    if(empty(trim($_POST["year"]))){
        $year_err = "Please enter a year.";
    }else{
        $year = trim($_POST["year"]);
    }
    // Validate name
    if(empty(trim($_POST["name"]))){
      $name_err = "Please enter name.";
    }else{
      $name = trim($_POST["name"]);
      $image = trim($_POST["image"]);
      $description = trim($_POST["description"]);
  }
    // Check input errors before inserting in database
    if(empty($name_err) && empty($year_err)){

        // Prepare an insert statement
        // $sql = "INSERT INTO papers (Title, Link, Fname,Description) VALUES (?, ?, ?, ?)";
        $sql = "UPDATE event SET description = ?, image = ? WHERE name = ? AND event_year = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_desc, $param_image , $param_name, $param_year);

            // Set parameters
            $param_name = $name;
            $param_year = $year;
            $param_image =$image;
            $param_desc =$description;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to Homepage
                header("location: homepage.php");
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

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Administrator</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="assets/css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
                    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="">Administrator</a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->

                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
                        <!-- The End of the Header -->
    <div id="page-wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post">
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name.." value="<?php echo $name; ?>" ?>
      </div>
      <div class="form-group">
  
        
        <label for="img">Select image:</label>
        <input type="file" id="img" name="image" accept="image/*" value="<?php echo $image; ?>" ?>
        <!-- <input type="submit"> -->
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control"  name="description" placeholder="Enter Description" value="<?php echo $description; ?>" ?>
      </div>
      <div class="form-group">
        <label for="Year">Year</label>
        <input type="text" class="form-control"  name="year" placeholder="Enter Year" value="<?php echo $year; ?>" ?>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>
<!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->

        <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>




    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

</body>

</html>

