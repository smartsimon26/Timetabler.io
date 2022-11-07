<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "timetabler";
$conn;
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<div><label class=\"checkbox-inline\"><input type=\"checkbox\" id=\"" . parent::current() . "\">".parent::current()."</label></div>" ;
    }

    function beginChildren() {
        echo "";
    }

    function endChildren() {
        echo "";
    }
}
try {
    $conn = new PDO("mysql:host=$servername", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("CREATE DATABASE IF NOT EXISTS timetabler");
    $conn->exec('USE timetabler');
    $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`timeshifts` ( `id` INT NOT NULL AUTO_INCREMENT , `timeshift` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`timeshift`)) ENGINE = InnoDB;");
    $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`venues` ( `id` INT NOT NULL AUTO_INCREMENT , `venue` VARCHAR(20) NOT NULL , 
        PRIMARY KEY (`id`), UNIQUE (`venue`)) ENGINE = InnoDB;");
    $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`days` ( `id` INT NOT NULL AUTO_INCREMENT , `day` VARCHAR(20) NOT NULL , 
        PRIMARY KEY (`id`), UNIQUE (`day`)) ENGINE = InnoDB;");
    if ($_GET['value']=="day") {
    //Days
        $stmt = $conn->prepare("SELECT day from days order by id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v;
        }
    }
    //Timeshifts
    elseif ($_GET['value']=="timeshift") {
        $stmt = $conn->prepare("SELECT timeshift from timeshifts order by id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v;
        }
    }
    //Venues
    elseif ($_GET['value']=="venue") {
        $stmt = $conn->prepare("SELECT venue from venues order by id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v;
        }
    }
    $conn = null;

} catch (PDOException $e) {
    echo "FAILED:" . $e->getMessage();
}

?>