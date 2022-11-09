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
        return "<div><label class=\"checkbox-inline\"><input type=\"checkbox\" id=\"" .
            parent::current() .
            "\">" .
            parent::current() .
            "</label></div>";
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
        foreach (
            new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))
            as $k => $v
        ) {
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
                    "INSERT INTO `timeshifts` (`timeshift`) VALUES('08:00-10:00'),('11:00-01:00'),('01:00-03:00'),('03:00-05:00');"
                );
                $stmt = $conn->prepare(
                    "SELECT timeshift from timeshifts order by id"
                );
                $stmt->execute();
            }
        }
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (
            new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))
            as $k => $v
        ) {
            echo $v;
        }
    }
    //Venues
    elseif ($_GET["value"] == "venue") {
        $stmt;
        try {
            $stmt = $conn->prepare("SELECT venue from venues order by id");
            $stmt->execute();
        } catch (PDOException $e) { // If table doesn't exist it is created
            if ($e->errorInfo[1] == 1146) {
                $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`venues` ( `id` INT NOT NULL AUTO_INCREMENT , `venue` VARCHAR(20) NOT NULL , 
        PRIMARY KEY (`id`), UNIQUE (`venue`)) ENGINE = InnoDB;");
                $conn->exec(
                    "INSERT INTO `venues` (`venue`) VALUES('ADB1'),('ADB2'),('COMP1'),('COMP2'),('EC1'),('EC2'),('EC3'),('MPH');"
                );
                $stmt = $conn->prepare("SELECT venue from venues order by id");
                $stmt->execute();
            }
        }
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (
            new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))
            as $k => $v
        ) {
            echo $v;
        }
    }
    $conn = null;
} catch (PDOException $e) {
    echo "FAILED:" . $e->getMessage();
}

?>