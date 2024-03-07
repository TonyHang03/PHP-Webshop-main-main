<?php
$title = "Admin-Page";
include_once "PHP_Structure/header.php";

if (!isset($_SESSION['userdata'])) {
    echo "You are not permitted to enter this site!";
    header("refresh: 3; url=index.php");
    exit();
}

if (!$_SESSION['userdata']["isAdmin"]) {
    echo "You are not permitted to enter this site!";
    header("refresh: 3; url=index.php");
    exit();
}
else {
    echo "Welcome to AdminPage!";
}

include_once "PHP_Structure/footer.php";
?>