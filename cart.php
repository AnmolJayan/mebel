
<?php 
if(isset($_COOKIE["userid"])) { 
    $uid = $_COOKIE["userid"]; 
} else { 
    $uid = 0; 
} 
  
$connect = new mysqli("localhost","root","","mebel"); 
if ($connect->connect_error) 
    die("Connection failed: " . $connect->connect_error); 
$amt=0.0; 
  
$sql1 = mysqli_query($connect,"select * from cart where userid='$uid'"); 
$numrows1 = mysqli_num_rows($sql1); 
echo ' 
<script type="text/javascript"> 
    var d = new Date(); 
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000)); 
    var expires = d.toUTCString(); 
    document.cookie = "cart=" + '.$numrows1.' + "; expires=" + expires + "; path=/"; 
</script> 
'; 
  
echo "<h4>Items in "; 
if(!isset($_COOKIE["username"])) { 
    echo 'User'; 
} else { 
    echo $_COOKIE["username"]; 
} 
echo "'s cart: ".$numrows1; 
echo '</h4><br />'; 
  
if($numrows1 > 0) 
{ 
    echo '<ul>'; 
    while($row = mysqli_fetch_assoc($sql1)) 
    { 
        // echo implode(" ",$row); 
  
        $pid = $row['itemid']; 
        $sql2 = mysqli_query($connect,"select * from products where id='$pid'"); 
        $numrows2 = mysqli_num_rows($sql2); 
        if($numrows2 > 0) 
        { 
            $row2 = mysqli_fetch_assoc($sql2); 
            echo '<li id="cp'.$row2['id'].'">'.$row2['name'].' - Rs.'.$row2['price'].'&emsp;x'.$row['quant'].' <span data-id="'.$row2['id'].'" class="rc">&times;</span></li>'; 
            $amt = $amt + ($row2['price'] * $row['quant']); 
        } 
        else 
            echo 'No such product found!'; 
        echo '<br />'; 
    } 
    echo '</ul>'; 
    //echo '<h3>&emsp; Total Amount: Rs.'.$amt.'</h3>'; 
} 
else 
    echo 'Empty Cart!'; 
  
mysqli_close($connect); 
?> 
