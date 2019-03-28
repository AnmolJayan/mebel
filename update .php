<!DOCTYPE html> 
<html lang="en"> 
<?php 
session_start(); 
?> 
<head> 
    <title>Update</title> 
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
</div>'; 
  
$username=$_POST['username']; 
$email=$_POST['email']; 
$password=$_POST['password']; 
  
$connect = new mysqli("localhost","root","","mebel"); 
if ($connect->connect_error) 
    die("Connection failed: " . $connect->connect_error); 
  
$sql = mysqli_query($connect,"select * from users where username='$username' AND email='$email'"); 
$numrows = mysqli_num_rows($sql); 
  
if($numrows > 0) 
{ 
    $sql1 = "update users set pass='$password' where username='$username'"; 
    if ($connect->query($sql1) === TRUE) { 
        echo '<h3 class="log">Record updated successfully</h3>'; 
    } else { 
        echo '<h3 class="log">Error updating record: '.$connect->error.'</h3>'; 
    } 
} 
else 
    die('<h3 class="log">Incorrect Information!</h3>'); 
  
setcookie("otp", "", time() - 3600, "/"); 
  
mysqli_close($connect); 
?> 
<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/main.js"></script> 
</body> 
</html> 
