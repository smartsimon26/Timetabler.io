<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["login_option"] == "admin") {
} else {
    echo "<script>location.href='../login.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../../cdn/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../Assets/css/style.css" />
    <script src="https://kit.fontawesome.com/025184af48.js" crossorigin="anonymous"></script>
    <!-- <link href="../../cdn/fontawesome/css/all.min.css" rel="stylesheet"> -->


    <link rel="shortcut icon" href="../Assets/Photos/favicon.png" type="image/x-icon">
    <title>Final Timetable</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="../../cdn/jQuery.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="../../cdn/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
        $(document).ready(function() {
            load_table();
            loadDefaults("day");
            loadDefaults("venue");
            loadDefaults("timeshift");

        });
    </script>
</head>

<body>

    <nav class="navtop">
        <div class="menuactions">

            <div class="input-group col-2 d-flex flex-nowrap">
                <div class="shadow ms-3">
                    <input id="search-input" type="search" id="form1" class="form-control bg-light border border-0" placeholder="Search" />
                </div>
                <button id="search-button" type="button" class="btn btn-light shadow">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="menubuttons">
            <div class="theme shadow"><i class="fa fa-adjust"></i></div>
            <div class="settings shadow"><i class="fa fa-gear"></i></div>
            <div class="notifications shadow"><i class="fa fa-bell"></i></div>
            <div class="profile shadow"><img src="../Assets/Photos/Smart_Simon-removebg-preview (1).png" alt=""></div>
        </div>
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
                    <li><a href="../logout.php" class="white" rel="noopener noreferrer">Sign Out</a></li>
                </div>
                <div class="navlink create"><i class="fa fa-person-walking-arrow-loop-left" aria-hidden="true"></i>
                    <li><a href="../logout.php" class="white" rel="noopener noreferrer">Log Off</a></li>
                </div>
                <div class="navlink create"><i class="fa fa-user" aria-hidden="true"></i>
                    <li>Profile</li>
                </div>
            </div>
        </div>
    </aside>
    <div class="viewpoint">
        <div class="content">
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
    <div class="finaltimetable">

        <div class=" dropdown" id="download">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                &nbsp;<i class="fa fa-download" aria-hidden="true"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="d-flex m-1">
                    <form method="post" action="../final timetable.php">
                        <img src="../Assets/photos/pdf logo.png" class="col-2" alt="csv-icon"><input type="submit" name="export" class="bg-white border-0 ms-3" value="PDF" />
                    </form>
                </li>
                <form method="post" action="../excell.php">
                    <img src="../Assets/photos/excell logo.png" class="col-2" alt="csv-icon"><input type="submit" name="export" class="bg-white border-0 ms-3" value="Excell" />
                </form>
                <!-- <form action="excell.php" method="post">
                <li class="d-flex m-1" name="export"><img src="../Assets/photos/excell logo.png" class="col-2" alt="csv-icon"><a class="dropdown-item col-10" href="#" id="save_as_excell">Excell</a></li>
                </form> -->
                <li class="d-flex m-1"><img src="../Assets/photos/csv logo.png" class="col-2" alt="csv-icon"> <a class="dropdown-item col-10" href="#" id="save_as_csv">CSV</a></li>

            </ul>
        </div>
        <div class="text-danger error-msg" id="error-msg"></div>
        <div class="table-responsive final_timetable">
            <div class="timetable">
                <table id="final_table" class="table table-bordered table-hover">
                    <thead class="thead-dark table-light">
                        <tr>
                            <th scope="col" class="c">#</th>
                            <th scope="col">Unit Code</th>
                            <th scope="col">Lecturer</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Timeshift</th>
                            <th scope="col">Day</th>
                            <th scope="col">Constraints</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</head>

</html>