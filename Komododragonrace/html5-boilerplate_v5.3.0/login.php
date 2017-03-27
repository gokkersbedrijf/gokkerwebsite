<?php
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("Location: index.php");
    }
    else
    {

        $username=$_POST['username'];
        $password=$_POST['password'];
        $connection = mysqli_connect("localhost", "root", "", "members");

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $db = mysqli_select_db( $connection, "members");

        $query = mysqli_query($connection, "SELECT * FROM members WHERE password='$password' AND username='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            $_SESSION['login_user'] = $username;
            die("1");
            header("location: index.php");
        } else {
            die("2");
            header("location: index.php");
        }
        mysqli_close($connection);

    }

}

?>