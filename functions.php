<?php
include('admin-config.php');
?>

<?php

if(isset($_POST["Export"])){
	  $con = getdb();
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=member.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('id','tsa_num','lname','fname','date_hired','emp_stat','designation','dept','dept_two','div','div_two','team', 'remarks', 'type', 'password'));
      $query = "SELECT * from users ORDER BY id DESC";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }

 if(isset($_POST["ExportCIB"])){
 	  $con = getdb();
       header('Content-Type: text/csv; charset=utf-8');
       header('Content-Disposition: attachment; filename=cib.csv');
       $output = fopen("php://output", "w");
       fputcsv($output, array('cib_id','tsa_num','proj_name','points'));
       $query = "SELECT * from cib ORDER BY cib_id DESC";
       $result = mysqli_query($con, $query);
       while($row = mysqli_fetch_assoc($result))
       {
            fputcsv($output, $row);
       }
       fclose($output);
  }
  
  if(isset($_POST["ExportProd"])){
 	  $con = getdb();
       header('Content-Type: text/csv; charset=utf-8');
       header('Content-Disposition: attachment; filename=products.csv');
       $output = fopen("php://output", "w");
       fputcsv($output, array('prod_id', 'product_code', 'prod_category', 'product_name', 'product_desc', 'product_img_name', 'qty', 'price'));
       $query = "SELECT * from products ORDER BY prod_id DESC";
       $result = mysqli_query($con, $query);
       while($row = mysqli_fetch_assoc($result))
       {
            fputcsv($output, $row);
       }
       fclose($output);
  }



 ?>
