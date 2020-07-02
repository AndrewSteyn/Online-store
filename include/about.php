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
            <a class="nav-link" href="shoppingCart.php">Shopping cart: <?php echo $num_rows; ?> items </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>


        </ul>
    </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-dark">
            <h1 class="display-4">About Me</h1>
            <p class="lead">Capturing The Karoo</p>
        </div>
    </div>

  <div class="column">
    <div class="card card2">
      <img src="../images/maindi.jpg" alt="DI" style="width:100%">
      <div class="container">
        <h2>Di Steyn</h2>
        <p class="title">Jewellery Designer, Goldsmith, Gemologist, Entrepreneur</p>
        <p>divdrsteyn@gmail.com</p>
      </div>
    </div>
  </div>

  <div id="map"></div>
  <script>

        function initMap() {
 
        var Work = {lat: -33.13, lng: 22.01};

        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 8, center: Work});

        var marker = new google.maps.Marker({position: Work, map: map});
        }
   </script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAemgF3ZfOatUROFmve8fdjf1oxE4jCJ34&callback=initMap">
    </script>
    </body>
        <footer id="footer">
            <p>Created by: Andrew Steyn</p>
            <p>Contact information: <a id="email" href="andrewpvdrsteyn@gmail.com"> andrewpvdrsteyn@gmail.com</a></p>
        </footer>
</html>