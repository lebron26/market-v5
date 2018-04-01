<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$product_id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM products WHERE prod_id = ".$product_id);
if($result){

    if($obj = $result->fetch_object()){
      $_SESSION['id'] = $product_id;
      $_SESSION['name'] = $obj->product_name;
      $_SESSION['desc'] = $obj->product_desc;
      $_SESSION['image'] = $obj->product_img_name;
      $_SESSION['qty'] = $obj->qty;
      $_SESSION['price'] = $obj->price;
  }
}


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/product.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php include 'headerv3.php'?>
<div class="container-fluid">
    <div class="content-wrapper">
		<div class="item-container">
			<div class="container">
				<div class="col-md-12">
					<div class="product col-md-5 service-image-left">

						<center>
							<img class="img-responsive" id="item-display" height="300" width="297" src="images/products/<?php echo $_SESSION['image']?>" alt=""></img>
						</center>
					</div>
          <div class="col-md-7">
  					<div class="product-title"><?php echo $_SESSION['name']?></div>
  					<div class="product-desc"><?php echo $_SESSION['desc']?></div>
  					<hr>
  					<div class="product-price"><?php echo $currency.$_SESSION['price']?></div>
  					<div class="product-stock"><?php


            if($_SESSION['qty'] > 0){
              echo '<h5>Units: '.$_SESSION['qty'].'</h5>';
            }
            else {
              echo 'Out Of Stock!';
            };?>

            </div>
  					<hr>
  					<div class="btn-group cart">
          <?php      if($_SESSION['qty'] > 0){
                  echo '<a href="update-cart.php?action=add&id='.$_SESSION['id'].'"><input type="submit" value="Add To Cart" class="btn btn-success btn-product" /></a>';
                }
                else {
                  echo '<a href="#"><input type="submit" value="Notify Stocks" class="btn btn-danger btn-product" /></a>';

                }?>

  					</div>
  					<div class="btn-group wishlist">
              <?php echo'
              <a href="wishlist_verify.php?action=add&id='.$_SESSION['id'].'" class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>';
              ?>
  					</div>
  				</div>
          <!--
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
						</center>
					</div>-->
				</div>


			</div>
		</div>
		<div class="container-fluid">
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">

						<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
						<li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
						<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>

					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">

							<section class="container product-info">
								<h3>  <?php echo $_SESSION['name']?> Features:</h3>
                <li><?php echo $_SESSION['desc']?></li>
							</section>

						</div>
					<div class="tab-pane fade" id="service-two">

						<section class="container">

						</section>

					</div>
					<div class="tab-pane fade" id="service-three">

					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>

<div id="qtymodal" class="modal fade" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">

         <div class="modal-body">
             Out of Stock
         </div>


       </div>
     </div>
   </div>
