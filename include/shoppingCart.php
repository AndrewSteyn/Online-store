<?php
session_start();

include "connect.php";
include_once 'cartItem.php';
$currentid = $_SESSION["id"];

if (isset($_POST['done'])){
  $doneid = $_POST['done'];
  $sql = "DELETE FROM cart
  WHERE user_id = $currentid AND id = '$doneid'";
   if ($mysqli->query($sql)) {
      unset($sql);
}else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
}

$www = "SELECT * FROM cart WHERE user_id = $currentid";
$cartNumber = mysqli_query($mysqli, $www);
$num_rows = mysqli_num_rows($cartNumber);
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">   

        <title>Your Cart</title>

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
            <a class="nav-link" href="shoppingCart.php">Shopping cart: <?php echo $num_rows;?> items</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
        </ul>
    </div>
    </nav>
    <br>


    <div class="px-4 px-lg-0">
  <!-- For demo purpose -->
  <br>
  <div class="container text-black py-5 text-center">
    <h1 class="display-4">Your shopping cart</h1>
    </p>
  </div>
  <!-- End -->

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              <thead>
              <?php



               
                $sql = "SELECT * FROM cart where user_id = $currentid";
    
                $results = mysqli_query($mysqli, $sql);
                $totalprice=0;
                if (mysqli_num_rows($results) > 0) {
                    while($row = mysqli_fetch_assoc($results)) {
                      $CartItem = new CartItem($row["id"],$row["product_name"],$row["product_price"],$row["product_image"]);
                      $CartItem->displayCartItem();
                      $totalprice = $totalprice + $row["product_price"];
                        }
                    }else{
                        echo "<br> <h3>Lets Add Some Products</h3>";
                    }
                   
                ?>
              </thead>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">R <?php echo $totalprice; ?></h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
        <footer id="footer">
            <p>Created by: Andrew Steyn</p>
            <p>Contact information: <a id="email" href="andrewpvdrsteyn@gmail.com"> andrewpvdrsteyn@gmail.com</a></p>
        </footer>
</html>


