<!--price range-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="../jquery.range.css">
<script src="../jquery.range.js"></script>
<div class="container-fluid" >
  <div><h3>Tablets</h3>
  </div>
<div class="container">Price Range:<br><br>
    <div class="filter-panel">
        <p><input type="hidden" class="price_range" value="0,10000" /></p>
        <input type="button" onclick="filterProducts()" value="FILTER" />
    </div>
    <div id="productContainer">
        <?php
        //Include database configuration file
        include('../config.php');
        $i=0;
          $product_id = array();
          $product_quantity = array();

          $is_active = true;
          $query = $mysqli->query('SELECT * FROM products where prod_category="2"');
          if($query === FALSE){
            die(mysql_error());
          }
        //get product rows

        if($query){

      while($obj = $query->fetch_object()) {
        if($i % 4 ==0){

        ?>
      <div class="item<?php if ($is_active) echo ' active'?>">
            <div class="row">
      <?php
      }

      echo'        <div class="col-sm-3">
                  <div class="col-item">
                      <div class="photo">
                          <img src="../images/products/'.$obj->product_img_name.'" class="img-responsive image" alt="a" />
                          <div class="middle">
                            <div class="text"><a href="../product_detail.php?id='.$obj->prod_id.'" data-toggle="modal">Quick View</a>
                                </div>
                          </div>
                      </div>
                      <div class="info">
                          <div class="row">
                              <div class="price col"><center>
                                  <h5>
                                      '.$obj->product_name.'</h5>
                                  <h5 class="price-text-color">
                                    '.$currency.$obj->price.'</h5></center>
                              </div>
                              <div class="rating hidden-sm col-md-6">
                                  <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                  </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                  </i><i class="fa fa-star"></i>
                              </div>

                          </div>


                          <div class="clearfix">
                          </div>
                      </div>
                  </div>
              </div>';
              if(($i+1) % 4 ==0){
              echo'  </div>';
              echo'  </div>';
              }
              $i++;
              if ($is_active) $is_active = false;
     }} ?>
    </div>
</div>
</div>
  <?php include '../footer.php';?>
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
        url: '../pricerange/get_tablets.php',
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
