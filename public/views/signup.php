<?php
session_start();
include '../db/db-config.php';

$req = strtoupper($_SERVER['REQUEST_METHOD']);
if ($req == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pswd = trim($_POST['password']);


    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $pswd;

    // Check if the any field is empty
    if (empty($username)) {
        $_SESSION["error"] = "Required! Username can't be empty.";
        sleep(1);
        header("Location: http://localhost/php/register/index.php");
        exit();
    }
    if (empty($email)) {

        $_SESSION["error"] = "Required! Email can't be empty.";
        sleep(1);
        header("Location: http://localhost/php/register/index.php");
        exit();
    }
    // email sanitization
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION["error"] = " Invalid Email format!";
        sleep(1);
        header("Location: http://localhost/php/register/index.php");
        exit();
    }
    if (empty($pswd)) {

        $_SESSION["error"] = "Required! Password can't be empty.";
        sleep(1);
        header("Location: http://localhost/php/register/index.php");
        exit();
    }

    // Sanitize user input to prevent SQL injection (good security practice)
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    // $pswd_hashed = password_hash($pswd, PASSWORD_BCRYPT);

    // Prepare the SQL query to insert the data
    $query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$pswd')";

    // Check if the query was successful
    if (mysqli_query($conn, $query)) {
        $_SESSION["success"] = $username . " 's' account has been created successfully";
        sleep(1);
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
    sleep(1);
    header("Location: http://localhost/php/register/index.php");
    exit();
}
