<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$product_id = $_GET['id'];
$action = $_GET['action'];


if($action === 'empty')
  unset($_SESSION['wishlist']);

$result = $mysqli->query("SELECT qty FROM products WHERE prod_id = ".$product_id);


if($result){

  if($obj = $result->fetch_object()) {

    switch($action) {

      case "add":
      if($_SESSION['wishlist'][$product_id]+1 <= $obj->qty)
        $_SESSION['wishlist'][$product_id]++;
      break;

      case "remove":
      $_SESSION['wishlist'][$product_id]--;
      if($_SESSION['wishlist'][$product_id] == 0)
        unset($_SESSION['wishlist'][$product_id]);
        break;



    }
  }
}



header("location:wishlist.php");

?>
