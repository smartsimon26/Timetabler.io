<?php
session_start();
$servername = "localhost";
$usrname = "root";
$pass = "";
$db = "timetabler";
$conn;

$conn = new PDO("mysql:host=$servername", $usrname, $pass, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
]);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn->exec("CREATE DATABASE IF NOT EXISTS timetabler");
$conn->exec("USE timetabler");
$stmt;

$username = $_GET['username'];
$password = $_GET['password'];

if (isset($_GET['email'])) { //signup
    try {
        $email = $_GET['email'];
        $conn->exec("CREATE TABLE IF NOT EXISTS `timetabler`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , 
            `username` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL, 
            `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;");
        $sql = "INSERT INTO users(username, email, password)VALUES(:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        echo "SUCCESS";
        echo "<script>location.href='login.php';</script>";
        die();
    } catch (PDOException $e) {
        echo "FAILED:" . $e->getMessage();
    }
} else { //login
    try {
        $stmt = $conn->prepare("SELECT id from users where username=:username and password=:password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res) { //if results came in
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            echo "SUCCESS";
            //header("location:http://127.0.0.1/io/Timetabler.io-main/dashboard.php");
            echo "<script>location.href='dashboard.php';</script>";
            die();
        } else {
            echo "FAILED:\nUsername or password incorrect";
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1146) {
            echo "FAILED:\nYou need to sign up first";
        }
    }
}
$conn = null;
