<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';


  $result2 = $mysqli->query("SELECT count(*) as count FROM `order_main` WHERE STATUS = 'unpaid'");

  if($result2){

    if($obj2 = $result2->fetch_object()) {
    $count= $obj2->count;
      }

    }




?>

<nav class="navbar navbar-inverse bg-primary ">
<div class="container-fluid">
  <div class="navbar-header">

    <a class="navbar-brand" href="index.php">ADMIN HOMEPAGE</a>
  </div>
  	<!-- NAVIGATIONS -->
    <ul class="nav navbar-nav navbar-right">
      <li><a href="order_page.php">Orders<span class="badge"><?php echo $count ?></span></a></li>'
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hey Admin
          <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#">My Profile</a></li>
          <li class="divider"></li>
            <li class="dropdown-header">Store</li>
            <li><a href="#">Marketplace</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link" href="logout.php"><img src="images/logout.png" height="13" width="13"> Logout</a></li>
      </ul>

</div>
</nav>

<style>
 ul>li{
border-right: 0.5px solid LightGray;
border-left: 0.5px solid LightGray;
}

.navbar-header{
  border-right: 0.5px solid LightGray;
}

</style>
