<?php
if(isset($_POST['price_range'])){

    //Include database configuration file
    include('../config.php');

    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    $whereSQL = $orderSQL = '';
    $priceRange = $_POST['price_range'];
    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $whereSQL = "WHERE price BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $andSQL = "AND prod_category='2'";
        $orderSQL = " ORDER BY price ASC ";
    }else{
        $orderSQL = " ORDER BY prod_id DESC ";
    }
    $i=0;
          $product_id = array();
          $product_quantity = array();
          $is_active = true;
    //get product rows
    $query = $mysqli->query("SELECT * FROM products $whereSQL $andSQL $orderSQL");

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
}}
    }else{
        echo 'Product(s) not found';
    }

?>
