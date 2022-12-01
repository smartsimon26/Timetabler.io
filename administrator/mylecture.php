<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["login_option"] == "admin") {
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "timetabler";
    $conn;

    $conn = new PDO("mysql:host=$servername", $username, $pass, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
    ]);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS timetabler");
    $conn->exec("USE timetabler");
    $stmt;

    class TableRows extends RecursiveIteratorIterator
    {
        function __construct($it)
        {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current()
        {
            return parent::current() . "|";
        }
    }
    //Days
    if ($_GET["value"] == "day") {
        $stmt;
        try {
            $stmt = $conn->prepare("SELECT day from days order by id");
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1146) { // If table doesn't exist it is created
                //when table doesn't exist
                $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`days` ( `id` INT NOT NULL AUTO_INCREMENT , `day` VARCHAR(20) NOT NULL , 
        PRIMARY KEY (`id`), UNIQUE (`day`)) ENGINE = InnoDB;");
                $conn->exec(
                    "INSERT INTO `days` (`day`) VALUES('Monday'),('Tuesday'),('Wednesday'),('Thursday'),('Friday');"
                );
                $stmt = $conn->prepare("SELECT day from days order by id");
                $stmt->execute();
            }
        }
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))
            as $k => $v) {
            echo $v;
        }
    }
    //Timeshifts
    elseif ($_GET["value"] == "timeshift") {
        $stmt;
        try {
            $stmt = $conn->prepare(
                "SELECT timeshift from timeshifts order by id"
            );
            $stmt->execute();
        } catch (PDOException $e) { // If table doesn't exist it is created
            if ($e->errorInfo[1] == 1146) {
                $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`timeshifts` ( `id` INT NOT NULL AUTO_INCREMENT , `timeshift` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`timeshift`)) ENGINE = InnoDB;");
                $conn->exec(
                    "INSERT INTO `timeshifts` (`timeshift`) VALUES('Dawn'),('Morning'),('Afternoon'),('Evening');"
                );
                $stmt = $conn->prepare(
                    "SELECT timeshift from timeshifts order by id"
                );
                $stmt->execute();
            }
        }
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))
            as $k => $v) {
            echo $v;
        }
    }
    //Venues
    elseif ($_GET["value"] == "venue") {
        $stmt;
        try {
            $stmt = $conn->prepare("SELECT category from venues order by id");
            $stmt->execute();
        } catch (PDOException $e) { // If table doesn't exist it is created
            if ($e->errorInfo[1] == 1146) {
                $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`venues` ( `id` INT NOT NULL AUTO_INCREMENT , `venue` VARCHAR(20) NOT NULL , `category` VARCHAR(30) NOT NULL ,  `capacity` INT(4) NOT NULL ,
        PRIMARY KEY (`id`), UNIQUE (`venue`)) ENGINE = InnoDB;");
                $conn->exec(
                    "INSERT INTO `venues` (`venue`, `category`, `capacity`) VALUES('ADB 202','ADB Building',200),('ADB Gen Lab','Computer Labs',50),('ADB 303','High Floor',150),('EEE 2','Engineering Labs',50),('FD12','F and D Workshops',25),('PF1L1','Pioneer Building',70);"
                );
                $stmt = $conn->prepare("SELECT category from venues order by id");
                $stmt->execute();
            }
        }
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))
            as $k => $v) {
            echo $v;
        }
    } elseif ($_GET["value"] == "get_venues_timeshifts_days") {
        try {
            //days
            $stmt = $conn->prepare("SELECT day from days order by id");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $days = "";

            if ($result) {
                foreach ($result as $row) {
                    $days = $days . $row['day'] . "^";
                }
            }


            //timeshifts
            $stmt = $conn->prepare("SELECT timeshift from timeshifts order by id");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $timeshifts = "";
            if ($result) {
                foreach ($result as $row) {
                    $timeshifts = $timeshifts . $row['timeshift'] . "^";
                }
            }

            //venues
            $stmt = $conn->prepare("SELECT category from venues order by id");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $venues = "";
            if ($result) {
                foreach ($result as $row) {
                    $venues = $venues . $row['category'] . "^";
                }
            }

            echo rtrim($days, "^") . "#" . rtrim($timeshifts, "^") . "#" . rtrim($venues, "^");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1146) {
                echo "FAILED: Timetable not yet prepared";
            } else {
                echo $e->getMessage();
            }
        }
        $conn = null;
    } elseif ($_GET["value"] == "get_allocated") {
        //echo "getting to for loop";
        try {
            $stmt = $conn->prepare("SELECT allocated_day,allocated_timeshift,allocated_venue from lectures");
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $rows = "";
            if ($result) {
                foreach ($result as $row) {
                    echo  $row['allocated_day'] . "^"
                        . $row['allocated_timeshift'] . "^"
                        . $row['allocated_venue'] . "#";
                }
            }
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1146) {
                echo "FAILED: Timetable not yet prepared";
            } else {
                echo $e->getMessage();
            }
        }
        $conn = null;
    } elseif ($_GET["value"] == "save_constraints") {

        $lecturer = $_SESSION['username'];
        $timeshifts = $_GET['timeshifts'];
        $venues = $_GET['venues'];
        $days = $_GET['days'];
        echo "saving again " . $timeshifts . " " . $venues . " " . $days . " " . $lecturer;
        try {
            $sql = "UPDATE lectures SET `constraint_timeshift`=:constraint_timeshift WHERE lecturer='" . $lecturer . "'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":constraint_timeshift", $timeshifts);
            $stmt->execute();

            $sql = "UPDATE lectures SET `constraint_venue_category`=:constraint_venue_category WHERE lecturer='" . $lecturer . "'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":constraint_venue_category", $venues);
            $stmt->execute();

            $sql = "UPDATE lectures SET `constraint_days`=:constraint_days WHERE lecturer='" . $lecturer . "'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":constraint_days", $days);
            $stmt->execute();

            echo "SUCCESS";
            $conn = null;
        } catch (PDOException $e) {
            echo "FAILED:" . $e->getMessage();
        }
    } else { // my lectures
        try {
            $stmt = $conn->prepare("SELECT id,unit_code,
                allocated_venue,allocated_timeshift,allocated_day from lectures where lecturer=:username");
            $stmt->bindParam(":username", $_SESSION["username"]);
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $rows = "";
            if ($result) {
                $rows = "";
                foreach ($result as $row) {
                    echo  $row['id'] . "^"
                        . $row['unit_code'] . "^"
                        . $row['allocated_venue'] . "^"
                        . $row['allocated_timeshift'] . "^"
                        . $row['allocated_day'] . "#";
                }
            }
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1146) {
                echo "FAILED: Timetable not yet prepared";
            } else {
                echo $e->getMessage();
            }
        }
        $conn = null;
    }
} else {
    echo "<script>location.href='../login.php';</script>";
    die();
}
