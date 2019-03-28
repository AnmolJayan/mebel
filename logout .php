<!DOCTYPE html> 
<html lang="en"> 
<?php 
    session_start(); 
?> 
<head> 
    <title>Logout</title> 
    <meta charset="UTF-8" /> 
    <meta name="description" content="Shop for Furniture" /> 
    <meta name="keywords" content="furniture,home,products" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="icon" type="image/png" href="images/logo.png" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> 
    <style> 
        h3 { 
            text-align: center; 
            margin-top: 20px; 
        } 
    </style> 
</head> 
  
<body class="design" id="top"> 
    <?php 
    error_reporting(0); 
  
    echo '<div class="w3-sidebar w3-bar-block w3-transparent w3-card-4" style="width:auto; z-index: 9999;"> 
    <h5 class="w3-bar-item">Menu</h5> 
    <a href="index.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-home" aria-hidden="true"></i> Home</button></a> 
    <a href="about.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-info" aria-hidden="true"></i> About</button></a> 
    <a href="form.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-bars" aria-hidden="true"></i> Register</button></a> 
    <a href="login.php"><button class="w3-bar-item w3-button tablink w3-red"><i class="fa fa-user fa-fw" aria-hidden="true"></i>User</button></a> 
    <a href=""><button class="w3-bar-item w3-button tablink" onclick="cartfun()"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart<p id="qty">'; 
        if(isset($_COOKIE["cart"])) { 
            echo $_COOKIE["cart"]; 
        } else { 
            echo "0"; 
        } 
        echo '</p></button></a> 
    </div>'; 
  
    if(!isset($_COOKIE["username"])) { 
        echo '<h3>You are not logged in!</h3>'; 
    } else { 
        echo '<h3>'.$_COOKIE["username"]; 
        setcookie("username", "", time() - 3600, "/"); 
        setcookie("userid", "", time() - 3600, "/"); 
        setcookie("cart", "", time() - 3600, "/"); 
        setcookie("otp", "", time() - 3600, "/"); 
        echo ' is successfully logged out</h3>'; 
        session_unset(); 
        session_destroy(); 
    } 
    ?> 
    <script type="text/javascript" src="assets/js/jquery-min.js"></script> 
    <script type="text/javascript" src="assets/js/main.js"></script> 
</body> 
</html> 
