<?php
session_start();
if( isset($_SESSION['login_user'])){
    header("Location: index.php");
}
require 'session.php';
if ( isset($_POST['register']) ) {

    $name = trim($_POST['username']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $password2 = trim($_POST['password2']);
    $password2 = strip_tags($password2);
    $password2 = htmlspecialchars($password2);

    if (empty($name)) {
        $error = true;
        $nameError = "Please enter your full name.";
        die("1");
    } else if (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have atleat 3 characters.";
        die("2");
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
        die("3");
    }

    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
        die("4");
    } else {

        $query = "SELECT email FROM members WHERE email='$email'";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if($count!= 0){
            $error = true;
            $emailError = "Provided Email is already in use.";
            die("5");
        }
    }
    if (empty($password)){
        $error = true;
        $passError = "Please enter password.";
        die("6");
    } else if(strlen($password) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
        die("7");
    }
    if (empty($password2) || $password2 != $password){
        $error = true;
        $pass2Error = "Passwords do not match.";
        die("8");
    }
    $password = hash('sha256', $password);
    if( !$error ) {

        $query = mysqli_query($connection,"INSERT INTO members(username,email,password) VALUES('$name','$email','$password')");
        $res = mysqli_query($connection,$query);

        if ($res) {
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
            die("9");
            header("Location: index.php");
        } else {
            $errMSG = "Something went wrong, try again later...";
            die("10");
            header("Location: index.php");
        }

    }
}

?>

