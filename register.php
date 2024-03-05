<?php 
$title = "Register";
include_once "PHP_Structure/header.php";
?>
    <div>
        <p><a href="index.php">Home</a></p><hr><br>
        <form action="register.php" method="post">
            <div class="container">
                <p>Register</p><br>
                <label for="firstname">Firstname:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Firstname" required><br>

                <label for="lastname">Surname:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Surname" required><br>
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required><br>
                
                <label for="email">Email-Address:</label>
                <input type="email" id="email" name="email" placeholder="Email@email.com" required><br>
                
                <label>Phone Number:</label>
                <input type="number" name="phone_number" id="phoneNumber" placeholder="Phone Number" required><br>
                
                <label>Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                
                <label>Enter Password again:</label>
                <input type="password" name="passwordValidation" id="passwordValidation" placeholder="Password" required><br>
                <input type = "submit" name = "submit" value = "Register" required>
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
<?php
    if(isset($_POST['submit'])) {
        // Include userController for registerUser function
        include "PHP_Controller/userController.php";

        // Register values as variables
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $passwordValidation = $_POST['passwordValidation'];

        
    }
?>