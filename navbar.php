<Img Src="Capture.png">
  <div class="navbar-custom">
  <a href="homepage.php">Home</a>
  <div class="dropdown-custom">
    <button class="dropbtn-custom">Curriculum
      </button>
    <div class="dropdown-custom-content">
      <a href="sem3.php">Sem 3</a>
      <a href="#">Sem 4</a>
      <a href="#">Sem 5</a>
      <a href="#">Sem 6</a>
      <a href="#">Sem 7</a>
      <a href="#">Sem 8</a>
    </div>
  </div>
  <div class="dropdown-custom">
    <button class="dropbtn-custom">Extra Curricular
      </button>
    <div class="dropdown-custom-content">
      <a href="#">Praxis</a>
      <a href="#">Utsav</a>
      <a href="#">Illusions</a>
      <a href="#">Octaves</a>
      <a href="#">Sphurti</a>
    </div>
  </div>
  <div class="dropdown-custom">
    <button class="dropbtn-custom">Internships
      </button>
    <div class="dropdown-custom-content">
      <a href="#">Inhouse</a>
      <a href="#">Industry</a>
    </div>
  </div>
  <a href="research.php">Research</a>
  <a class="logout" href=logout.php>Log Out</a>
  <a class="upload  <?php
    // Check if the user is student, if not hide sensitive information
    if($_SESSION["role"]!=0){
      echo 'hide';
    }
    ?>" href="upload.php"><i class="ionicons ion-android-upload"></i></a>
</div>