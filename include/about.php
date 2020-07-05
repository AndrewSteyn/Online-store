<?php
        session_start();

        include_once 'connect.php';

        
        //Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("location: login.php");
               exit;}
               $currentid = $_SESSION["id"];

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

        <link rel="stylesheet" href="../css/styles.css">

        <title>Online jewels</title>
    </head>
    <body>
<!-- Nav Bar Starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto fixed-top">
        <a class="navbar-brand" href="../index.php"><img src="../images/logo.jpg"width="40" height="40">Di's Jewels</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="shop.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="shoppingCart.php">Shopping cart: <?php echo $num_rows ; ?> items </a>
        </li>

        </ul>
    </div>
    </nav>
    <!-- Navbar ends -->

    <!-- header of page starts -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-dark">
            <h1 class="display-4">About Me</h1>
            <p class="lead">Capturing The Karoo</p>
        </div>
    </div>
    <!-- end of heeder -->


<!-- about photo -->
  <div class="about_container">
    <div class="card card2">
      <img src="../images/maindi.jpg" alt="DI" style="width:100%">
      <div class="container">
        <h2>Di Steyn</h2>
        <p class="title">Jewellery Designer, Goldsmith, Gemologist, Entrepreneur</p>
        <p>divdrsteyn@gmail.com</p>
      </div>
    </div>
  </div>
  <!-- end About photo -->
<br>
<!-- discription text -->
  <div>
      <br>
      <p class="bulkText">
            Di lives with her husband and two children on a small holding in the village of Prince Albert .<br><br> Creating jewellery out of ‘found’ objects has been an obsession of hers since university. 

            Starting her career by studying a Bachelors of Fine Art majoring in Jewellery design at Stellenbosch University in 1979. There after she won the Maggie Laubser scholarship to further her studies in both England and Germany. After she lived and worked across Europe she came back to South Africa where she mainly worked in Plettenberg Bay, exhibiting widely and doing a lot of commission work. In 1999 she moved to Prince Albert and she continued to work in both gold and silver as well as starting her own line.

            Her current line ‘Karoo Blues’ is inspired by the collection of found objects she has gathered over the years.<br><br>

            “In a ‘dorp’ which is rich in history, one often walks nose down in the veld, searching for that piece…bits of Karoo blue and red shards. I wonder who used that piece of crockery 150 years ago? Someone else’s precious plate or cup, treasures in the ground, discarded in the garbage heap.”

            These little gems are wrapped in pure silver and transformed into wearable one of a kind Karoo Blues. Browse the catalogue now to find your special piece.
      </p>  
</div>
<!-- end discription text -->

<button class="btn" onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
<script src="../scripts/store.js"></script>
    </body>
        <footer id="footer">
            <p>Created by: Andrew Steyn</p>
            <p>Contact information: <a id="email" href="andrewpvdrsteyn@gmail.com"> andrewpvdrsteyn@gmail.com</a></p>
        </footer>
</html>