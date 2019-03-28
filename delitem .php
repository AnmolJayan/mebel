
<?php 
session_start(); 
// error_reporting(0); 
  
$uid = $_SESSION['userid']; 
$iid = $_POST['product']; 
  
$connect = new mysqli("localhost","root","","mebel"); 
if ($connect->connect_error) 
    die("Connection failed: " . $connect->connect_error); 
  
$sql1 = mysqli_query($connect,"select * from cart where itemid=$iid"); 
$numrows = mysqli_num_rows($sql1); 
  
if($numrows > 0) 
    $sql2 = mysqli_query($connect,"delete from cart where itemid=$iid"); 
else 
    echo('Cart is already empty!'); 
  
    mysqli_close($connect); 
?> 
