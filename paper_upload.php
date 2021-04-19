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
$title = $filelink =$fname=$desc= "";
$title_err = $filelink_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter a Title.";
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM papers WHERE Title = ?";

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

            $desc = trim($_POST["desc"]);
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
    // Validate fname
    if(empty(trim($_POST["fname"]))){
      $fname_err = "Please enter Faculty name.";
    }else{
      $fname = trim($_POST["fname"]);
  }
    // Check input errors before inserting in database
    if(empty($title_err) && empty($filelink_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO papers (Title, Link, Fname,Description) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_title, $param_filelink , $param_fname, $param_desc);

            // Set parameters
            $param_title = $title;
            $param_filelink = $filelink;
            $param_fname =$fname;
            $param_desc =$desc;
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
        <label for="fName">Faculty Name</label>
        <input type="text" class="form-control" name="fname" placeholder="Enter Faculty Name.." value="<?php echo $fname; ?>" ?>
      </div>
      <div class="form-group">
        <label for="Title">Paper Title</label>
        <input type="text" class="form-control"  name="title" placeholder="Enter Title" value="<?php echo $title; ?>" ?>
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        <input type="text" class="form-control"  name="desc" placeholder="Enter Description" value="<?php echo $desc; ?>" ?>
      </div>
      <div class="form-group">
        <label for="link">Paper Link</label>
        <input type="text" class="form-control"  name="link" placeholder="Enter Link" value="<?php echo $filelink; ?>" ?>
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

