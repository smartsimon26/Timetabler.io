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
    <link rel="stylesheet" href="../Assets/css/style.css">
    <!-- CSS only -->
    <link rel="shortcut icon" href="/Assets/Photos/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/025184af48.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body>

    <nav class="navtop shadow-sm shadow-sm">
        <div class="menuactions">
            <div class="input-group col-lg-12 d-flex flex-nowrap">
                <div class="ms-3">
                    <input id="search-input" type="search" id="form1" class="form-control bg-light border border-0" placeholder="Search" />
                </div>
                <button id="search-button" type="button" class="btn btn-light">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="menubuttons">
            <div class="theme shadow"><i class="fa fa-adjust"></i></div>
            <div class="settings shadow"><i class="fa fa-gear"></i></div>
            <div class="notifications shadow"><i class="fa fa-bell"></i></div>
            <div class="profile shadow"><img src="/Assets/Photos/Smart_Simon-removebg-preview (1).png" alt=""></div>
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
                    <li><a href="#" class="white" rel="noopener noreferrer">Analytics</a></i></li>
                </div>
                <div class="navlink reports"><i class="fa fa-file" aria-hidden="true"></i>
                    <li><a href="#" class="white" rel="noopener noreferrer">Reports</a></li>
                </div>
                <div class="navlink edit"><i class="fa fa-sliders" aria-hidden="true"></i>
                    <li><a href="Input.php" class="white" rel="noopener noreferrer"> Edit Data </a></li>
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
        <h3 class="centre">Enter the unit code, lecturer and constraints where necessary</h3>

        <form role="form" class="form" id="main_form">
            <table class="table table-hover table-striped align-middle mb-0 bg-white">
                <thead class="bg-dark text-white" id="thead">
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="no-border" placeholder="Unit Code" id="session_time" name="session_time" class="form-control rounded-0" required />
                        </td>
                        <td><input type="text" class="no-border" placeholder="Lecturer" id="session_time" name="session_time" class="form-control rounded-0" required />
                        </td>
                        <td id="days"><input type="text" class="no-border" placeholder="Unit Code" id="session_time" name="session_time" class="form-control rounded-0" required />
                        </td>
                        <td id="timeshifts"><input type="text" class="no-border" placeholder="Lecturer" id="session_time" name="session_time" class="form-control rounded-0" required />
                        </td>
                        <td id="venues"><input type="text" class="no-border" placeholder="Unit Code" id="session_time" name="session_time" class="form-control rounded-0" required />
                        </td>

                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <input type="button" onclick="addSetting('main')" class="btn btn-primary form-control" value="Add" name="add_main" />
            </div>
        </form>

    </div>

    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="script.js"></script>
    <script src="JsForComponents.js"></script>
</body>

</html>