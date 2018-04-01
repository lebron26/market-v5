<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
   <!-- <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || TSA Group</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	<link rel="icon" href="img/kinnam.ico"> -->
  </head>

  <body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

  <!--  <nav class="top-bar" data-topbar role="navigation">
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
          <li class='active'><a href="products.php">Products</a></li>
		  <li><a href="cart.php">My Wishlist</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>

          <!--<li><a href="contact.php">Contact</a></li>


          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            //echo '<li><a href="register.php">Register</a></li>';
          }
        </ul>
      </section>
    </nav>
-->

<body>

</body>


		  <?php
			include 'headerv3.php';
		  ?>
	<!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jssor.slider-27.0.2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:125.00,t:-125.00}},{b:11000,d:500,c:{x:-125.00,t:125.00}}],
              [{b:0,d:600,x:535,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:250.0,t:-250.0}},{b:0,d:800,c:{x:-250.0,t:250.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 2000,
              $Cols: 1,
              $Align: 0,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,regular,500,600,700&subset=latin-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 052 css*/
        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 053 css*/
        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:640;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <div data-p="170.00">
                <img data-u="image" src="img/tsa.png" />
                <div data-u="caption" data-t="0" style="position:absolute;top:320px;left:30px;width:500px;height:40px;background-color:rgba(255,188,5,0.8);font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;">TSA Group Marketplace</div>
            </div>
            <div data-p="170.00">
                <img data-u="image" src="img/tsa.png" />
                <div data-u="caption" data-t="0" style="position:absolute;top:320px;left:30px;width:500px;height:40px;background-color:rgba(255,188,5,0.8);font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;">TSA Group Marketplace</div>
            </div>
            <div data-p="170.00">
                <img data-u="image" src="img/tsa.png" />
                <div data-u="caption" data-t="0" style="position:absolute;top:320px;left:30px;width:500px;height:40px;background-color:rgba(255,188,5,0.8);font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;">TSA Group Marketplace</div>
            </div>

        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End --><br><br>


	<!--<div id="block_container">
<!--<div class="row"style="margin-top:10px;">-->
<!--<div class="small-12" id="mainContent">
<h4>Filters:</h4>
	<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Price Range</button><br>
<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
  <li><a href="#">Link 1</a></li>
  <li><a href="#">Link 2</a></li>
  <li><a href="#">Link 3</a></li>
</ul>
<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Price Range</button><br>
<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
  <li><a href="#">Link 1</a></li>
  <li><a href="#">Link 2</a></li>
  <li><a href="#">Link 3</a></li>
</ul>
<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Price Range</button><br>
<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
  <li><a href="#">Link 1</a></li>
  <li><a href="#">Link 2</a></li>
  <li><a href="#">Link 3</a></li>
</ul>
<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Price Range</button><br>
<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
  <li><a href="#">Link 1</a></li>
  <li><a href="#">Link 2</a></li>
  <li><a href="#">Link 3</a></li>
</ul>
<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Price Range</button><br>
<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
  <li><a href="#">Link 1</a></li>
  <li><a href="#">Link 2</a></li>
  <li><a href="#">Link 3</a></li>
</ul>
</div>



<!--price range-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="jquery.range.css">
<script src="jquery.range.js"></script>

<div class="container">Price Range:<br><br>
    <div class="filter-panel">
        <p><input type="hidden" class="price_range" value="0,10000" /></p>
        <input type="button" onclick="filterProducts()" value="FILTER" />
    </div>
    <div id="productContainer">
        <?php
        //Include database configuration file
        include('config.php');
        $i=0;
          $product_id = array();
          $product_quantity = array();
        //get product rows
        $query = $mysqli->query("SELECT * FROM products ORDER BY id DESC");

        if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
            ?>

            <!-- ARRAY -->

                <div class="list-item">
                    <h2><?php echo $row["product_name"]; ?></h2>
					<h2><?php echo "<img src='images/products/".$row['product_img_name']."'>"; ?></h2>
                    <h4>Price: <?php echo $row["price"]; ?></h4>

                    <?php


                    if($row['qty'] > 0) {
                echo '<p><a href="update-cart.php?action=add&id='.$row['id'].'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {

                 echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

              $_SESSION['product_id'] = $product_id;?>

                </div>


        <?php }
        else{
            echo 'Product(s) not found';
        } ?>
    </div>
</div>
<script>
$('.price_range').jRange({
    from: 0,
    to: 10000,
    step: 500,
    format: '%s Points',
    width: 300,
    showLabels: true,
    isRange : true
});
</script>
<script>
function filterProducts() {
    var price_range = $('.price_range').val();
    $.ajax({
        type: 'POST',
        url: 'get_products.php',
        data:'price_range='+price_range,
        beforeSend: function () {
            $('.container').css("opacity", ".5");
        },
        success: function (html) {
            $('#productContainer').html(html);
            $('.container').css("opacity", "");
        }
    });
}
</script>
<!--price range end-->

<!--wag/no-->
    <!--<div class="row" style="margin-top:10px;">-->
   <!--   <div class="small-12" id="sideContent">
	  <h3>Products</h3>
        <?php
         /* $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){


            /* OBJECT */
           /* while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h5>'.$obj->product_name.'</h5></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';

              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {

                 echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }
          $_SESSION['product_id'] = $product_id;

          echo '</div>';*/
          ?>
	<!--wag/no end-->
<!--</div>-->

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
