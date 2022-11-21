<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
} else {
  echo "<script>location.href='login.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/025184af48.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dashboard.css" />
  <title>Hello, world!</title>
</head>

<body>
  <!-- below is the vertical menu on the left side -->
  <div class="mainnav bg-info">
    <div class="sidemenu">
      <div class="logo">
        <div class="logos">
          <i class="fas fa-snowflake"></i>
          <h2>auto</h2>
        </div>
      </div>
      <div class="navlinks">
        <div class="navlink home"><i class="fa fa-home" aria-hidden="true"></i>
          <li><a href="#" class="white" rel="noopener noreferrer">Home</a></li>
        </div>
        <div class="navlink analytics"><i class="fa fa-chart-line"></i>
          <li><a href="#" class="white" rel="noopener noreferrer">Analytics</a></i></li>
        </div>
        <div class="navlink reports"><i class="fa fa-file" aria-hidden="true"></i>
          <li><a href="#" class="white" rel="noopener noreferrer">Reports</a></li>
        </div>
        <div class="navlink edit"><i class="fa fa-sliders" aria-hidden="true"></i>
          <li><a href="input.php" class="white" rel="noopener noreferrer"> Edit Data </a></li>
        </div>
        <div class="navlink create"><i class="fa fa-calendar-days"></i>
          <li><a href="#" class="white" rel="noopener noreferrer">Create New</a></li>
        </div>
        <hr class="hr">
        <div class="navlink edit"><i class="fa fa-right-from-bracket" aria-hidden="true"></i>
          <li><a href="logout.php" class="white" rel="noopener noreferrer">Sign Out</a></li>
        </div>
        <div class="navlink create"><i class="fa fa-person-walking-arrow-loop-left" aria-hidden="true"></i>
          <li><a href="logout.php" class="white" rel="noopener noreferrer">Log Off</a></li>
        </div>
        <div class="navlink create"><i class="fa fa-user" aria-hidden="true"></i>
          <li>Profile</li>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <!-- below is the horizontal top menu -->
    <div class="topnav">
      <nav class="navtop">
        <div class="search">
          <div class="">
            <input id="search-input" type="search" id="form1" class="form-control bg-light border border-0" placeholder="Search" />
          </div>
          <button id="search-button" type="button" class="btn btn-light">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="menubuttons">
          <div class="theme shadow"><i class="fa fa-adjust"></i></div>
          <div class="settings shadow"><i class="fa fa-gear"></i></div>
          <div class="notifications shadow"><i class="fa fa-bell"></i></div>
          <div class="profile shadow">
            <img src="/Assets/Photos/Smart_Simon-removebg-preview (1).png" alt="" />
          </div>
        </div>
      </nav>
    </div>
    <!-- main place for content viewing -->
    <div class="page-content">
      <div class="quickstats">
        <div class="ccard shadow-lg">
          <i class="fas fa-layer-group"></i>
          <div class="card-content">
            <h1>UNITS REGISTERED</h1>
            <h2>649</h2>
            <p>Total units done this semester</p>
          </div>
        </div>
        <div class="ccard shadow-lg">
          <i class="fas fa-layer-group"></i>
          <div class="card-content">
            <h1>UNITS REGISTERED</h1>
            <h2>649</h2>
            <p>Total units done this semester</p>
          </div>
        </div>
        <div class="ccard shadow-lg">
          <i class="fas fa-layer-group"></i>
          <div class="card-content">
            <h1>UNITS REGISTERED</h1>
            <h2>649</h2>
            <p>Total units done this semester</p>
          </div>
        </div>
        <div class="ccard shadow-lg">
          <i class="fas fa-layer-group"></i>
          <div class="card-content">
            <h1>UNITS REGISTERED</h1>
            <h2>649</h2>
            <p>Total units done this semester</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>