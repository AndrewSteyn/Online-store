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
        

        <title>Gallery</title>
    </head>
    <body>

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
<br>
<br>
<br>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-dark">
            <h1 class="display-4">Gallery</h1>
            <p class="lead">Capturing The Karoo</p>
        </div>
    </div>

<div class="row">
    <div class="column">
      <img class="demo cursor" src="../images/1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Necklace">
    </div>
    <div class="column">
      <img class="demo cursor" src="../images/2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Pendant">
    </div>
    <div class="column">
      <img class="demo cursor" src="../images/3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Necklace">
    </div>
    <div class="column">
      <img class="demo cursor" src="../images/4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Ring">
    </div>
    <div class="column">
      <img class="demo cursor" src="../images/5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Ring">
    </div>    
    <div class="column">
      <img class="demo cursor" src="../images/6.jpg" style="width:100%" onclick="currentSlide(6)" alt="Pendant">
    </div>
  </div>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="../images/1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="../images/2.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="../images/3.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="../images/4.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="../images/5.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="../images/6.jpg" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>
</div>
<br>
<br>

<button class="btn" onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="../scripts/store.js"></script>
    </body>
        <footer id="footer">
            <p>Created by: Andrew Steyn</p>
            <p>Contact information: <a id="email" href="andrewpvdrsteyn@gmail.com"> andrewpvdrsteyn@gmail.com</a></p>
        </footer>
</html>