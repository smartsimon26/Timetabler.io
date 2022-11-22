<?php
function getSize($data = "")
{
    if (strlen($data) == 0) {
        return 0;
    } else {
        return count(explode(",", $data));
    }
}
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
    //Setting venue details
} elseif (isset($_GET["venue_name"])) {
    $venue_name = $_GET["venue_name"];
    $venue_category = $_GET["venue_category"];
    $venue_capacity = $_GET["venue_capacity"];
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `timetabler`.`venues` ( `id` INT NOT NULL AUTO_INCREMENT , `venue` VARCHAR(20) NOT NULL , `category` VARCHAR(30) NOT NULL ,  `capacity` INT(4) NOT NULL ,
        PRIMARY KEY (`id`), UNIQUE (`venue`)) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "INSERT INTO venues(venue, category, capacity)VALUES(:venue, :category, :capacity)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":venue", $venue_name);
        $stmt->bindParam(":category", $venue_category);
        $stmt->bindParam(":capacity", $venue_capacity);
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
        echo $key . ", ," . $value . strlen($value) . "\n";
    }
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `timetabler`.`lectures` ( `id` INT NOT NULL AUTO_INCREMENT , 
        `unit_code` VARCHAR(20) NOT NULL , `lecturer` VARCHAR(30) NOT NULL, `constraint_timeshift` VARCHAR(150), 
        `constraint_venue_category` VARCHAR(150), `constraint_days` VARCHAR(150), `Allocated_Day` VARCHAR(50), `Allocated_Timeshift` VARCHAR(50), `Allocated_Venue` VARCHAR(50),`no` int(3) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "INSERT INTO lectures(`unit_code`,`lecturer`,`constraint_timeshift`,`constraint_venue_category`,`constraint_days`,`no`)VALUES(:unit_code,:lecturer,:constraint_timeshift,:constraint_venue_category,:constraint_days,:_no)";
        $stmt = $conn->prepare($sql);
        $num = getSize($days) + getSize($venues) + getSize($timeshifts);
        $stmt->bindParam(":unit_code", $unit_code);
        $stmt->bindParam(":lecturer", $lecturer);
        $stmt->bindParam(":constraint_timeshift", $timeshifts);
        $stmt->bindParam(":constraint_venue_category", $venues);
        $stmt->bindParam(":constraint_days", $days);
        $stmt->bindParam(":_no", $num);
        $stmt->execute();
        echo "SUCCESS";
        $conn = null;
    } catch (PDOException $e) {
        echo "FAILED:" . $e->getMessage();
    }
}
