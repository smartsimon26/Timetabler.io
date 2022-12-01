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

$login_option = $_GET['login_option'];
$table_name = "";
switch ($login_option) {
    case 'admin':
        $table_name = 'admins';
        break;
    case 'lecturer':
        $table_name = 'lecturers';
        break;
    case 'timetabler':
        $table_name = 'timetablers';
        break;

    default:
        # code...
        break;
}


if (isset($_GET['email'])) { //signup
    try {
        $email = $_GET['email'];
        $conn->exec("CREATE TABLE IF NOT EXISTS " . $table_name . " ( `id` INT NOT NULL AUTO_INCREMENT , 
            `username` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL, 
            `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;");
        $sql = "INSERT INTO " . $table_name . "(username, email, password)VALUES(:username, :email, :password)";
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
        //echo $table_name;
        $stmt = $conn->prepare("SELECT id from " . $table_name . " where username=:username and password=:password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res) { //if results came in
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["login_option"] = $login_option;
            echo "SUCCESS";
            //header("location:http://127.0.0.1/io/Timetabler.io-main/dashboard.php");
            switch ($_SESSION['login_option']) {
                case 'admin':
                    echo "<script>location.href='administrator/dashboard.php';</script>";
                    break;
                case 'lecturer':
                    echo "<script>location.href='lecturer/dashboard.php';</script>";
                    break;
                case 'timetabler':
                    echo "<script>location.href='timetabler/dashboard.php';</script>";
                    break;
                
                default:
                    # code...
                    break;
            }
            
            die();
        } else {
            echo "FAILED:\nUsername or password incorrect";
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1146) {
            echo "FAILED:\nYou need to sign up first";
        } else {
            echo "FAILED: Error occured";
        }
    }
}
$conn = null;
