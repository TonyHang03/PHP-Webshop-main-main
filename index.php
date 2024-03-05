<?php
$title = "Home";
include_once "PHP_Structure/header.php";
?>
<body>
    <div class="container">
        <?php 
            session_start();

            // Verify if User are an Objekt
            if (isset($_SESSION['user_data'])) {
                // If the user is alredy logged, write some welcome text or redirect where else
                $user = $_SESSION['user_data'];
                echo "Welcome " . $user['username'] . "!";
                echo "<p><a href='offers.php'> Go to our Products!</a></p>";
            } 
            else {
                // Show "Login" or "Register" if User is not logged in
                echo "<header>Welcome to our WebShop!<p><a href='login.php'>Login</a> or <a href='register.php'>Register</a></p></header>";
            }
        ?>


    </div>
<?php
include_once "PHP_Structure/footer.php";
?>