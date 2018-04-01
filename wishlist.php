<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wishlist || TSA Group</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>

   <!-- <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">TSA Group Marketplace</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li class="active"><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }

        </ul>
      </section>
    </nav>

-->
		  <?php
			include 'headerv3.php';
		  ?>
<div class="container">
    <div class="row" style="margin-top:10px;">
      <div class="large-12" style="margin-left:10px">
        <?php

          echo '<p><h3>Wishlist</h3></p>';

          if(isset($_SESSION['wishlist'])) {

            $total = 0;
            echo '<table class="table table-bordered">';
            echo '<tr>';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
			///////////////
			//echo '<th>Points</th>';
            echo '</tr>';
            foreach($_SESSION['wishlist'] as $product_id => $quantity) {

            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE prod_id = ".$product_id);

            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>&nbsp;<a class="btn btn-default" style="color: grey !important; padding:5px;" href="wishlist_verify.php?action=add&id='.$product_id.'">+</a>&nbsp;&nbsp;'.$quantity.'&nbsp;&nbsp;<a class="btn btn-default" style="color: black !important; padding:5px;" href="wishlist_verify.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }

            }



          }
          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="wishlist_verify.php?action=empty" class="btn btn-default" style="color:black !important;">Empty Wishlist</a>';
          echo '</tr>';


          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';

          echo '</tr>';

          echo '<tr>';


          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your Wish cart.";
        }

          echo '</div>';
          echo '</div>';
          echo '</div>';
          ?>

    <?php
			include 'footer.php';
		?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
