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

                if (isset($_POST['contactName'])) {
                    $cleanname = ($_POST['contactName']);
                    $cleanemail = ($_POST['contactEmail']);
                    $cleaniNumber = ($_POST['contactNumber']);
                    $sql = "INSERT INTO contact (contactName, contactEmail, contactNumber)
                    VALUES ('$cleanname','$cleanemail','$cleaniNumber')";
                   
                     if ($mysqli->query($sql)) {
                        
                        unset($sql);
                    } else {
                         echo "<br><br><br><div class=\"confirmMessage\"> Error: <br>"."<br>" . $mysqli->error . "</div";
                     }	
                }
            
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="vieport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/styles.css">
        

        <title>Contact Information</title>
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
            <h1 class="display-4">Contact Us</h1>
            <p class="lead">Have any questions or queries? <br> Please fill in your information and we will contact you shortly! </p>
        </div>
    </div>

    <div class="contactFormContainer">
        <div class="contactForm">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
            <label class="contactLabel">Name:</label><input class="form-control input-sm" type="text" placeholder="Enter Name Here!" name="contactName" required>
            <br>
            <lable class="contactLabel">Email:</lable><input class="form-control input-sm" type="email" placeholder="Enter Email Here!" name="contactEmail" required>
            <br>
            <label class="contactLabel">Contact Number:</label><input class="form-control input-sm" type="tel" placeholder="Enter Phone Number Here!" name="contactNumber" required>
            <br>
            <button class="btn btn-dark px-4 rounded-pill" type="submit" name="submit" value="submit">Submit</button>
            <br>
        </form>
        </div>
    </div>

    <div id="map"></div>
    <button class="btn" onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
    <script src="../scripts/store.js"></script>
  <script>

        function initMap() {
 
        var Work = {lat: -33.13, lng: 22.01};

        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 9, center: Work});

        var marker = new google.maps.Marker({position: Work, map: map});
        }
   </script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAemgF3ZfOatUROFmve8fdjf1oxE4jCJ34&callback=initMap">
    </script>





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