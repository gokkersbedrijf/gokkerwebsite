<?php
    session_start();

    $db = mysqli_connect("localhost", "root", "", "users");
    if (isset($_POST['register_btn'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);
        if ()
            if ($password == $password2){
                $password = md5($password);
                $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
                mysqli_query($db, $sql);
                $_SESSION['message'] = "Thank you for registering.";
                $_SESSION['username'] = $username;
                header("location: index.php");
            }
            else{
                $_SESSION['message'] = "The two passwords do not match";
            }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Komododragon Race | Register </title>
</head>
<body>
    <div class="header">

    </div>
    <div class="main-content">
        <form method="post" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password2">Password Again</label>
                <input type="password" name="password2" id="password2" required>
            </div>
            <div class="form-group">
                <input type="submit" name="register_btn" value="Register">
            </div>
        </form>
    </div>
</body>
</html>