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
} catch (PDOException $e) {
    echo "FAILED:" . $e->getMessage();
}
if (isset($_GET['timeshift'])) {
    $timeshift = $_GET['timeshift'];
    try {
        $conn->exec("CREATE DATABASE IF NOT EXISTS timetabler");
        $conn->exec('USE timetabler');
        //$sql="CREATE TABLE IF NOT EXISTS timeshifts(id int not null auto_increment,timeshift varchar(20) not null unique, primary key(id)";
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
}
?>