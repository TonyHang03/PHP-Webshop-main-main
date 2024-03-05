<?php 
$title = "Register";
include_once "PHP_Structure/header.php";
?>
<body>
    <div>
                    <!------------------------------------------ PHP START ---------------------------------------->                    
        <p><a href="index.php">Home</a></p>
        <hr>
        <br>
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
                <input type="number" name="phone_number" id="phone_number" placeholder="Telephone Number" required><br>
                
                <label>Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                
                <label>Enter Password again:</label>
                <input type="password" name="password_validation" id="password_validation" placeholder="Password" required><br>
                <input type = "submit" name = "submit" value = "Register" required>            
            </div>

            <div>
                <p>You already have an account?<br>
                <a href="login.php">Login</a></p>
            </div>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            //DB connection
            include './DB_Handle/connectDB.php';

            //Attributes
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $telephone_number = $_POST['telephone_number'];

            //Hashing password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            //Verify if the "email" already exist
            $query_verify = mysqli_query($conn,"SELECT email FROM user WHERE email = '$email' AND username FROM user WHERE username = '$username'");


            //Method
            //Verify if the values mach with thoese in the DB
            if(mysqli_num_rows($query_verify) != 0) {
                echo "<div>
                         <p>Something goes wrong, Try another One!</p>
                     </div> <br>";
                     
                echo "<a href = 'index.php'><button>Go Back</button>";
            }
            else {
                $sql = mysqli_query($conn, "INSERT INTO user (username, email, password, firstname, lastname, telephone_number)
                    VALUES ('$username', '$email', '$hashed_password', '$firstname', '$lastname', '$telephone_number')") 
                    or die("Error !!!!!");

                    echo "<h2>Registration Successful</h2>"; 
                    echo "Thank you for registering, " . $firstname . ' ' . $lastname . "!<br>"; 
                    echo "You'll be redirected to login page in 5 seconds"; 
                    header ("refresh:5; url=login.php"); 
            }
        }
    ?>
    </div>   
<?php
include_once "PHP_Structure/footer.php";
?>