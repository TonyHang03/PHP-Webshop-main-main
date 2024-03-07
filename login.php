<?php 
$title = "Login";
include_once "PHP_Structure/header.php";
?>

<?php
// if submit is set, use login function
if(isset($_POST['submit'])) {
    // Include userController for loginUser function
    // Login function 
    $response = loginUser(
        $_POST['username'], 
        $_POST['password']
    );
}
?>
    <form action="" method="post">
        <div class="login">
            <p>Login</p>
            <div class="error">
                <?php echo @$response; ?><br>
            </div>

            <div class="login_field">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo @$_POST["username"]?>" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br>

                <input type="submit" name="submit" value = "Login">
            </div>
        </div>

        <div class="redirection">
            <p>New Customer?</p>
            <a href="register.php">Register</a>
        </div>
    </form>

<?php
include_once "PHP_Structure/footer.php";
?>