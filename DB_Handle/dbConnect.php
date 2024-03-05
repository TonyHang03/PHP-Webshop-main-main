<?php 
include "dbConfig.php";
//create database connection
    $conn = new mysqli($dbConfig[0], $dbConfig[1], $dbConfig[2], $dbConfig[3]);

//check the connection for errors
if($conn->connect_errno != 0) {
    die("Connection Failed because : " . $conn->connect_error);
}
?>