<?php 
include "dbConfig.php";
//create database connection
    $conn = new mysqli($dbConfig["servername"], $dbConfig["username"], $dbConfig["password"], $dbConfig["dbname"]);

//check the connection for errors
if($conn->connect_errno != 0) {
    die("Connection Failed because : " . $conn->connect_error);
}
?>