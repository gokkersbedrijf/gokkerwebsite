<?php
$servername = "localhost";
$username = "username";
$password = "password";

$conn = new mysqli($servername,$username,$password);

if ($conn->connect_error)
{
    die("connection failed: ".$conn->connect_error);
}
echo "connected succesfully";
?>

