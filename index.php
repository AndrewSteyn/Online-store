<?php
        session_start();

        include_once 'include/connect.php';

        include_once 'include/product.php';

        $_SESSION["username"] = "andrew";
        
        //Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("location: include/login.php");
               exit;}
            
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto">
        <a class="navbar-brand" href="index.php">Di's Jewels</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="include/shoppingCart.php">Shopping cart</a>
        </li>

        </ul>
    </div>
    </nav>
           <div class="cartIcon">
           <a id="link" href="include/shoppingCart.php">Your Cart</a>
           <p>{{"Item Count : " +totalItems}}</p>
           <p>{{"--- R"+totalPrice}}</p>
           </div>   

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Di van der Riet Jewellery</h1>
            <p class="lead">These unique hand-mand pieces are crafted in the heart of the karoo, each with its own soal.</p>
        </div>
    </div>

    <div class="items">
    <?php
        $sql = "SELECT * FROM products";
        $results = mysqli_query($mysqli, $sql);
        
        $row = mysqli_fetch_assoc($results);

        if (mysqli_num_rows($results)>0){
            while($row = mysqli_fetch_assoc($results)){
                $products = new product($row["product_name"],$row["product_price"],$row["product_description"],$row["product_image"]);
                $products->displayProduct();
            }
            }else{
                echo "No products available";
            }
                      
        ?>
        </div>
        <div id="map">Map</div>

        <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("map"),mapProp);
        }
        </script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAemgF3ZfOatUROFmve8fdjf1oxE4jCJ34&callback=initMap">
</script>
      
        

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/vue"></script>
        <script src="scripts/store.js"></script>
        <script src="scripts/vueScripts.js"></script>
        <?php
            if(isset($_SESSION["username"])){
                $loggedInUser = $_SESSION["username"];
                echo $loggedInUser;
                $cartArr = array();
                $sql = "SELECT * FROM cart WHERE cart_user = '$loggedInUser'";
                $result = $mysqli -> query($sql);
                if($result->num_rows > 0){    
                    while($row = $result->fetch_assoc()) {
                        array_push($cartArr,$row["cart_product"],$row["quantity"]);
                    }
                }    
                //var_dump($cartArr);
                //call to JS function with a Vue hook
                echo '<script>cleanUpVue();</script>';
            }else{
                echo "user not logged in";
            }
    ?>

    </body>

</html>