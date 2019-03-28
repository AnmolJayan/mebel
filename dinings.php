<!DOCTYPE html> 
<html lang="en"> 
<?php 
    session_start(); 
?> 
<head> 
    <title>Dining Set</title> 
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="icon" type="image/png" href="images/logo.png" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> 
    <style> 
        #banner { 
            padding: 1em 1em 1em 1em; 
            min-height: 10vh; 
            background-image: url("images/banner4.png"); 
        } 
        #banner h1 { 
            font-size: 4em; 
            font-weight: 200; 
        } 
        @media screen and (max-width: 980px) { 
            #banner h1 { 
                font-size: 3em; 
            } 
        } 
        @media screen and (max-width: 736px) { 
            #banner h1 { 
                font-size: 2em; 
            } 
        } 
        #banner p { 
            font-weight: 200; 
        } 
        #banner .more { 
            height: 4em; 
            text-indent: 4em; 
            width: 4em; 
        } 
        <?php include "somecss.php" ?> 
    </style> 
</head> 
  
<body id="top"> 
    <div class="w3-sidebar w3-bar-block w3-transparent w3-card-4" style="width:auto; z-index: 9999;"> 
        <h5 class="w3-bar-item">Menu</h5> 
        <a href="index.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-home" aria-hidden="true"></i> Home</button></a> 
        <a href="about.php"><button class="w3-bar-item w3-button tablink"><i class="fa fa-info" aria-hidden="true"></i> About</button></a> 
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
                <h1><a href="#top">Dining Set</a></h1> 
            </header> 
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
            <!-- products --> 
            <div class="thumbnails"> 
                <?php 
                $x = 1; 
  
                $connect = new mysqli("localhost","root","","mebel"); 
                if ($connect->connect_error) 
                    die("Connection failed: " . $connect->connect_error); 
  
                $sql = "select * from products where cat='dinings' order by price desc"; 
                $result = $connect->query($sql); 
  
                if ($result->num_rows > 0) { 
                    // output data of each row 
                    while($row = $result->fetch_assoc()) { 
                        echo '<div class="box">'; 
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["pic"] ).'" class="image" /></a>'; 
                        echo '<div class="inner">'; 
                        echo '<h3 id=pro'.$x.'>'.$row["name"].'</h3>'; 
                        echo '<p>'.$row["info"].'</p>'; 
                        echo '<button data-id="'.$row["id"].'" class="button fit bcart">Rs. '.$row["price"].'</button>'; 
			                        echo '</div>'; 
                        echo '</div>'; 
                        $x = $x+1; 
                    } 
                } else { 
                    echo "0 results"; 
                } 
  
                mysqli_close($connect); 
                ?> 
            </div> 
        </div> 
    </div> 
    <!-- Footer --> 
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

