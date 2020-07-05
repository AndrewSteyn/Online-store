<?php
        session_start();

        include_once 'include/connect.php';

        include_once 'include/product.php';

        
        //Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("location: include/login.php");
               exit;}

               $currentid = $_SESSION["id"];


?>
    <?php

     $currentid = $_SESSION["id"];
if (isset($_POST['cartname'])) {
    $loggedInUser = $_SESSION["id"];
    $cleanname = ($_POST['cartname']);
    $cleanprice = ($_POST['cartprice']);
    $cleanimage = ($_POST['cartimage']);
    $sql = "INSERT INTO cart (user_id, product_name, product_price, product_image)
    VALUES ('$loggedInUser','$cleanname','$cleanprice', '$cleanimage')";
    //Execute query and validate success
     if ($mysqli->query($sql)) {
        //echo "<br><br><br><div class=\"confirmMessage\"><p>Item Added To Cart</p></div>";
        unset($sql);
    } else {
         echo "<br><br><br><div class=\"confirmMessage\"> Error: <br>"."<br>" . $mysqli->error . "</div";
     }	
}
                $www = "SELECT * FROM cart WHERE user_id = $currentid";
                $cartNumber = mysqli_query($mysqli, $www);
                $num_rows = mysqli_num_rows($cartNumber);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="vieport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="css/styles.css">

        <title>Online jewels</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto fixed-top">
        <a class="navbar-brand" href="index.php"><img src="images/logo.jpg"width="40" height="40"> Di's Jewels</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="include/about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="include/shop.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="include/gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="include/contact.php">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="include/shoppingCart.php">Shopping cart: <?php echo $num_rows ; ?> items </a>
        </li>

        </ul>
    </div>
    </nav>

    

        <br>
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-dark">
            <h1 class="display-4">Di van der Riet Jewellery</h1>
            <p class="lead">These unique hand-mand pieces are crafted in the heart of the karoo, each with its own soal.</p>
        </div>
    </div>

    <div class="hero-images" >
    <img class="hero-image" src="images/herodi.jpg" alt="HeroImage">
    </div>
    <br>
    <br>
    <br>
    <div class="hero-text text-dark">
        <h2>Product Selection</h2>
        <br>
            <div class="featured">
                <img src="images/1.jpg" class="rounded selection " alt="necklace">
                <img src="images/6.jpg" class="rounded selection " alt="pendant">   
                <img src="images/4.jpg" class="rounded selection " alt="ring"> 
            </div>
    </div>
<br>
<br>
    <div class="hero-text text-dark">
        <h2>Coming Soon</h2>
        <br>
            <div class="featured">
                <img src="images/comingSoon1.jpg" class="rounded coming " alt="necklace">
                <img src="images/comingSoon2.jpg" class="rounded coming " alt="pendant">   
                <img src="images/comingSoon3.jpg" class="rounded coming " alt="ring"> 
            </div>
    </div>
    <button class="btn" onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>


   
        <br>   
        <br>   

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/vue"></script>
        <script src="scripts/store.js"></script>
        <script src="scripts/vueScripts.js"></script>



    </body>
        <footer id="footer">
            <p>Created by: Andrew Steyn</p>
            <p>Contact information: <a id="email" href="andrewpvdrsteyn@gmail.com"> andrewpvdrsteyn@gmail.com</a></p>
        </footer>

</html>