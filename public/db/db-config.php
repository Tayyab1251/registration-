<?php
$SERVERNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DBNAME = 'user_registration';

// Create connection
$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD , $DBNAME);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
