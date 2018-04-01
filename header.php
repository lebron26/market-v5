<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;

}

.topnav {
  overflow: hidden;
  background-color: #000000;

}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  font-family: "Trebuchet MS", Times, serif;
}

.topnav a:hover {
  background-color: #7c6f6f;
  color: white;
  font-family: "Trebuchet MS", Times, serif;
}

/* .topnav a:active {
  background-color: #7c6f6f;
  color: white;
  font-family: "Trebuchet MS", Times, serif;
} */

.topnav a.inactive {
  background-color: black;
  color: white;
  font-family: "Trebuchet MS", Times, serif;
}
.topnav a.inactive:hover {
  background-color: #7c6f6f;
  color: white;
  font-family: "Trebuchet MS", Times, serif;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }

}

.row a:visited {
    color: black;
}
.row a:link {
    color: black;
}
.filter-panel {
	height: 1px;
	width: 50px;
}
#productContainer {
	height: 1000px;
	width: 500px;
	float: right;
	display: inline-block;
	text-align: center;
	width: fit-content;
}
.list-item{
	display: inline-block;
	text-align: center;
	width: fit-content;
}
.projects{
	display: inline;
	float: right;
	margin-right: 300px;
}
.profile{
	float:left;
	display: inline;

}
.row{
	display:inline;
}
.col{
	align: center;
}
.input-group{
	height: 125px;
	width: 230px;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 25%;
    height: 20%;
    border-radius: 50%;
}



</style>
</head>
<body>


<?php
if(isset($_SESSION['username'])){
echo '<div class="topnav">';
  echo '<a class="inactive" href="account.php"><img src="images/acct.png" height="13" width="13"> Profile</a>';
  echo '<a class="inactive" href="home.php"><img src="images/market.png" height="15" width="18"> Marketplace</a> ';
  echo '<a class="inactive" href="logout.php" style = "float:right"><img src="images/logout.png" height="13" width="13"> Logout</a>';
  echo '<a class="inactive" href="cart.php" style = "float:right"><img src="images/cart2.png" height="15" width="20"> My Cart</a>';
  echo '<a class="inactive" href="#contact" style = "float:right"><img src="images/heart.png" height="15" width="18"> My Wishlist</a>';
  echo '<div class="search-container" style="float:left">';
    echo '<form action="search-prod.php" method="post">';
      echo '&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Search products.." name="product_id">';
      echo '<button type="submit"><img src="images/search.png" height="9" width="10"></button>';
    echo '</form>';
  echo '</div>';
echo '</div>';
}
else{
echo '<div class="topnav">';
  echo '<a href="home.php"><img src="images/market.png" height="15" width="18"><font face="trebuchet MS" size="3" color="white"> Marketplace</font></a>';
  echo '<a href="#myModal" data-toggle="modal"  style = "float:right"><img src="images/login.png" height="13" width="13"><font face="trebuchet MS" size="3" color="white"> Login</font></a>';
 echo '<div class="search-container" style="float:left">';
    echo '<form action="search-prod.php" method="post">';
      echo '&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Search.." name="product_id">';
      echo '<button type="submit"><img src="images/search.png" height="9" width="10"></button>';
    echo '</form>';
  echo '</div>';
echo '</div>';

echo '<div class="bs-example">';
  echo '  <div id="myModal" class="modal fade">';
  echo '    <div class="modal-dialog">';
echo '        <div class="modal-content">';
    echo '      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
              aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login</h4>
          </div>
          <div class="modal-body">
              <form method="POST" action="verify.php" style="margin-top:30px;">
              <div class="row">
                <div class="imgcontainer">
                 <img src="img_avatar21.png" alt="Avatar" class="avatar">
                 </div>
              </div>
              <div class="row">
                <div class="small-4 columns">
                  <label for="right-label" class="right inline">TSA Number: </label>
                </div>
                <div class="small-8 columns">
                  <input type="number" id="right-label" placeholder="TSA Number" name="username">
                </div>
              </div>
              <div class="row">
                <div class="small-4 columns">
                  <label for="right-label" class="right inline">Password: </label>
                </div>
                <div class="small-8 columns">
                  <input type="password" id="right-label" name="pwd">
                </div>
              </div>
          </div>
          <div class="modal-footer">
          <input type="submit" id="right-label" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;">
          <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;">
      </div>
        </div>
      </div>
    </div>
  </div>';


}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ">
      <a class="nav-item nav-link" href="smartphones.php">Smartphones</a> |
      <a class="nav-item nav-link" href="Tablet.php">Tablet</a> |
        <a class="nav-item nav-link" href="#">Computer</a> |
    </div>
  </div>
</nav>


</body>
</html>
