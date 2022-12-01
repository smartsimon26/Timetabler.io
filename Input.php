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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edits | Timetabler</title>


    <link rel="shortcut icon" href="Assets/Photos/favicon.png" type="image/x-icon">

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
    <link rel="stylesheet" href="style.css">
    <script>
        $(document).ready(function() {
            loadDefaults("day");
            loadDefaults("venue");
            loadDefaults("timeshift");
            loadDefaults("lec");
            $("#ex1 a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script>
    <style>
        .lectures{
    display: flex;
    position: relative;
    top: 1rem;
 }
 .form{
    display: flex;
    position: relative;
    margin-bottom: 1rem;
 }
 .lectures label{
    font-weight:bold;
 }
 .lectures input{
    margin-right:.5rem;
 }
 .check{
    background-color:#000;
 }
    </style>
</head>

<body>
    <nav class="navtop">
        <div class="menuactions"></div>
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
        </div>
    </div>
    <div class="finaltimetable" style="left:17.5%;">
        <div class="entry">
            <!-- Tabs navs -->
    <div class="nav nav-tabs d-flex justify-content-evenly" id="nav-tab" role="tablist">
    <button class="nav-link active bg-dark text-white" id="lecture" data-bs-toggle="tab" data-bs-target="#content-lectures" type="button" role="tab" aria-controls="lectures" aria-selected="true">Lectures</button>
    <button class="nav-link bg-dark text-white" id="timeshifts" data-bs-toggle="tab" data-bs-target="#content-timeshifts" type="button" role="tab" aria-controls="timeshifts" aria-selected="false">Timeshifts</button>
    <button class="nav-link bg-dark text-white" id="venues" data-bs-toggle="tab" data-bs-target="#content-venues" type="button" role="tab" aria-controls="venues" aria-selected="false">Venues</button>
    <button class="nav-link bg-dark text-white" id="days" data-bs-toggle="tab" data-bs-target="#content-days" type="button" role="tab" aria-controls="days" aria-selected="false">Days</button>
  </div>
            
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active lectures" id="content-lectures" role="tabpanel" aria-labelledby="lecture" tabindex="0">
                        <form role="form" name="lectures" id="lectures_form" class="form row">
                            <div class="lecture col-3 me-5">
                                <div class="form-group">
                                    <label for="unit-code">Unit Code</label>
                                    <input type="text" name="unit-code" id="unit-code" class="form-control" placeholder="SIT 302" required>
                                </div>
                                <div class="form-group">
                                    <label for="lecturer">Lecturer</label>
                                    <input type="text" name="lecturer" id="lecturer" class="form-control" placeholder="Dr. Muchiri" required>
                                </div>
                            </div>
                            <div class="timeconstraint col-2 ms-5 me-5">
                                <label for="timeshift-constraint">Avoid Timeshift</label>
                                <div class="d-flex flex-column flex-nowrap form-group" id="timeshift-constraint">
                                </div>
                            </div>
                            <div class="venueconstraint col-3">
                                <label for="venue-constraint">Avoid Venue</label>
                                <div class="d-flex flex-column flex-nowrap form-group" id="venue-constraint">
                                </div>
                            </div>
                            <div class="dayconstraint col-2">
                                <label for="day-constraint">Avoid Day</label>
                                <div id="day-constraint" class="form-group">
                                </div>
                            </div>
                            <div class="form-group container col-3 d-flex mt-3 d-flex">
                                <button class="clear form-control me-2" type="reset">Clear</button>
                                <input type="submit" onclick="saveLecture()" class="save form-control bg-dark text-white ms-2" value="Save" />
                            </div>
                        </form>
                        <div>
                            <div class="text-danger error-msg" id="error-msg"></div>
                                <div class="tt table-responsive">
                                    <table id="lectures_table" class="table table-bordered table-hover">
                                        <thead class="thead-dark table-light">
                                            <tr>
                                                <th scope="col" class="col-1">#</th>
                                                <th scope="col" class="col-2">Unit Code</th>
                                                <th scope="col" class="col-2">Lecturer</th>
                                                <th scope="col" class="col-7">Constraints</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
        </div>
        <div class="tab-pane fade align-items-center d-flex flex-column mt-2 mb-2" id="content-timeshifts" role="tabpanel" aria-labelledby="timeshifts" tabindex="0">
            <h2>Enter the timeshifts</h2>
                            <form role="form" class="form align-items-center d-flex flex-column mt-1" id="timeshift_form">
                                <div class="form-group col-12">
                                    <div class="input-group col-8">
                                        <input type="text" placeholder="E.g. Dawn" id="session_time" name="session_time" class="form-control rounded-0" required />
                                    </div>
                                </div>
                                <div class="form-group col-6 d-flex flex-column mt-5">
                                    <button class="form-control col-4" type="reset">Clear</button>
                                    <input type="button" onclick="addSetting('timeshifts')" class="btn bg-dark text-white col-8 form-control" value="Add" name="add_timeshift" />
                                </div>
                            </form>
                            <table class="table" id="timeshift_table" hidden>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Timeshift</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
        </div>
        <div class="tab-pane fade d-flex flex-column align-items-center" id="content-venues" role="tabpanel" aria-labelledby="venues" tabindex="0">
            <h2>Enter the venues</h2>
                <form role="form" class="form d-flex flex-column" id="venues_form">
                    <div class="form-group col-8">
                        <div class="input-group d-flex flex-row">
                            <div class="venueinput">
                                <label for="venue_name">Venue Name</label>
                                <input type="text" placeholder="E.g. ADB 202" id="venue_name" name="venue_name" class="form-control rounded-0" required />
                                <input type="number" name="venue_capacity" id="venue_capacity" class="form-control rounded-0" required>
                            </div>
                            <div class="venuecategory">
                                <label for="venue-constraint">Venue Category</label>
                                <div class="d-flex flex-column flex-nowrap form-group" id="venue-constraint"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <input type="button" onclick="addSetting('venues')" class="btn btn-primary form-control" value="Add" name="add_venue" />
                    </div>
                </form>
                <table class="table" id="venues_table" hidden>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room</th>
                            <th scope="col">Category</th>
                            <th scope="col">Capacity</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
        </div>
        <div class="tab-pane fade position-absolute top-0 mb-5 left-5" id="content-days" role="tabpanel" aria-labelledby="days" tabindex="0">
            <h2>Enter the days</h2>
                            <form role="form" class="form row" id="days_form">
                                <div class="form-group col-8">
                                    <div class="input-group">
                                        <input type="text" placeholder="E.g Monday" id="session_day" name="session_day" class="form-control rounded-0" required />
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <input type="button" onclick="addSetting('days')" class="btn btn-dark form-control" value="Add" name="add_day" />
                                </div>
                            </form>
                            <table class="table" id="days_table" hidden>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Days</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
        </div>
    </div>
    </div>
            

</body>

</html>