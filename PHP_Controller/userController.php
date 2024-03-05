<?php
// Function for DB-Connection
function connectDB() {
    include dirname(__DIR__) . "\DB_Handle\dbConnect.php";
    return $conn;
}


// Server function for Register
function registerUser($firstname, $lastname, $username, $email, $phoneNumber, $password, $passwordValidation) {

    $conn = connectDB();

    if ($username === "" || $password === "") {
        return "<div>
                <h2>Login Failed<br>
                Please fill in both fields</h2>
                </div>";
    }
    elseif ($password != $passwordValidation) {
        return "";
    }

    //Verify if the "email" already exist
    $sql = "SELECT email FROM user WHERE email = '?' OR username FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $userdata = $result->fetch_assoc();

    if ($userdata != null) {
        if ($userdata["username"] == $username) {
            echo "The username is already taken!<br>";
        }
        if ($email["email"] == $email) {
            echo "The Email is already registered with a different account<br>";
        }
        return "The registration was not possible<br>";
    }
    else {
        //Hashing password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO user(username, email, password, firstname, lastname, telephone_number) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $username, $email, $passwordHash, $firstname, $lastname, $phoneNumber);
        $stmt->execute();

        header("refresh:5; url=login.php");
        return "<h2>Registration Successful</h2>
                Welcome $firstname $lastname!<br>
                You will be redirected to the login page in 5 seconds!";
    }
}


// Server function for Login
function loginUser($username, $password) {

    $conn = connectDB();

    // check if both input-fields are filled
    if ($username === "" || $password === "") {
        return "<div>
                <h2>Login Failed<br>
                Please fill in both fields</h2>
                </div>";
    }

    // htmlspecialchars to sanatize input
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userdata = $result->fetch_assoc();

    // Verification of "username" and "password"
    // If userdata is not null, continue
    if($userdata != null) {
        // Verify password
        if(password_verify($password, $userdata['password'])) {
            // Start session and save userdata to current session
            session_start();
            $_SESSION['user_data'] = $userdata;

            // Return Welcome message
            return "<div>
                    <p> Welcome $username !</p>
                    <br> You'll be redirected to the Shopping page";
                    header ("refresh:3; url=offers.php");
                    "</div>";
        }
        // If password_verify returns false
        else {
            return "<div>
                    <h2>Login Failed<br>
                    Username or Password are Invalid</h2>
                    </div>";
        }
    }
    // If userdata is null
    else {
        return "<div>
                <h2>Login Failed<br>
                User doesn't exist</h2>
                </div>";
    }
}
?>