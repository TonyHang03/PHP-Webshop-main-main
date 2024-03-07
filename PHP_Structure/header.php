<?php
require "PHP_Controller/userController.php";
if (isset($_GET['logout'])) {
    logoutUser();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../CSS/styles.css">
    </head>

    <body>
        <nav> 
        <ul> 
            <li><a href="index.php">Home</a></li> 
            <?php
            if (isset($_SESSION['userdata'])) {
                if($_SESSION['userdata']['isAdmin']) {
                    echo "<li><a href='admin.php'>Admin-Page</a></li>";
                };
                echo "<li><a href='cart.php'>Cart</a></li>";
                echo "<li><a href='?logout'>Logout</a></li>";
                
            }
            else {
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
        </nav>
        <hr>