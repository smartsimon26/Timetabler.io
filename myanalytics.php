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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- <link href="../../cdn/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/025184af48.js"
      crossorigin="anonymous"
    ></script>
    <!-- <link href="../../cdn/fontawesome/css/all.min.css" rel="stylesheet"> -->

    <link
      rel="shortcut icon"
      href="Assets/Photos/favicon.png"
      type="image/x-icon"
    />
    <title>Analytics | Timetabler</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="../../cdn/jQuery.js"></script> -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <!-- <script src="../../cdn/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://html2canvas.hertzen.com/dist/html2canvas.js"
    ></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
      $(document).ready(function () {
        loadDefaults("day");
        loadDefaults("venue");
        loadDefaults("timeshift");
      });
    </script>
    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script type="text/javascript">
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Days", "Lectures"],
          ["Monday", 1000],
          ["Tuesday", 1170],
          ["Wednesday", 660],
          ["Thursday", 1030],
          ["Friday", 1250],
        ]);

        var options = {
          title: "Lectures This Week",
          curveType: "function",
          legend: { position: "bottom" },
        };

        var chart = new google.visualization.LineChart(
          document.getElementById("curve_chart")
        );

        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    
    <nav class="navtop">
        <div class="menuactions">
        </div>
        <div class="menubuttons">
            <div class="theme shadow"><i class="fa fa-adjust"></i></div>
            <div class="settings shadow"><i class="fa fa-gear"></i></div>
            <div class="notifications shadow"><i class="fa fa-bell"></i></div>
<div class="dropdown-center">
   <div class="profile shadow dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  <button class="" style="background-color:#f0f8ff00;border: none;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="Assets/Photos/Smart_Simon-removebg-preview (1).png" alt="">
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
    <li><a class="dropdown-item" href="logout.php">Log Off</a></li>
  </ul>
</div>
</div>        </div>
    </nav>
    <aside>
        <div class="sidemenu">
            <div class="logo">
                <div class="logos">
                    <i class="fas fa-snowflake"></i>
                    <h2>auto</h2>
                </div>
            </div>
            <div class="navlinks">
                <div class="navlink home"><i class="fa fa-home" aria-hidden="true"></i>
                    <li><a href="dashboard.php" class="white" rel="noopener noreferrer">Home</a></li>
                </div>
                <div class="navlink analytics"><i class="fa fa-chart-line"></i>
                    <li><a href="analytics.php" class="white" rel="noopener noreferrer">Analytics</a></i></li>
                </div>
                <div class="navlink reports"><i class="fa fa-file" aria-hidden="true"></i>
                    <li><a href="reports.php" class="white" rel="noopener noreferrer">View Timetable</a></li>
                </div>
                <div class="navlink edit"><i class="fa fa-sliders" aria-hidden="true"></i>
                    <li><a href="input.php" class="white" rel="noopener noreferrer"> Edit Data </a></li>
                </div>
                <div class="navlink create" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-calendar-days"></i>
                    <li><a href="#" class="white" rel="noopener noreferrer">Create New</a></li>
                </div>
                <hr class="hr">
                <div class="navlink edit"><i class="fa fa-right-from-bracket" aria-hidden="true"></i>
                    <li><a href="logout.php" class="white" rel="noopener noreferrer">Sign Out</a></li>
                </div>
                <div class="navlink create"><i class="fa fa-person-walking-arrow-loop-left" aria-hidden="true"></i>
                    <li><a href="logout.php" class="white" rel="noopener noreferrer">Log Off</a></li>
                </div>
            </div>
        </div>
    </aside>
    <div class="viewpoint">
        <div class="content">
            <div class="quickstats">
                <div class="ccard shadow-sm">
                    <i class="fa-regular fa-folder-open"></i>
                    <div class="card-content">
                        <h1>UNITS REGISTERED</h1>
                        <h2>27</h2>
                        <p>Total units done this semester</p>
                    </div>
                </div>
                <div class="ccard shadow-sm">
                    <i class="fa-solid fa-location-arrow"></i>
                    <div class="card-content">
                        <h1>VENUES ADDED</h1>
                        <h2>35</h2>
                        <p>Venues Available for use</p>
                    </div>
                </div>
                <div class="ccard shadow-sm">
                    <i class="fa-solid fa-people-roof"></i>
                    <div class="card-content">
                        <h1>LECTURES TODAY</h1>
                        <h2>12</h2>
                        <p>Lectures happening on a day</p>
                    </div>
                </div>
                <div class="ccard shadow-sm">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <div class="card-content">
                        <h1>LECTURERS IN SYSTEM</h1>
                        <h2>17</h2>
                        <p>Total lecturers with accounts</p>
                    </div>
                </div>
            </div>
            <div class="graph">
                <div class="linegraph" id="curve_chart"></div>
            </div>
            <div class="queries mt-1">
                <div class="searches">
                    <div class="card">
                        <h5 class="card-header bg-dark white">Analytics</h5>
                        <!--<div class="card-header">
                            
                             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Find Venue</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Find</button>
                                </li>
                            </ul>
                        </div> -->
                        <div class="card-body" style="height:27rem;">
                            <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active d-flex" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">Description</th>
      <th scope="col">Stats</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Otto</td>
      <td>23</td>
    </tr>
    <tr>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <td>Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
                                <!-- <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Capacity</span>
                                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <select class="form-select form-select-sm h-25" aria-label=".form-select-sm example">
                                    <option selected>Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select> -->
                            </div>
                            <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="news mt-2">
                    <div class="card">
                        <h5 class="card-header bg-dark white">Notifications</h5>
                        <div class="card-body">
                            <p class="card-text">updates come here</p>
                        </div>
                    </div>
                </div>                    -->
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center" style="align-items: center;justify-content: center;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Generate Timetable</h1>
      </div>
      <div class="modal-body">
        Running the algorith overwrites the existing timeable. Do you still want to continue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary"  onclick="generateTimetable()" >Generate</button>
      </div>
    </div>
  </div>
</div>
            </div>
            </div>
        </div>
    </div>
  </body>
</html>
