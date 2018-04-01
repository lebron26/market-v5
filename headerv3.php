<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
  $i=0;
if(isset($_SESSION['cart'])) {

  foreach($_SESSION['cart'] as $product_id => $quantity) {

  $result = $mysqli->query("SELECT * FROM products WHERE prod_id = ".$product_id);

  if($result){

    while($obj = $result->fetch_object()) {
      $i++;

    }
  }else echo 'not result';

  }
}

?>
<!-- NAVIGATIONS -->
  <nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">

      <a class="navbar-brand" href="index.php"><img src="img/tsa white.png" width="120" height="60"></a>
    </div>

	   <?php

          if(isset($_SESSION['username'])){

			echo '<ul class="nav navbar-nav navbar-right">';
			echo '<li><a href="wishlist.php"><span class="glyphicon glyphicon-heart"></span> My Wishlist</a></li>';
			echo '<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart <span class="badge">'.$i.'</span></a></li>';
			echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
			echo '</ul>';
      echo '<ul class="nav navbar-nav navbar-right">';
            echo '<li><a href="account.php">Hi '.$_SESSION['fname'] .'&nbsp;'.$_SESSION['lname'] .'</a></li>';

      echo '</ul>';
			echo '<form class="navbar-form navbar-left" action ="search-prod.php" method = "post">';
			echo '<div class="input-group addon">';
			echo '<form action ="search-prod.php" method = "post">';
			echo '<input name="product_id" class="input-lg" size="40" type="search" placeholder="Search Product Name"/>';
			echo '<div class="input-group-btn">';
			echo '<button class="btn btn-default btn-search" type="submit">';
			echo '<i class="glyphicon glyphicon-search"></i>';
			echo '</button>';
			echo '</div>';
			echo '</div>';
			echo '</form>';
          }
          else{

      echo '<ul class="nav navbar-nav navbar-right">';
      echo '<li><a href="home.php"><img src="images/market.png" height="15" width="18"><font face="trebuchet MS" size="3" color="white"> Marketplace</font></a></li>';
          echo '<li><a href="#myModal" data-toggle="modal"  style = "float:right"><img src="images/login.png" height="13" width="13"><font face="trebuchet MS" size="3" color="white"> Login</font></a></li>';

      echo '</ul>';
			echo '<form class="navbar-form navbar-left" action ="search-prod.php" method = "post">';
			echo '<div class="input-group addon">';
			echo '<input name="product_id" class="input-lg" size="50" placeholder="Search Product Name"/>';
			echo '<div class="input-group-btn">';
			echo '<button class="btn btn-default btn-search" type="submit">';
			echo '<i class="glyphicon glyphicon-search"></i>';
			echo '</button>';
			echo '</div>';
			echo '</div>';
			echo '</form>';


          }

          ?>


  </div>
  <ul class="nav nav-pills nav-justified">
    <li><a href="categories/smartphones.php">Smartphones</a></li>
    <li><a href="categories/tablets.php">Tablets</a></li>
    <li><a href="categories/tv.php">TV</a></li>
    <li><a href="#">Sattelite</a></li>
  </ul>


</nav>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
    <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"
             aria-hidden="true">&times;</button>
           <h4 class="modal-title">Login</h4>
         </div>
         <div class="modal-body">
             <form method="POST" action="verify.php" style="margin-top:30px;">
             <div class="row">
               <div class="imgcontainer">
                <img src="img_avatar21.png" alt="Avatar" class="avatar">
                </div>
             </div>
             <div class="row">
               <div class="small-4 columns">
                 <label for="right-label" class="right inline">TSA Number: </label>
               </div>
               <div class="small-8 columns">
                 <input type="number" id="right-label" placeholder="TSA Number" name="username">
               </div>
             </div>
             <div class="row">
               <div class="small-4 columns">
                 <label for="right-label" class="right inline">Password: </label>
               </div>
               <div class="small-8 columns">
                 <input type="password" id="right-label" name="pwd">
               </div>
             </div>
         </div>
         <div class="modal-footer">
         <input type="submit" id="right-label" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;">
         <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

     </div>
   </form>
       </div>
     </div>
   </div>





<script>
$(document).ready(function(){


     $(window).scroll(function() { // check if scroll event happened
    /*  if ($(document).scrollTop() > 40) { // check if user scrolled more than 50 from top of the browser window
        $(".navbar-fixed").css("background-color", "black"); // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
      } else {
        $(".navbar-fixed").css("background-color", "black"); // if not, change it back to transparent
      }
      */
      if ($(document).scrollTop() > 40) {
          $("nav").addClass("navbar-fixed-top");
      } else {

          $("nav").removeClass("navbar-fixed-top");
      }
    });

});
</script>
