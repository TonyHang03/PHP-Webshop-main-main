<?php
require_once "PHP_Controller/userController.php";
// if userdata is not set, redirect to logout
if(!isset($_SESSION['userdata'])) {
    header("Location: Login.php");
    exit();
}
else {
    $user = $_SESSION['userdata'];
}
?>

<?php 
$text = "Account";
include "PHP_Structure/header.php";
?>
    <div class="container">
        <h4>First Name:</h4> <?php $user['userdata']?>
        <h4>Last Name:</h4> <?php $user['firstname']?>
        <h4>Username:</h4>  <?php $user['lastname']?>
        <h4></h4>
    </div>

<?php 
include "PHP_Structure/footer.php";
?>