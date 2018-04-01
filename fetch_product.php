<?php
include 'config.php';
$output='';
if(isset($_POST["prod_category"])) {
    if(isset($_POST["prod_category"])) {
        if($_POST["prod_category"] != '') {
            $sql = $mysqli->query("SELECT * from products where prod_category = '".$_POST["prod_category"]."'");
        }
        else {
          $sql = $mysqli->query("SELECT * from products");
        }
        $output .='<table class="table table-striped table-hover">
             <thead>
               <tr>
                 <th>Product ID</th>
                 <th>Product Code</th>
                 <th>Product Category</th>
                 <th>Product Name</th>
                 <th>Product Description</th>
                 <th>Product Image Name</th>
                 <th>Product Quantity</th>
                 <th>Product Price</th>
                 <th>Go to product page</th>
         </tr>
     </thead>
     <tbody>
           <tr>';
        while($row = mysqli_fetch_array($sql))
        {
          $output .='
               <td>'.$row['prod_id'].'</td>
               <td>'.$row['product_code'].'</td>
               <td>'.$row['prod_category'].'</td>
               <td>'.$row['product_name'].'</td>
               <td>'.$row['product_desc'] .'</td>
               <td>'.$row['product_img_name'].'</td>
               <td>'.$row['qty'].'</td>
               <td>'.$row['price'].'</td> </tr>';
        }
        $output .="

           </tbody>
        </table>";
        echo $output;

    }
}else echo 'no send';
?>
