<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
  <!--  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account || TSA Group</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/account.css">

  </head>
  <body>

    <!--<nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">TSA Group</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>

          if(isset($_SESSION['username'])){
            echo '<li class="active"><a href="account.php">My Account</a></li>';
			echo '<li class="active"><a href="rewards.php">My Rewards</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

-->
		  <?php
			include 'headerv3.php';
		  ?>




          <div class="container accountCon">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
                    <div class="panel panel-info">
                      <div class="panel-heading">

                        <center><h3>Projects</h3></center>

                      </div>
                      <div class="panel-body">
                        <div class="row">

                        <div class=" col ">
                            <table class="table table-user-information">
                              <thead>
                                <tr>
                                  <th><center>Name</center></th>
                                  <th><center>Points</center></th>
                                </tr>

                              </thead>
                              <tbody>
                                <tr>
                                  <?php
                                    $user = $_SESSION["username"];
                                    $point = $mysqli->query("SELECT * FROM cib WHERE tsa_num='".$user."'");
                                    $total = 0;

                                    if($point) {
                                          while($obj = $point->fetch_object()) {
                                              $total = $total + $obj->points;

          echo'                      <td><center>'. $obj->proj_name.'</center></td>
                                    <td style="color: red;"><center>'. $obj->points.'</center></td>
                                </tr>';}}?>
                              </tbody>
                            </table>


                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">
                  <div class="panel panel-info">
                    <div class="panel-heading">

                      <center><h3>Total Points</h3></center>

                    </div>
                    <div class="panel-body">
                      <div class="row">

                      <div class=" col ">
                        <center><h2 style="color: red;"><b><?php echo $total?></b></h2></center>

                        </div>
                      </div>
                    </div>


                  </div>
                  </div>
                </div>
              </div>

              <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
                        <div class="panel panel-info">
                          <div class="panel-heading">

                            <?php echo '<h3 >Hi ' .$_SESSION['fname'] .'&nbsp;'.$_SESSION['lname'] .'</h3>'; ?></p>

                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <?php

                                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                                if($result === FALSE){
                                  die(mysql_error());
                                }

                                if($result) {
                                  $obj = $result->fetch_object();
                      echo '  <div class="col-md-3 col-lg-3 " align="center">'; include 'upload-image.php'; echo'</div>
                              <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                  <tbody>
                                    <tr>
                                      <td>Employee Status</td>
                                      <td>'.$obj->emp_stat.'</td>
                                    </tr>
                                    <tr>
                                      <td>Hire date:</td>
                                      <td>'.$obj->date_hired.'</td>
                                    </tr>
                                    <tr>
                                      <td>Designation:</td>
                                      <td>'.$obj->designation.'</td>
                                    </tr>
                                    <tr>
                                      <td>Team</td>
                                      <td>'.$obj->team.'</td>
                                    </tr>
                                  </tbody>
                                </table>


                              </div>
                            </div>
                          </div>
                               <div class="panel-footer">
                                      <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                      <span class="pull-right">
                                          <A href="#editModal" data-toggle="modal" style="color:black !important;"><i class="glyphicon glyphicon-edit"></i>Edit Profile</A>
                                      </span>
                                  </div>

                        </div>
                      </div>
                    </div>
                  </div>';}?>

		  </div>
       <div id="editModal" class="modal fade">';
        <div class="modal-dialog">';
             <div class="modal-content">';
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Edit Profile</h4>
                </div>
                <div class="modal-body">
                  <form method="POST" action="update.php" style="margin-top:30px;">

                <div class="col columns end">
                    <div class="profile">
                  <?php

                    $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                    if($result === FALSE){
                      die(mysql_error());
                    }

                    if($result) {
                      $obj = $result->fetch_object();
                      /*echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname">';

                      echo '</div>';
                        echo '</div>';*/

                      echo '<label for="right-label" class="right inline">First Name</label>:   ';

                      echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname"></br>';




                      echo '<label for="right-label" class="right inline">Last Name</label>:  ';

                      echo '<input type="text" id="right-label" placeholder="'. $obj->lname. '" name="lname"></br>';


                      echo '<label for="right-label" class="right inline">TSA Number</label>:  ';


                      echo '<input type="tsa_num" id="right-label" placeholder="'. $obj->tsa_num. '" name="tsa_num"></br>';
					  
					  echo '<label for="right-label" class="right inline">Password</label>:  ';


                      echo '<input type="password" id="right-label" placeholder="'. $obj->password. '" name="pwd">
					  

              </div>
            </div>';
    				 /* echo '<div class="row">';
                      echo '<div class="small-3 columns">';
                      echo '<label for="right-label" class="right inline">Points</label>';
                      echo '</div>';

    				  echo '<div class="small-8 columns end">';

                      echo '<input type="points" id="right-label" placeholder="'. $obj->points. '" name="points">';

                      echo '</div>';
                      echo '</div>';*/

                  }
              ?>
              <div class="small-4 columns">
                <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              </div>
            </div>
      </form>
</div></div></div>



    <?php
			include 'footer.php';
		?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
