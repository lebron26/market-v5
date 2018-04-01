

<style>.row {
  margin-left:0;
  margin-right:0;
  max-width: 100%;
}
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}
.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.photo:hover .image{
  opacity: 0.5;

}
.photo:hover .middle {
  opacity: 4;

}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 12px;
  padding: 16px 32px;
}
.best{
  background-color: #FFFAF0;
  width: 1260px;
}
</style>
<br>
<div class="container best" >
  <div class="row">
          <div class="row">
              <div class="col"><center>
                  <h2>TRENDING <b>PRODUCTS</b></h2></center>
              </div>

          </div>
          <div id="carousel-example1" class="carousel slide hidden-xs" data-ride="carousel">
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <?php
                    $i=0;
                    $product_id = array();
                    $product_quantity = array();
                    $is_active = true;
                    $result = $mysqli->query('SELECT * FROM products');
                    if($result === FALSE){
                      die(mysql_error());
                    }

                    if($result){

                  while($obj = $result->fetch_object()) {
                    if($i % 4 ==0){

                    ?>
                  <div class="item<?php if ($is_active) echo ' active'?>">
                        <div class="row">
                  <?php
                  }

                  echo'        <div class="col-sm-3">
                              <div class="col-item">
                                  <div class="photo">
                                      <img src="images/products/'.$obj->product_img_name.'" class="img-responsive image" alt="a" />
                                      <div class="middle">
                                        <div class="text"><a href="product_detail.php?id='.$obj->prod_id.'" data-toggle="modal">Quick View</a>
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
                 }}?>
                 </div>
             </div>
              </div>
          </div>
      </div>
</div>
