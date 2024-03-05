<?php
$text = "";
// if submit is set, use login function
if(isset($_POST['submit'])) {
    // Include userController for loginUser function
    include "PHP_Controller/userController.php";

    // Login Credential as variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    $text = loginUser($username, $password);
}
?>

<?php 
$title = "Login";
include_once "PHP_Structure/header.php";
?>
    <div>
        <p><a href="index.php">Home</a></p>
        <hr>
        <form action="" method="post">
            <div class="container">
                <p>Login</p>
                <?php echo $text?>
                <br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required><br>

                <input type="submit" name="submit" value = "Login">
            </div>

            <div>
                <p>New Customer?<br>
                <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
<?php
include_once "PHP_Structure/footer.php";
?>