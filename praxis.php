<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
<div class='container ml-0'>
  <div class='row'>
    <div class="nav flex-column nav-pills col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active " id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">2020-21</a>
    <a class="nav-link mt-2" id="v-pills-profile-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-profile" aria-selected="false">2019-20</a>
  <a class="nav-link mt-2" id="v-pills-profile-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-profile" aria-selected="false">2018-19</a>
  <a class="nav-link mt-2" id="v-pills-messages-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-messages" aria-selected="false">2017-18</a>
</div>
    <div class='col'>
    <h2 class='mt-3 mb-0 ml-5'><U>Praxis 2k21</U></h2>
      <br>

    <div class="card mb-3">
  <img src="pra-img.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Welcome to E-Praxis 2k21 !</h5>
    <p class="card-text">Greetings from VESIT Renaissance Cell (VRC) !!

While executing Praxis '17 (which was our first attempt at Praxis), we learnt that it is a great platform, which may help us in achieving our own objective of 'Skill Enhancement' within VESIT, while immensely benefiting VESITians and VESIT as a whole.  

Praxis'18 and 19 added to our experiences to assist you better.

This year again we are excited to present a plethora of events, to help enhance VESITisan their technical skills,  while needing them to invest very little of of their precious time.

Praxis is expected to be a TechFest, and we have taken very sincere efforts to make sure that it remains 'Technical' and 'Festival'. 

To deliver the best to you, this time we are working hand in hand, with the Technical Societies within VESIT viz. IEEE-VESIT, ISTE-VESIT, CSI-VESIT and ISA-VESIT and E-cell.

We hope to meet or exceed your expectations !

-- Sincerely,

VESIT Renaissance Cell !   </p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
    </div>
    <br><br>

    <div>
  <section id="h.p_-2QifO76EemO" class="yaqOZd" style=""><div class="IFuOkc"></div><div class="mYVXT"><div class="LS81yb VICjCf" tabindex="-1"><div class="hJDwNd-AhqUyc-uQSCkd purZT-AhqUyc-II5mzb pSzOP-AhqUyc-qWD73c JNdkSc"><div class="JNdkSc-SmKAyb"><div class="" jscontroller="sGwD4d" jsaction="zXBUYb:zTPCnb;zQF9Uc:Qxe3nd;" jsname="F57UId"><div class="oKdM2c Kzv0Me"><div id="h.p_f13PpPSOEel5" class="hJDwNd-AhqUyc-uQSCkd jXK9ad D2fZ2 OjCsFc wHaque GNzUNc"><div class="jXK9ad-SmKAyb"><div class="tyJCtd mGzaTb baZpAe"><p id="h.p_SXId5gh2EemL" class="CDt4Ke zfr3Q" style="text-align: center;"><strong>Tentative Schedule</strong></p></div></div></div></div></div></div></div></div></div></section>
    </div>
    <br>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Date</th>
      <th scope="col">Event Name</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>21st & 22nd April,21</td>
      <td>CSI-CODE Knights</td>
      <td>Sat & Sun-12pm to 5pm <br> (Mega Event)</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>23rd April,21</td>
      <td>VRC-Drone Workshop</td>
      <td>Mon- 10am-4pm</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>24th April,21</td>
      <td>IEEE-FLIM it Workshop</td>
      <td>Tues- 9am-5pm</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>25th & 26th April,21</td>
      <td>E-Cell Vesit HACKs </td>
      <td>Sat & Sun-12pm to 5pm</td>
    </tr>
  </tbody>
</table>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>