
<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
$id = $_GET['id'];

$user = $_SESSION["last"];
  //$query = $mysqli->query("INSERT INTO order_main (or_date,tsa_num,status)
  //VALUES( CURRENT_TIMESTAMP,'$user','unpaid')");
$result = $mysqli->query("SELECT o1.status as stat, o1.id as id,p.product_name as product_name, p.prod_id as prod_id, o2.qty as qty, p.qty as stock,o2.price as price FROM order_main o1 INNER JOIN order_details o2 ON o1.id = o2.id INNER JOIN products p on o2.prod_id=p.prod_id  WHERE o1.id='".$id."' GROUP BY or_id");

if($result)
{
  while($obj = $result->fetch_object()) {
     $name = $obj->product_name;
     $quty = $obj->qty;
     $status = $obj->stat;

         $newqty = $obj->stock - $quty;
         if($status!="Confirmed"){
         if(!($newqty<0)){
         $update = $mysqli->query("UPDATE products SET qty =".$newqty." WHERE prod_id =".$obj->prod_id);
         if($update){
           $status="Confirmed";

           $order = $mysqli->query("UPDATE order_main SET status ='".$status."' WHERE id =".$id);
           echo $status;
             header("location:order_page.php");
         }
         else echo 'not success';}
         else {
           echo ' <div class="alert alert-info">
            <strong>Info!</strong> Out OF stock
            </div>';
            $status="unpaid";
            header("Refresh: 3; url=order_page.php");
          }
       }
       else echo 'already confirmed';



  }
}


?>
