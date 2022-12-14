<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["login_option"] == "lecturer") {
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
    <title>Timetabler</title>


    <link rel="shortcut icon" href="../Assets/Photos/favicon.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/025184af48.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link href="../../cdn/bootstrap.min.css" rel="stylesheet">
    <link href="../../cdn/fontawesome/css/all.min.css" rel="stylesheet">
    <script src="../../cdn/jQuery.js"></script>
    <script src="../../cdn/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 -->
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <script>
        $(document).ready(function() {
            loadDefaults("day");
            loadDefaults("venue");
            loadDefaults("timeshift");
            $("#ex1 a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
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
                    <li><a href="dashboard.php" class="white" rel="noopener noreferrer"> Home </a></li>
                </div>
                <div class="navlink analytics"><i class="fa fa-chart-line"></i>
                    <li>Analytics</i></li>
                </div>
                <div class="navlink reports"><i class="fa fa-file" aria-hidden="true"></i>
                    <li>Reports</li>
                </div>
                <div class="navlink edit"><i class="fa fa-sliders" aria-hidden="true"></i>
                    <li>Edit Data</li>
                </div>
                <div class="navlink create"><i class="fas fa-calendar-days"></i>
                    <li>Create New</li>
                </div>
                <hr>
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
        <div class="entry">

            <form role="form" name="lectures" id="constraints_form" class="form row">

                <div class="timeconstraint col-3">
                    <label for="timeshift-constraint">Avoid Timeshift</label>
                    <div class="d-flex flex-column flex-nowrap form-group" id="timeshift-constraint">
                    </div>
                </div>
                <div class="venueconstraint col-3">
                    <label for="venue-constraint">Avoid Venue</label>
                    <div class="d-flex flex-column flex-nowrap form-group" id="venue-constraint">
                    </div>
                </div>
                <div class="dayconstraint col-3">
                    <label for="day-constraint">Avoid Day</label>
                    <div id="day-constraint" class="form-group">
                    </div>
                </div>
                <div class="form-group container col-4">
                    <button class="clear form-control" type="reset">Clear</button>
                    <input type="submit" onclick="save()" class="save form-control" value="Save" />
                </div>
            </form>
        </div>

</body>

</html>