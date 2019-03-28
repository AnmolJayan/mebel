<?php 
session_start(); 
// Require the bundled autoload file - the path may need to change 
// based on where you downloaded and unzipped the SDK 
require __DIR__ . '/twilio-php-master/Twilio/autoload.php'; 
  
// Use the REST API Client to make requests to the Twilio REST API 
use Twilio\Rest\Client; 
  
// Your Account SID and Auth Token from twilio.com/console 
$sid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; 
$token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; 
$client = new Client($sid, $token); 
$otp = mt_rand(100000,999999); 
$username=$_POST['usern']; 
  
setcookie("otp", $otp, time() + (600), "/"); // 600 = 10 min 
  
$connect = new mysqli("localhost","root","Nirantak","mebel"); 
if ($connect->connect_error) 
    die("Connection failed: " . $connect->connect_error); 
  
$sql = mysqli_query($connect,"select * from users where username='$username'"); 
$numrows = mysqli_num_rows($sql); 
  
if($numrows > 0) 
{ 
    $row = mysqli_fetch_assoc($sql); 
    $num = "+91".trim($row['phone']); 
} 
else 
    die('<h3 class="log">Incorrect Information!</h3>'); 
echo "Number: ".$num."\n"; 
// Use the client to do fun stuff like send text messages! 
$client->messages->create( 
    // the number you'd like to send the message to 
    $num, 
    array( 
        // A Twilio phone number you purchased at twilio.com/console 
        'from' => '+166xxxxxx47', 
        // the body of the text message you'd like to send 
        'body' => "mebel: your OTP for password change is $otp" 
        ) 
    ); 
  
mysqli_close($connect); 
?> 
