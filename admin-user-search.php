<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
 ?>
 <!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || TSA Group</title>
    <!--<link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>-->
    <link rel="stylesheet" href="css/header.css">

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

  </head>

  <body>

 <?php
	include 'headerv2.php';
 ?>

 <!--users-->

 <?php

    if(isset($_POST['tsa_num'])) {
    $user_search = $_POST['tsa_num'];
    $user_search = preg_replace("#[^0-9a-z]i#","", $user_search);


    $result = $mysqli->query("SELECT * FROM users WHERE tsa_num LIKE '%$user_search%'");
    $count = mysqli_num_rows($result);

	if($result === FALSE){
    die(mysql_error());
	}

    if($count == 0){
		echo '<h1>Search Results:</h1>';
	    echo 'Wala!';

    }else{

       echo '<div class="container"><h1>Employee Details:</h1>';
      while ($obj = mysqli_fetch_object($result)) {
		$username = array();



		 echo '<p><strong>First Name</strong>: '.$obj->fname.'</p>
     </div>';
   }


    }
  }
  ?>

  <!--points-->

 <?php

    if(isset($_POST['tsa_num'])) {
    $user_search = $_POST['tsa_num'];
    $user_search = preg_replace("#[^0-9a-z]i#","", $user_search);


    $result = $mysqli->query("SELECT * FROM cib WHERE tsa_num LIKE '%$user_search%'");
    $count = mysqli_num_rows($result);
	$total=0;
	if($result === FALSE){
    die(mysql_error());
	}

    if($count == 0){
		echo '<h1>Search Results:</h1>';
	    echo 'This user has 0 points';

    }else{
      while ($obj = mysqli_fetch_object($result)) {
		$username = array();
		$total = $total + $obj->points;

}


	  echo '<p><strong>Total Points: </strong> '. $total. '</p>';

    }
  }
  ?>

  <!--orders-->

  <?php

    if(isset($_POST['tsa_num'])) {
    $user_search = $_POST['tsa_num'];
    $user_search = preg_replace("#[^0-9a-z]i#","", $user_search);


    $result = $mysqli->query("SELECT * FROM orders WHERE tsa_num LIKE '%$user_search%'");
    $count = mysqli_num_rows($result);

	if($result === FALSE){
    die(mysql_error());
	}

    if($count == 0){
		echo '<h1>Orders:</h1>';
	    echo 'This user has no orders';

    }else{

          echo '<h1>Orders:</h1>';
          while ($obj = mysqli_fetch_object($result)) {
		          $username = array();

		          echo '<p><strong>Orders</strong>: '.$obj->id.'</p>';
        }



    }
  }
  ?>

  </body>
  </html>
