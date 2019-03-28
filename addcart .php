
<?php 
session_start(); 
// error_reporting(0); 
  
$uid = $_SESSION['userid']; 
$iid = $_POST['product']; 
  
$connect = new mysqli("localhost","root","","mebel"); 
if ($connect->connect_error) 
    die("Connection failed: " . $connect->connect_error); 
  
$sql1 = mysqli_query($connect,"select * from cart where userid=$uid and itemid=$iid"); 
$numrows = mysqli_num_rows($sql1); 
  
if($numrows > 0) 
{ 
    $sql2 = mysqli_query($connect,"update cart set quant=quant+1 where userid=$uid and itemid=$iid"); 
} 
else 
{ 
    $sql = "INSERT INTO cart (userid, itemid) VALUES ($uid , $iid)"; 
    $connect->query($sql); 
} 
  
  
mysqli_close($connect); 
?> 
