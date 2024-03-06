<?php
// Function for DB-Connection
function connectDB() {
    // include config with the credentials for the database
    require dirname(__DIR__) . "\Config\config.php";
    //create database connection
    $conn = new mysqli($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);

    //check the connection for errors
    if($conn->connect_errno != 0) {
        die("Connection Failed because : " . $conn->connect_error);
    }
    return $conn;
}


// Server function for Register
function registerUser($firstname, $lastname, $username, $email, $phoneNumber, $password, $passwordValidation) {
    // DB-Connection
    $conn = connectDB();

    $args = func_get_args();
    $args = array_map(function($value){
        return trim($value);
    }, $args);

    // check if input-fields are filled
    foreach ($args as $value) {
        if(empty($value)) {
            return "Register Failed<br>
                    Please fill in all fields";
        }
        elseif(preg_match("/([<|>])/", $value)) {
            return "Special characters like '<>' are not allowed";
        }
    }
    if ($password !== $passwordValidation) {
        
    }

    //Verify if the "email" already exist
    $sql = "SELECT email, username FROM user WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $userdata = $result->fetch_assoc();

    if ($userdata != null) {
        if ($userdata['username'] == $username) {
            echo "The username is already taken!<br>";
        }
        if ($userdata['email'] == $email) {
            echo "The Email is already registered with a different account<br>";
        }
        return "The registration was not possible<br>";
    }
    if () {

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
    // DB-Connection
    $conn = connectDB();

    $args = func_get_args();
    $args = array_map(function($value){
        return trim($value);
    },$args);

    // check if input-fields are filled
    foreach ($args as $value) {
        if (empty($value)) {
            return "Please fill in both fields!";
        }
        elseif (preg_match("/([<|>])/", $value)) {
            return "Special characters like '<>' are not allowed!";
        }
    }

    // htmlspecialchars to sanatize input
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
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
            $_SESSION['userdata'] = $userdata;

            // Return Welcome message
            header ("refresh:3; url=index.php");
            return "Welcome $username!<br>
                    You will be redirected to the Homepage!";
        }
        // If password_verify returns false
        else {
            return "Login Failed<br>
                    Username or Password are Invalid!";
        }
    }
    // If userdata is null
    else {
        return "Login Failed<br>
                User doesn't exist";
    }
}

function logoutUser() {

    // Destroy the session 
    session_destroy(); 

    // Redirect to login page
    header("Location: login.php");
    exit();
}