<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="css/mainstore.css" />

<div class="container-fluid" >
  <div><h3>Official Store</h3>
  </div>
    <div class="row" style="height: 100px;">
    	<div class="col-md-14">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products where prod_category = 'smartphones'');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {
			           echo '<div class="col-sm-4 col-md-3">';
				         echo '<div class="thumbnail" >';
					       echo '<h4 class="text-center"><span class="label label-info">'.$obj->product_name.'</span></h4>';
					       echo '<img src="images/products/'.$obj->product_img_name.'" class="img-responsive ">';
					       echo '<div class="caption">';

						     echo '<div class="row">';
							          echo '<div class="col-md-6 col-xs-6">';

								  echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
							echo '</div>';
							echo '<div class="col-md-6 col-xs-6 price">';

                echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
                echo '<p><strong>Points</strong>: '.$currency.$obj->price.'</p>';

							echo '</div>';
						echo '</div>';
						echo '<div class="row">';
							echo '<div class="col-md-6">';
								echo '<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>';
							echo '</div>';
							echo '<div class="col-md-6">';
              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" class="btn btn-success btn-product" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';
						echo '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';
    }}?>


        </div>

	</div>
</div>
