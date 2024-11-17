<?php
session_start();
// Include the database configuration to establish a connection
include '../db/db-config.php'; // Adjust the path if necessary

$req = strtoupper($_SERVER['REQUEST_METHOD']);
if ($req == 'POST') {
    // Get user input from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pswd = $_POST['password'];
    $pswd_hashed = password_hash($pswd,PASSWORD_BCRYPT);

    $query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$pswd')";

    if (mysqli_query($conn, $query)) { 
        $_SESSION["success"] = "User account has been created successfully";
    
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        $_SESSION["error"] = "Failed to craete an account";

    }
    mysqli_close($conn);
    header("Location: http://localhost/php/registration/index.php");
    exit();
} else {
    echo 'Not Submitted';
}
?>
