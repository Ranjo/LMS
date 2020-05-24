<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tonix Ltd</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/lms/resources/config/logout.php">Sign Out</a></li>
        <li>
          <a href="#"><span class=""></span>
            <?php
              $localhost= "localhost";
              $root= "root";
              $pass= "";
              $db = "LMS";
              $con = mysqli_connect($localhost, $root, $pass, $db);

              if (isset($_SESSION['User_ID'])) {
                $StaffId = $_SESSION['User_ID'];
                $findname= "SELECT FirstName FROM staff WHERE StaffId ='$StaffId'";
                $resultfn = mysqli_query($con, $findname);
                while ($row = mysqli_fetch_array($resultfn)) {
                  echo $row['FirstName'];
                }
              }
            ?>
         </a></li>
      </ul>
    </div>
  </div>
</nav>