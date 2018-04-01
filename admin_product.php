<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';

include 'functions.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
function fill_cat($mysqli)
{
  $output ='';
  $sql = $mysqli->query("SELECT * from category");

  while($row = mysqli_fetch_array($sql))
  {
    $output .='<option value= "'.$row["prod_category"].'">'.$row["description"].'</option>';
  }
  return $output;
}

function fill_product($mysqli)
{

    $output ='';
    $sql = $mysqli->query("SELECT * from products");
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
    return $output;
}

?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Order Details Table with Search Filter</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/order.css">

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>

<?php
	include 'headerv2.php';
  //$query3 = $mysqli->query("SELECT prod_id, product_code, prod_category, product_name,product_desc, product_img_name, qty, price from products order by prod_id asc")

  ?>

  <?php if(!empty($statusMsg)){
      echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
  } ?>	<div class="container">
        <div class="table-wrapper">
           <div class="table-title">
              <div class="row">
                 <div class="col-sm-4">
                          <h2>Products <b> List</b></h2>
                   </div></div>
                 </div>
                 <div class="filter-group">
                   <label>Status</label>
                   <select name="category" id="category">
                     <option value="">Show all Products</option>
                     <?php echo fill_cat($mysqli); ?>
                   </select>
                 </div>
                 <div id="show_product">
                   <?php echo fill_product($mysqli); ?>
                 </div></div></div>
</body>
</html>

<script>
$(document).ready(function(){
$("#sort").change(function(){

    alert('Selected value: ' + $(this).val());
});
$("#category").change(function(){
  var prod_category=$(this).val();
  $.ajax({
    url:"fetch_product.php",
    method:"POST",
    data:{prod_category:prod_category},
    success:function(data){
      $('#show_product').html(data);
    }
  })

});
})
</script>
