<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "timetabler";
// Create connection
$conn;
try {
    $conn = new PDO("mysql:host=$servername", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("CREATE DATABASE IF NOT EXISTS timetabler");
    $conn->exec("USE timetabler");
} catch (PDOException $e) {
    echo "FAILED:" . $e->getMessage();
}
if (isset($_GET["timeshift"])) {
    $timeshift = $_GET["timeshift"];
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `timetabler`.`timeshifts` ( `id` INT NOT NULL AUTO_INCREMENT , `timeshift` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`timeshift`)) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "INSERT INTO timeshifts(timeshift)VALUES(:timeshift)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":timeshift", $timeshift);
        $stmt->execute();
        echo "SUCCESS";
        $conn = null;
    } catch (PDOException $e) {
        echo "FAILED:" . $e->getMessage();
    }
} elseif (isset($_GET["venue"])) {
    $venue = $_GET["venue"];
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `timetabler`.`venues` ( `id` INT NOT NULL AUTO_INCREMENT , `venue` VARCHAR(20) NOT NULL , 
        PRIMARY KEY (`id`), UNIQUE (`venue`)) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "INSERT INTO venues(venue)VALUES(:venue)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":venue", $venue);
        $stmt->execute();
        echo "SUCCESS";
        $conn = null;
    } catch (PDOException $e) {
        echo "FAILED:" . $e->getMessage();
    }
} elseif (isset($_GET["day"])) {
    $day = $_GET["day"];
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `timetabler`.`days` ( `id` INT NOT NULL AUTO_INCREMENT , `day` VARCHAR(20) NOT NULL , 
        PRIMARY KEY (`id`), UNIQUE (`day`)) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "INSERT INTO days(day)VALUES(:day)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":day", $day);
        $stmt->execute();
        echo "SUCCESS";
        $conn = null;
    } catch (PDOException $e) {
        echo "FAILED:" . $e->getMessage();
    }
} elseif (isset($_GET["unit_code"])) {
    $unit_code = $_GET['unit_code'];
    $lecturer = $_GET['lecturer'];
    $timeshifts = $_GET['timeshifts'];
    $venues = $_GET['venues'];
    $days = $_GET['days'];
    foreach ($_GET as $key => $value) {
        echo $key . ",," . $value . "\n";
    }
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `timetabler`.`lectures` ( `id` INT NOT NULL AUTO_INCREMENT , 
        `unit_code` VARCHAR(20) NOT NULL , `lecturer` VARCHAR(30) NOT NULL, `timeshifts` VARCHAR(50), 
        `venues` VARCHAR(50), `days` VARCHAR(50), PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "INSERT INTO lectures(`unit_code`,`lecturer`,`timeshifts`,`venues`,`days`)VALUES(:unit_code,:lecturer,:timeshifts,:venues,:days)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":unit_code", $unit_code);
        $stmt->bindParam(":lecturer", $lecturer);
        $stmt->bindParam(":timeshifts", $timeshifts);
        $stmt->bindParam(":venues", $venues);
        $stmt->bindParam(":days", $days);
        $stmt->execute();
        echo "SUCCESS";
        $conn = null;
    } catch (PDOException $e) {
        echo "FAILED:" . $e->getMessage();
    }
}
?>