<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "timetabler";
$conn;
class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        /*  return "<div class=\"form-group\"><label class=\"checkbox-inline\"><input type=\"checkbox\" id=\"" .
            parent::current() .
            "\">" .
            parent::current() .
            "</label></div>"; */
        return parent::current() . "|";
    }

    /* function beginChildren()
    {
        echo "";
    }

    function endChildren()
    {
        echo "";
    } */
}
try {
    $conn = new PDO("mysql:host=$servername", $username, $pass, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
    ]);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS timetabler");
    $conn->exec("USE timetabler");

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
    }
    //lectures
    elseif ($_GET["value"] == "lec") {
        $stmt;
        try {
            /*$stmt = $conn->prepare("SELECT id,unit_code,lecturer,constraint_timeshift,
            constraint_venue_category,constraint_days from lectures order by id");*/
            $stmt = $conn->prepare("SELECT * from lectures order by id");
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            if ($result)
                echo "rows\n";
            foreach ($result as $row) {
                echo "<tr><td>" . $row['id'] .
                    "</td><td>" . $row['unit_code'] .
                    "</td><td>" . $row['lecturer'] .
                    "</td><td>" . $row['constraint_timeshift'] . ($row['constraint_timeshift'] == "" ? "" : ",") .
                    $row['constraint_venue_category'] . ($row['constraint_venue_category'] == "" ? "" : ",")
                    . $row['constraint_days'] . "</td></tr>";
                //echo $row['unit_code'];
            }
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1146) {
                echo "FAILED: Please input lectures";
            }
        }
    }
    //timetable
    elseif ($_GET["value"] == "timetable") {
        $stmt;
        try {
            /*$stmt = $conn->prepare("SELECT id,unit_code,lecturer,constraint_timeshift,
            constraint_venue_category,constraint_days from lectures order by id");*/
            $stmt = $conn->prepare("SELECT id,unit_code,lecturer,constraint_timeshift,
            constraint_venue_category,constraint_days from lectures order by no DESC");
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
                        . $row['lecturer'] . "^"
                        . "v^"
                        . "t^"
                        . "d^"
                        . $row['constraint_timeshift'] . "|"
                        . $row['constraint_venue_category'] . "|"
                        . $row['constraint_days'] . "#";
                    /*
                        . ($row['constraint_timeshift'] == "" ? "" : ($row['constraint_timeshift'] . "|"))
                        . ($row['constraint_venue_category'] == "" ? "" : ($row['constraint_venue_category'] . "|"))
                        . ($row['constraint_days']) . "#";
                        */
                }
            }
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1146) {
                echo "FAILED: Input lectures";
            }
        }
    }
    $conn = null;
} catch (PDOException $e) {
    echo "FAILED:" . $e->getMessage();
}
