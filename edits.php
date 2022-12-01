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
        <script src="script.js"></script>
        <link rel="stylesheet" href="dashboard.css" />
        <title>Edit Details</title>
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
                        <li><a href="dashboard.php" class="white" rel="noopener noreferrer">Home</a></li>
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
                    <div class="navlink create"><i class="fas fa-calendar-days"></i>
                        <li><a href="#" class="white" rel="noopener noreferrer">Create New</a></li>
                    </div>
                    <hr class="hr">
                    <div class="navlink edit"><i class="fa fa-right-from-bracket" aria-hidden="true"></i>
                        <li>Sign Out</li>
                    </div>
                    <div class="navlink create"><i class="fa fa-person-walking-arrow-loop-left" aria-hidden="true"></i>
                        <li>Log Off</li>
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
                            <input id="search-input" type="search" id="form1"
                                class="form-control bg-light border border-0" placeholder="Search" />
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
                <div class="entry">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a data-toggle="tab" href="#lecture">Add Lecture</a></li>
                        <li><a data-toggle="tab" href="#timeshifts">Add Timeshifts</a></li>
                        <li><a data-toggle="tab" href="#days">Add Days</a></li>
                        <li><a data-toggle="tab" href="#venues">Add Venue</a></li>
                    </ul>
                    <!-- Tabs navs -->

                    <!-- Tabs content -->
                    <div class="tabcontent">
                        <div id="lecture" class="tab-pane fade in active">
                            <form action="" method="post" class="lecture_constraint">
                                <div class="lecture">
                                    <label for="unit-code">Unit Code</label>
                                    <input type="text" name="unit-code" id="unit-code">
                                    <label for="lecturer">Lecturer</label>
                                    <input type="text" name="lecturer" id="lecturer">
                                </div>
                                <div class="timeconstraint">
                                    <label for="timeshift-constraint">Time not available</label>
                                    <div class="timeshift-constraint d-flex flex-column flex-nowrap">
                                        <div class="time">
                                            <input type="radio" name="timeshift" id="Dawn">
                                            <h6 class="ps-3">Dawn</h6>
                                        </div>
                                        <div class="time">
                                            <input type="radio" name="timeshift" id="Morning">
                                            <h6 class="ps-3">Morning</h6>
                                        </div>
                                        <div class="time">
                                            <input type="radio" name="timeshift" id="Afternoon">
                                            <h6 class="ps-3">Afternoon</h6>
                                        </div>
                                        <div class="time">
                                            <input type="radio" name="timeshift" id="Evening">
                                            <h6 class="ps-3">Evening</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="dayconstraint">
                                    <label for="day-constraint">Day not available</label>
                                    <div class="day-constraint">
                                        <div class="day">
                                            <input type="radio" name="day" id="Monday">
                                            <h6 class="ps-3">Monday</h6>
                                        </div>
                                        <div class="day">
                                            <input type="radio" name="day" id="Tuesday">
                                            <h6 class="ps-3">Tuesday</h6>
                                        </div>
                                        <div class="day">
                                            <input type="radio" name="day" id="Wednesday">
                                            <h6 class="ps-3">Wednesday</h6>
                                        </div>
                                        <div class="day">
                                            <input type="radio" name="day" id="Thursday">
                                            <h6 class="ps-3">Thursday</h6>
                                        </div>
                                        <div class="day">
                                            <input type="radio" name="day" id="Friday">
                                            <h6 class="ps-3">Friday</h6>
                                        </div>
                                    </div>
                                </div>
                                <button class="clear">Clear</button>
                                <button class="save">Save</button>
                            </form>
                        </div>
                        <div id="timeshifts" class="timeshifts tab-pane fade">
                            <h2>Enter the timeshifts</h2>
                            <form role="form" class="form row" id="timeshift_form">
                                <div class="form-group col-8">
                                    <div class="input-group">
                                        <input type="text" placeholder="Enter the session e.g 08:00-10:00"
                                            id="session_time" name="session_time" class="form-control rounded-0"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <input type="button" onclick="addTimeshift()"
                                        class="btn bg-black text-white form-control" value="Add" name="add_timeshift" />
                                </div>
                            </form>
                            <table class="table table-striped table-hover mt-3" id="timeshift_table" hidden>
                                <thead class="thead bg-black text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Timeshift</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div id="days" class="days tab-pane fade">
                            <h2>Enter the days to cover</h2>
                            <form role="form" class="form row" id="timeshift_form">
                                <div class="form-group col-8">
                                    <div class="input-group">
                                        <input type="text" placeholder="Enter the days e.g Monday" id="session_time"
                                            name="session_time" class="form-control rounded-0" required />
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <input type="button" onclick="addTimeshift()"
                                        class="btn bg-black text-white form-control" value="Add" name="add_timeshift" />
                                </div>
                            </form>
                            <table class="table table-striped table-hover mt-3" id="timeshift_table" hidden>
                                <thead class="thead bg-black text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Day</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div id="venues" class="venues tab-pane fade">
                            <h2>Enter the venue name & venue size</h2>
                            <form role="form" class="form" id="timeshift_form">
                                <div class="form-group col-8">
                                    <div class="venues_inputs input-group">
                                        <div class=" venue_name">
                                            <label for="venue_name">Venue name</label>
                                            <input type="text" placeholder="Enter a venue e.g. PF1L4" id="session_time"
                                                name="venue_name" class="form-control rounded-0" required />
                                        </div>
                                        <div class="venue_size">
                                            <label for="venue-size">Venue Size</label>
                                            <input type="text" placeholder="Venue capacity e.g. 60" id="session_time"
                                                name="venue_size" class="form-control rounded-0" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <input type="button" onclick="addTimeshift()"
                                        class="btn bg-black text-white form-control" value="Add" name="add_timeshift" />
                                </div>
                            </form>
                            <table class="table table-striped table-hover mt-3" id="timeshift_table" hidden>
                                <thead class="thead bg-black text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Venue</th>
                                        <th scope="col">Capacity</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabs content -->
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>

</html>