<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM products WHERE prod_id = ".$product_id);

    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $obj->price * $quantity;
		$id = $_GET['id'];
		$_SESSION['id'] = $id;
        $user = $_SESSION["username"];

        $query = $mysqli->query("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, date,tsa_num, status)
        VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost,'', '$user','unpaid')");
        echo'<p>Success!</p>
        <p>Please check your email for the receipt.</p>';
        <?php  header("Refresh: 2; url=cart.php");?>
        unset($_SESSION['cart']);
        echo 'Data inserted';
        echo '<br/>';
/*
        if($query){
          $newqty = $obj->qty - $quantity;

          if($obj->qty>=1)
          {
            $mysqli->query("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id);
            unset($_SESSION['cart']);
            header("location:success.php");
            echo 'Data inserted';
            echo '<br/>';
          }
          else {
            echo 'out of stock';
          }
        }
*/
        //send mail script
        $query = $mysqli->query("SELECT * from orders order by date desc");
        if($query){
          while ($obj = $query->fetch_object()){
            $subject = "Your Order ID ".$obj->id;
            $message = "<html><body>";
            $message .= '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
            $message .= '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
            $message .= '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
            $message .= '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
            $message .= '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
            $message .= '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
            $message .= '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
            $message .= "</body></html>";
			$to ="calvin.agra@gmail.com";
            $headers = "From: support@techbarrack.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $sent = mail($user, $subject, $message, $to, $headers) ;
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
  }

}
?>
