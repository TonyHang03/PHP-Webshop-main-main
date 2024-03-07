<?php
$title = "Home";
include_once "PHP_Structure/header.php";
?>

    <div class="container">
        <?php
            // Verify if user is logged in
            if (isset($_SESSION['userdata'])) {
                // Write welcome to user
                $user = $_SESSION['userdata'];
                echo "Welcome {$user['username']}!";
                echo "<p><a href='product.php'> Go to our Products!</a></p>";
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