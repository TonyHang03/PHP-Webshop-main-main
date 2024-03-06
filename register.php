<!-- div>form:post>(label+input+{})*7 for 1 div 1 form 7 labels with input-->
<?php
    $text = "";
    if(isset($_POST['submit'])) {
        // Include userController for registerUser function
        include "PHP_Controller/userController.php";

        // Register function 
        registerUser(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['username'],
            $_POST['email'],
            $_POST['phonenumber'],
            $_POST['password'],
            $_POST['passwordValidation']
        );      
    }
?>

<?php 
$title = "Register";
include_once "PHP_Structure/header.php";
?>
    <div>
        <p><a href="index.php">Home</a></p><hr><br>
        <form action="register.php" method="post">
            <div class="container">
                <p>Register</p><br>
                <?php echo $text; ?>
                <label for="firstname">Firstname:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Firstname" value="<?php echo @$_POST['firstname']; ?>" required><br>

                <label for="lastname">Surname:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Surname" value="<?php echo @$_POST['lastname']; ?>" required><br>
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo @$_POST['username']; ?>" required><br>
                
                <label for="email">Email-Address:</label>
                <input type="email" id="email" name="email" placeholder="Email@email.com" value="<?php echo @$_POST['email']; ?>" required><br>
                
                <label>Phone Number:</label>
                <input type="number" name="phoneNumber" id="phonenumber" placeholder="Phone Number" value="<?php echo @$_POST['phoneNumber']; ?>"required><br>
                
                <label>Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                
                <label>Enter Password again:</label>
                <input type="password" name="passwordValidation" id="passwordValidation" placeholder="Password" required><br>
                <input type = "submit" name = "submit" value = "Register">
            </div>

            <div>
                <p>You already have an account?<br>
                <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
<?php
include_once "PHP_Structure/footer.php";
?>