<?php
session_start();
include '../db/db-config.php';

$req = strtoupper($_SERVER['REQUEST_METHOD']);
if ($req == 'POST') {
    // Get user input from the form
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pswd = trim($_POST['password']);

    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $pswd;
    
    // Check if the any field is empty
    if (empty($username)) {
      
        $_SESSION["error"] = "Required! Username can't be empty.";
        header("Location: http://localhost/php/register/index.php");
        exit();
    }
    if (empty($email)) {
       
        $_SESSION["error"] = "Required! Email can't be empty.";
        header("Location: http://localhost/php/register/index.php");
        exit();
    }
    if (empty($pswd)) {
       
        $_SESSION["error"] = "Required! Password can't be empty.";
        header("Location: http://localhost/php/register/index.php");
        exit();
    }

    // Sanitize user input to prevent SQL injection (good security practice)
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $pswd_hashed = password_hash($pswd, PASSWORD_BCRYPT);

    // Prepare the SQL query to insert the data
    $query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$pswd_hashed')";

    // Check if the query was successful
    if (mysqli_query($conn, $query)) {
        $_SESSION["success"] = "User account has been created successfully";
        header("Location: http://localhost/php/register/public/views/login.php");
        exit();
    } else {
        // If there's an error with the database query
        $_SESSION["error"] = "Failed to create an account. Please try again.";
        header("Location: http://localhost/php/register/index.php");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the request method is not POST
    $_SESSION["error"] = "Invalid request method!";
    header("Location: http://localhost/php/register/index.php");
    exit();
}
