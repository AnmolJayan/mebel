<!DOCTYPE html> 
<html lang="en"> 
<?php 
session_start(); 
?> 
<head> 
    <title>Login</title> 
    <meta charset="UTF-8" /> 
    <meta name="description" content="Shop for Furniture" /> 
    <meta name="keywords" content="furniture,home,products" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="icon" type="image/png" href="images/logo.png" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> 
    <style> 
        .lform, .cform { 
            width: 800px; 
            padding: 30px 40px 40px; 
            margin: 40px auto; 
        } 
        <?php include "somecss.php" ?> 
    </style> 
</head> 
  
<body id="top"> 
    <div class="w3-sidebar w3-bar-block w3-transparent w3-card-4" style="width:auto; z-index: 9999;"> 
        <h5 class="w3-bar-item">Menu</h5> 
        <a href="index.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-home" aria-hidden="true"></i> Home</button></a> 
        <a href="about.html"><button class="w3-bar-item w3-button tablink"><i class="fa fa-info" aria-hidden="true"></i> About</button></a> 
        <a href="form.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-bars" aria-hidden="true"></i> Register</button></a> 
        <a href="login.php"><button class="w3-bar-item w3-button tablink w3-red"><i class="fa fa-user fa-fw" aria-hidden="true"></i> 
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
    
    <div class="design"> 
        <br /> 
  
        <?php if(!isset($_COOKIE["username"])) : ?>  <!-- If condition --> 
  
            <div class="lform"> 
                <form name="login" action="login1.php" method="post"> 
                    <table> 
                        <caption>Login</caption> 
                        <tr> 
                            <td> 
                                <label for="user">Username: </label> 
                            </td> 
                            <td> 
                                <input type="text" name="username" id="username" size="12" maxlength="20" minlength="3" placeholder="Enter Username" pattern="[A-Za-z0-9]{3,20}" title="Only alphanumeric input" required autofocus /> 
                            </td> 
                        </tr> 
                        <tr> 
                            <td> 
                                <label for="password">Password: </label> 
                            </td> 
                            <td> 
                                <input type="password" name="password" id="password" size="12" maxlength="256" placeholder="Enter Password" pattern=".{8,}" title="Must contain at least 8 characters" required /> 
                            </td> 
                        </tr> 
                    </table> 
                    <div class="button_wrap"> 
                        <button class="btn" value="submit"><span>Login</span></button> 
                    </div> 
                </form> 
  
            <?php else : ?>   <!-- Else Condition --> 
  
                <div class="button_wrap"> 
                    <br /> 
                    <button class="w3-bar-item w3-button tablink w3-red"><i class="fa fa-user fa-fw" aria-hidden="true"></i> 
                        <p id="usr"> 
                            <?php echo $_COOKIE["username"]; ?> 
                        </p> 
                    </button><br /> 
                    <button id="myBtn" class="w3-bar-item w3-button tablink"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart&nbsp;<p id="qty"> 
                        <?php 
                        if(isset($_COOKIE["cart"])) { 
                            echo $_COOKIE["cart"]; 
                        } else { 
                            echo "0"; 
                        } 
                        ?> 
                    </p></button><br /> 
                    <form name="logout" action="logout.php" method="post"> 
                        <button class="btn" value="submit"><span>Logout</span></button> 
                    </form> 
                </div> 
                
            <?php endif; ?> 
  
  
            <hr /> 
            <div class="cform"> 
                <form name="update" action="update.php" method="post"> 
                    <table> 
                        <caption>Forgot Password</caption> 
                        <tr> 
                            <td> 
                                <label for="user">Username: </label> 
                            </td> 
                            <td> 
                                <input type="text" name="username" id="username" class="userotp" size="12" maxlength="20" minlength="3" placeholder="Enter Username" pattern="[A-Za-z0-9]{3,20}" title="Only alphanumeric input" required /> 
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
                                <label for="password">New Password: </label> 
                            </td> 
                            <td> 
                                <input type="password" name="password" id="password" size="12" maxlength="256" placeholder="Enter Password" pattern=".{8,}" title="Must contain at least 8 characters" required /> 
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
                                <label for="otp">OTP: </label> 
                            </td> 
                            <td> 
                                <input type="text" name="otp" id="otp" size="12" maxlength="256" placeholder="Enter OTP" pattern="[0-9]{6}" title="Enter OTP Sent to registered mobile number" required /> 
                            </td> 
                        </tr> 
                    </table> 
                    <div class="button_wrap" style="display: none;"> 
                        <button class="btn" value="submit"><span>Update</span></button> 
                    </div> 
                </form> 
  
            </div> 
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
        <script type="text/javascript"> 
            $(document).ready(function(){ 
                $(".userotp").change(function(){ 
                    var un = $(this).val(); 
                    $.ajax({ 
                        url: 'otp.php', 
                        type: 'POST', 
                        data: { usern: un }, 
                        success: function(response) { 
                            console.log(response); 
                        } 
                    }); 
                }); 
            }); 
  
            $(document).ready(function(){ 
                $("#otp").change(function(){ 
                    if(getCookie("otp") == $(this).val()) 
                        $(".button_wrap").show(); 
                }); 
            }); 
        </script> 
    </body> 
</body> 
  
</html> 
