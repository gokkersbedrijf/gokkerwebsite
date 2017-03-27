<?php
session_start();
require 'session.php';
$error = false;
if ( isset($_POST['register_btn']) ) {
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $password2 = trim($_POST['password2']);
    $password2 = strip_tags($password2);
    $password2 = htmlspecialchars($password2);

    if (empty($username)) {
        $error = true;
        $message = "Please enter your full name.";
        header("Location:index.php");
    } else if (strlen($username) < 3) {
        $error = true;
        $message = "Name must have atleat 3 characters.";
        header("Location:index.php");
    } else if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
        $error = true;
        $message = "Name must contain alphabets and space.";
        header("Location:index.php");
    }

    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $message = "Please enter valid email address.";
        header("Location:index.php");
    } else {

        $query = "SELECT email FROM members WHERE email='$email'";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if($count!= 0){
            $error = true;
            $message = "Provided Email is already in use.";
            header("Location:index.php");
        }
    }
    if (empty($password)){
        $error = true;
        $message = "Please enter password.";
        header("Location:index.php");
    } else if(strlen($password) < 6) {
        $error = true;
        $message = "Password must have atleast 6 characters.";
        header("Location:index.php");
    }
    if (empty($password2) || $password2 != $password){
        $error = true;
        $message = "Passwords do not match.";
        header("Location:index.php");
    }
    $password = hash('sha256', $password);
    if( !$error ) {

        $query = mysqli_query($connection,"INSERT INTO members(username,email,password) VALUES('$username','$email','$password')");
        $res = mysqli_query($connection,$query);

        if ($res) {
            $message = "Successfully registered, you may login now";
            $_SESSION['login_user'] = $username;
            header("Location:index.php");
        } else {
            $message = "Something went wrong, try again later...";
            header("Location:index.php");
        }

    }
}

?>

