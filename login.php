<?php 
$title = "Login";
include_once "PHP_Structure/header.php";
?>
<body>
    <div>
        <p><a href="index.php">Home</a></p>
        <hr>
        <form action="" method="post">
            <div class="container">
                <p>Login</p>
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

<?php
/* 
login-function after user submit
if submit is set, 
*/
if(isset($_POST['submit'])) {
    // DB-Connection
    include './DB_Handle/connectDB.php';

    $stmt= $conn->prepare("SELECT * FROM user WHERE username = '(:username)'");
    $stmt->bind_param(":username", $username);

    // Login Credential as variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Verification for the existence for "username" in DB

    //Verify if the values mach "username" and "password"
    if(mysqli_num_rows($query) != 0) {
        //Search user in data
        $user_data = mysqli_fetch_assoc($query);

        if(isset($user_data['password']) && password_verify($password, $user_data['password']))
        {
            session_start();
            $_SESSION['user_data'] = $user_data;

            echo "<div>
                    <p> Welcome $username ! <br> You'll be redirected to the Shopping page "; 
                    header ("refresh:3; url=offers.php");
                    "</div> <br>";
        }
        else {
            echo "<div>
                    <h2>Username or Password are Invalid</h2>
                    </div> <br>";
        }
    }
    else {
        echo "<div>
                <h2>Login Failed <br> User doesn't exist</h2>
                </div> <br>";
    }
}
?>