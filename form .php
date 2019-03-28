<!DOCTYPE html> 
<html lang="en"> 
<?php 
    session_start(); 
?> 
<head> 
    <title>Registration Form</title> 
    <meta charset="UTF-8" /> 
    <meta name="description" content="Shop for Furniture " /> 
    <meta name="keywords" content="furniture,home,products" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="icon" type="image/png" href="images/logo.png" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> 
    <style> 
    .rform { 
        width: 800px; 
        padding: 30px 40px 40px; 
        margin: 40px auto; 
    }    
    select { 
        background-color: #333536; 
    } 
    <?php include "somecss.php" ?> 
    </style> 
</head> 
  
<body id="top"> 
    <div class="w3-sidebar w3-bar-block w3-transparent w3-card-4" style="width:auto; z-index: 9999;"> 
        <h5 class="w3-bar-item">Menu</h5> 
        <a href="index.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-home" aria-hidden="true"></i> Home</button></a> 
        <a href="about.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-info" aria-hidden="true"></i> About</button></a> 
        <a href="form.php"><button class="w3-bar-item w3-button tablink w3-red"><i class="fa fa-bars" aria-hidden="true"></i> Register</button></a> 
        <a href="login.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-user fa-fw" aria-hidden="true"></i> 
            <p id="usr"> 
                <?php 
                if(!isset($_COOKIE["username"])) { 
                    echo 'Login'; 
                } else { 
                    echo $_COOKIE["username"]; 
                } 
                ?> 
            </p> 
        </button></a> 
        <button id="myBtn" class="w3-bar-item w3-button tablink"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart<p id="qty"> 
            <?php 
            if(isset($_COOKIE["cart"])) { 
                echo $_COOKIE["cart"]; 
            } else { 
                echo "0"; 
            } 
            ?> 
        </p></button> 
    </div> 
  
    <div id="myModal" class="modal"> 
        <!-- Modal content --> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <span class="close">&times;</span> 
                <h2>Cart</h2> 
            </div> 
            <div class="modal-body"> 
                <p><?php include "cart.php" ?></p> 
                <button class="clearcart" style="display: block; margin: 0 auto;">Clear</button> 
            </div> 
        </div> 
    </div> 
    
    <div class="rform"> 
        <form name="register" action="form1.php" method="post"> 
            <table> 
                <caption>Registration Form</caption> 
                <tr> 
                    <td> 
                        <label for="name">Name: </label> 
                    </td> 
                    <td> 
                        <input type="text" name="name" id="name" size="12" maxlength="60" placeholder="Enter Full Name" pattern="[A-Za-z ]*" title="Only alphabets and spaces allowed!" required autofocus /> 
                    </td> 
                </tr> 
                <tr> 
                    <td> 
                        <label for="user">Username: </label> 
                    </td> 
                    <td> 
                        <input type="text" name="user" id="user" size="12" maxlength="20" minlength="3" placeholder="Choose Username" title="Only alphanumeric characters (min 3) allowed!" pattern="[A-Za-z0-9]{3,20}" required /> 
                    </td> 
                </tr> 
                <tr> 
                    <td> 
                        <label for="password">Password: </label> 
                    </td> 
                    <td> 
                        <input type="password" name="pass" id="pass" size="12" maxlength="256" placeholder="Enter New Password" pattern=".{8,}" title="Must contain at least 8 characters" required /> 
                    </td> 
                </tr> 
                <tr> 
                    <td> 
                        <label for="password">Confirm Password: </label> 
                    </td> 
                    <td> 
                        <script type="text/javascript"> 
                        function validater() { 
                            var p1 = document.register.pass.value; 
                            var p2 = document.register.cpass.value; 
                            if (p1 != p2) { 
                                alert("Password does not match"); 
                                document.myform.cpass.focus(); 
                                return false; 
                            } 
                        } 
                        </script> 
                        <input type="password" name="cpass" id="cpass" onchange="validater()" size="12" maxlength="256" placeholder="Confirm Password" pattern=".{8,}" title="Must contain at least 8 characters" required /> 
                    </td> 
                </tr> 
                <tr> 
                    <td> 
                        <label for="email">Email Id: </label> 
                    </td> 
                    <td> 
                        <input type="email" name="email" id="email" size="12" maxlength="256" placeholder="Enter Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /> 
                    </td> 
                </tr> 
                <tr> 
                    <td> 
                        <label for="name">Phone: </label> 
                    </td> 
                    <td> 
                        <input type="text" name="phone" id="phone" size="12" maxlength="12" placeholder="Enter Contact Number" title="Only numbers 8-10 digits long allowed!" pattern="[0-9]{8,10}" required /> 
                    </td> 
                </tr> 
                <tr> 
                    <td> 
                        <label for="address">Address: </label> 
                    </td> 
                    <td> 
                        <textarea name="address" id="address" rows="6" cols="50" wrap="hard" placeholder="Enter Delivery Address"></textarea> 
                    </td> 
                </tr> 
                <tr> 
                    <td>City: </td> 
                    <td> 
                        <select name="city"> 
                            <option value="Mumbai">Mumbai</option> 
                            <option value="Pune">Pune</option> 
                            <option value="Delhi">Delhi</option> 
                            <option value="Kolkata">Kolkata</option> 
                        </select> 
                    </td> 
                </tr> 
            </table> 
            <div class="button_wrap"> 
                <button class="btn" value="submit"><span>SUBMIT</span></button> 
                <button class="btn" value="reset"><span>RESET</span></button> 
            </div> 
        </form> 
    </div> 
    <footer id="footer"> 
        <div class="inner"> 
            <ul class="icons"> 
                <li><a href="mailto:contact?subject=Feedback" class="icon fa-envelope"><span class="label">Email</span></a></li> 
                <li><a href="#top" class="icon fa-arrow-up"><span class="label">Top</span></a></li> 
            </ul> 
            <p class="copyright">&copy; 2017  
                <br />This is a copyright product. All rights reserved 
            </p> 
        </div> 
    </footer> 
    <script type="text/javascript" src="assets/js/jquery-min.js"></script> 
    <script type="text/javascript" src="assets/js/main.js"></script> 
</body> 
  
</html> 
