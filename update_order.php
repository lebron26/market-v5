<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;
  $user = $_SESSION["username"];
  $query = $mysqli->query("INSERT INTO order_main (or_date,tsa_num,status)
  VALUES( CURRENT_TIMESTAMP,'$user','unpaid')");
  if($query)
  {
    $order=$mysqli->query("SELECT id FROM order_main ORDER BY id DESC LIMIT 1");
    if($order)
      $last_id = $order->fetch_object();

      foreach($_SESSION['cart'] as $product_id => $quantity)
      {
        $result = $mysqli->query("SELECT * FROM products WHERE prod_id = ".$product_id);

        if($result)
        {
          if($obj = $result->fetch_object())
          {
            $cost = $obj->price * $quantity;
            $query2 = $mysqli->query("INSERT INTO order_details (prod_id,qty,price,id)
                    VALUES( '$product_id','$quantity','$cost','$last_id->id')");

           unset($_SESSION['cart']);
           header("location:cart.php");

          }
        //send mail script
        $query = $mysqli->query("SELECT * from order_details,order_main where order_details.or_id=order_main.id and tsa_num ='".$user."' order by order_details.or_id desc limit 1");
        if($query){
          while ($obj = $query->fetch_object()){
            $subject = "Orders from TSA Number ".$user;
            $message = "<html><body>";
            $message .= '<p><h4><a href="localhost/market-v5/order_detail.php?id='.$obj->or_id.'">Order number: '.$obj->or_id.'</a></h4></p>';
           // $message .= '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
           // $message .= '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
           // $message .= '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
           // $message .= '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
           // $message .= '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
           // $message .= '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
            $message .= "</body></html>";
			$to = "albert.agra12@gmail.com";
            $headers = "From: support@techbarrack.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $sent = mail($to, $subject, $message , $headers) ;
            if($sent){
              $message = "";
            }
            else {
              echo 'Failure';
            }
          }
        }

		}
      }
    }else echo 'not run';
}
?>
