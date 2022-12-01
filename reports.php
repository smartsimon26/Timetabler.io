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
    <title>Reports | Timetabler</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
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
      var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
          label: "My First dataset",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true
    }
  });
    </script>
  </head>

  <body>
    
    <nav class="navtop">
        <div class="menuactions">
            <!-- <div class="input-group col-2 d-flex flex-nowrap">
                <div class="shadow ms-3">
                    <input id="search-input" type="search" id="form1" class="form-control bg-light border border-0" placeholder="Search" />
                </div>
                <button id="search-button" type="button" class="btn btn-light shadow">
                    <i class="fas fa-search"></i>
                </button>
            </div> -->
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
        <div class="finaltimetable">
        <button class="btn btn-default" onclick="generateTimetable()">
            <i class="fa fa-refresh" aria-hidden="true"></i></button>
        <div class="dropdown" id="download" hidden>
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Download&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="d-flex m-1"><img src="Assets/db-30.png" class="col-2" alt="csv-icon"><a class="dropdown-item col-10" href="#" id="save_to_database">Save in database</a></li>
                <li class="d-flex m-1"><img src="Assets/photos/pdf logo.png" class="col-2" alt="csv-icon"><a class="dropdown-item col-10" href="#" id="save_as_pdf">PDF</a></li>
                <form method="post" action="excell.php">
                    <img src="Assets/photos/excell logo.png" class="col-2" alt="csv-icon"><input type="submit" name="export" class="bg-white border-0 ms-3" value="Excell" />
                </form>
                <!-- <form action="excell.php" method="post">
                <li class="d-flex m-1" name="export"><img src="Assets/photos/excell logo.png" class="col-2" alt="csv-icon"><a class="dropdown-item col-10" href="#" id="save_as_excell">Excell</a></li>
                </form> -->
                <li class="d-flex m-1"><img src="Assets/photos/csv logo.png" class="col-2" alt="csv-icon"> <a class="dropdown-item col-10" href="#" id="save_as_csv">CSV</a></li>
                <li class="d-flex m-1"><img src="Assets/json-30.png" class="col-2" alt="csv-icon"><a class="dropdown-item col-10" href="#" id="save_as_json">JSON</a></li>
            </ul>
        </div>

        <div class="text-danger error-msg" id="error-msg"></div>
        <div class="table-responsive final_timetable">
            <div class="timetable" id="final_lectures">
                <table id="final_table" class="table table-bordered table-hover">
                    <thead class="thead-dark table-light">
                        <tr>
                            <th scope="col" class="c">#</th>
                            <th scope="col">Unit Code</th>
                            <th scope="col">Lecturer</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Timeshift</th>
                            <th scope="col">Day</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
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
  </body>
</html>
