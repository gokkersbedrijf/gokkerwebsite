<?php

$connection = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db( $connection, "members");
if(isset($login_session)) {
    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($connection, "SELECT username FROM members WHERE username='$user_check'" );
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['username'];
}
if(!isset($login_session)){
    mysqli_close($connection);
}
?>