<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Komododragon Race | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<header>
    <nav>
        <ul>
            <li id="login">
                <?php
                if(isset ($_SESSION['login_user']))
                {
                    echo "<span style='color:#444; margin:0 5px;'>Welcome, {$_SESSION['login_user']}</span>";
                }
                elseif(!isset ($_SESSION['login_user']))
                {
                    $output = '<a id="login-trigger" href="#">Log in <span>&#x25BC;</span></a>';
                    $output .= '<div id="login-content">';
                    $output .= '<form method="post" action="login.php">';
                    $output .= '<div class="inputs">';
                    $output .= '<input id="username" type="text" name="username" placeholder="Username" required>';
                    $output .= '<input id="password" type="password" name="password" placeholder="Password" required>';
                    $output .= '</div>';
                    $output .= '<div class="inputs">';
                    $output .= '<input type="submit" id="submit" name="submit" value="Log in">';
                    $output .= '</div>';
                    $output .= '</form>';
                    $output .= '</div>';
                    echo $output;
                }
                ?>
            </li>
            <li id="signup">
                <?php
                    if(isset ($_SESSION['login_user']))
                    {
                        echo "<a href=\"logout.php\"><span style='color:#000; margin:0 5px;'>Log Out</span></a>";
                    }
                    elseif(!isset ($_SESSION['login_user']))
                    {
                        $output = '<a id="signup-trigger" href="#">Sign up <span>&#x25BC;</span></a>';
                        $output .= '<div id="signup-content">';
                        $output .= '<form method="post" action="register.php">';
                        $output .= '<div class="inputs">';
                        $output .= '<input type="text" name="username" id="username" placeholder="Username" required>';
                        $output .= '';
                        $output .= '<input type="email" name="email" id="email" placeholder="E-Mail" required>';
                        $output .= '';
                        $output .= '<input type="password" name="password" id="password" placeholder="Password" required>';
                        $output .= '';
                        $output .= '<input type="password" name="password2" id="password2" placeholder="Repeat Password" required>';
                        $output .= '';
                        $output .= '</div>';
                        $output .= '<div class="inputs">';
                        $output .= '<input type="submit" name="register_btn" id="register" value="Register">';
                        $output .= '</div>';
                        $output .= '</form>';
                        $output .= '</div>';
                        echo $output;
                    }
                ?>

        </ul>
    </nav>
</header>


</body>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/login.js"></script>
<script src="js/signup.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
