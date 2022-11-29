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
    <title>Timetabler</title>


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
            <div class="profile shadow"><img src="Assets/Photos/Smart_Simon-removebg-preview (1).png" alt=""></div>
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
            <!-- Tabs navs -->
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="lecture" data-bs-target="#lectures" data-mdb-toggle="tab" href="#lectures" role="tab" aria-controls="lectures" aria-selected="true">Edit Lectures</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-1" data-bs-target="#ex3-tabs-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="false">Edit
                        Timeshifts</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-2" data-bs-target="#ex3-tabs-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab" aria-controls="ex3-tabs-2" aria-selected="false">Edit
                        Venues</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-3" data-bs-target="#ex3-tabs-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab" aria-controls="ex3-tabs-3" aria-selected="false">Edit Days</a>
                </li>
            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex2-content">
                <!-- Lecturers -->
                <div class="tab-pane fade show active" id="lectures" role="tabpanel" aria-labelledby="lecture">
                    <form role="form" name="lectures" id="lectures_form" class="form row">
                        <div class="lecture col-3">
                            <div class="form-group">
                                <label for="unit-code">Unit Code</label>
                                <input type="text" name="unit-code" id="unit-code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lecturer">Lecturer</label>
                                <input type="text" name="lecturer" id="lecturer" class="form-control" required>
                            </div>
                        </div>
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
                            <input type="submit" onclick="saveLecture()" class="save form-control" value="Save" />
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
                    <!-- Timeshifts -->
                    <div class="tab-pane fade" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <h2>Enter the timeshifts</h2>
                        <form role="form" class="form row" id="timeshift_form">
                            <div class="form-group col-8">
                                <div class="input-group"><input type="text" placeholder="Enter the session e.g 08:00-10:00" id="session_time" name="session_time" class="form-control rounded-0" required />
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <input type="button" onclick="addSetting('timeshifts')" class="btn btn-primary form-control" value="Add" name="add_timeshift" />
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
                    <!-- Venues -->
                    <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                        <h2 class="mb-3">Enter the venues</h2>
                        <form role="form" class="form d-flex flex-column justify-content-center align-items-center" id="venues_form">
                            <div class="form-group col-8 d-flex">
                                <div class="input-group">
                                    <input type="text" placeholder="Enter the venue e.g ADB2" id="venue_name" name="venue_name" class="form-control rounded-0" required />
                                    <input type="text" placeholder="Describe venue eg. Comp Lab" id="venue_category" name="venue_category" class="form-control rounded-0" required />
                                    <input type="number" name="venue_capacity" id="venue_capacity" class="form-control rounded-0" required>
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
                    <!-- Days -->
                    <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                        <h2>Enter the days</h2>
                        <form role="form" class="form row" id="days_form">
                            <div class="form-group col-8">
                                <div class="input-group">
                                    <input type="text" placeholder="Enter the day e.g Monday" id="session_day" name="session_day" class="form-control rounded-0" required />
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <input type="button" onclick="addSetting('days')" class="btn btn-primary form-control" value="Add" name="add_day" />
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
                <!-- Tabs content -->
            </div>
        </div>

</body>

</html>