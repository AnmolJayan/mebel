<!DOCTYPE html> 
<html lang="en"> 
<?php 
    session_start(); 
?> 
<head> 
    <title>mebel</title> 
    <meta charset="UTF-8" /> 
    <meta name="description" content="Shop for Furniture" /> 
    <meta name="keywords" content="furniture,home,products" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="icon" type="image/png" href="images/logo.png" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> 
    <style> 
        #banner { 
            background-image: url("images/banner.jpg"); 
        } 
        <?php include "somecss.php" ?> 
    </style> 
</head> 
  
<body id="top"> 
    <div class="w3-sidebar w3-bar-block w3-transparent w3-card-4" style="width:auto; z-index: 9999;"> 
        <h5 class="w3-bar-item"></h5> 
        <a href="index.php"><button class="w3-bar-item w3-button tablink w3-red"><i class="fa fa-home" aria-hidden="true"></i> Home</button></a> 
        <a href="about.html"><button class="w3-bar-item w3-button tablink"><i class="fa fa-info" aria-hidden="true"></i> About</button></a> 
        <a href="form.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-bars" aria-hidden="true"></i> Register</button></a> 
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
    <section id="banner"> 
        <div class="inner"> 
            <header> 
                <h1><a href="#top">mebel</a></h1> 
                <p>The Furniture Store</p> 
            </header><br /> 
            <a href="#main" class="more">Learn More</a> 
        </div> 
    </section> 
  
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
  
<div id="main"> 
    <div class="inner"> 
        <!-- Products --> 
        <div class="thumbnails"> 
            <div class="box"> 
                <a href="beds.php" class="image fit"><img src="images/pic01.png" alt="" /></a> 
                <div class="inner"> 
                    <h3>Beds</h3> 
                  
                </div> 
            </div> 
            <div class="box"> 
                <a href="wardrobes
.php" class="image fit"><img src="images/pic02.png" alt="" /></a> 
                <div class="inner"> 
                    <h3>Wardrobes</h3> 
                     
                </div> 
            </div> 
            <div class="box"> 
                <br> 
                <a href="sofas.php" class="image fit"><img src="images/pic03.png" alt="" /></a> 
                <div class="inner"> 
                    <br> 
                    <h3>Sofas</h3> 
                     
                </div> 
            </div> 
            <div class="box"> 
                <a href="dinings.php" class="image fit"><img src="images/pic04.png" alt="" /></a> 
                <div class="inner"> 
                    <h3>Dining Sets</h3> 
                    
                </div> 
            </div> 
            <div class="box"> 
                <br> 
                <a href="chairs.php" class="image fit"><img src="images/pic05.png" alt="" /></a> 
                <div class="inner"> 
                    <br> 
                    <br> 
                    <br> 
                    <h3>Chairs</h3> 
                    
                </div> 
            </div> 
            <div class="box"> 
                <br> 
                <a href="cabinets.php" class="image fit"><img src="images/pic06.png" alt="" /></a> 
                <div class="inner"> 
                    <br> 
                    <br> 
                    <br> 
                    <h3>Cabinet</h3> 
                     
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
<footer id="footer"> 
    <div class="inner"> 
        <h2>mebel: The Furniture Store</h2> 
        <p>Fulfill all you furniture needs. 
            <br>Whether you want to build a comfortable home or a professional office 
            <br>We are here for you.</p> 
            <p class="copyright">&copy; 2017 All rights reserved, 
                <br />This is a copyright product. 
            </p> 
        </div> 
    </footer> 
    <script type="text/javascript" src="assets/js/jquery-min.js"></script> 
    <script type="text/javascript" src="assets/js/main.js"></script> 
</body> 
  
</html> 
