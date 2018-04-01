<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$id = $_GET['id'];

$result = $mysqli->query("SELECT o1.id as id,p.product_name as product_name, o2.qty as qty, o2.price as price FROM order_main o1 INNER JOIN order_details o2 ON o1.id = o2.id INNER JOIN products p on o2.prod_id=p.prod_id  WHERE o1.id='".$id."' GROUP BY or_id");

if($result === FALSE){
  die(mysql_error());
}
$result2 = $mysqli->query("SELECT u.lname as lastname, u.fname as firstname,o1.or_date as date, o1.status as stat FROM order_main o1  inner join users u on u.tsa_num= o1.tsa_num WHERE o1.id='".$id."' GROUP BY o1.id");
if($result2) {
  if($obj = $result2->fetch_object()) {
$_SESSION['id'] = $id;
$_SESSION['date'] = $obj->date;
//$_SESSION['stat'] = $obj->status;
$_SESSION['last'] = $obj->lastname;
}}
?>

<link rel="stylesheet" href="css/header.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="css/account.css">
<?php
 include 'headerv2.php';
?>
<div class="container" style="margin-top:20px;">
      <div class="row">
        <div class="col-lg-8 ">
          <div class="panel panel-default">
            <div class="panel-heading">
              <center><h3>Order #<?php echo $_SESSION['id'] ?></h3></center>

            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col">
                  <h3>Date: <?php echo $_SESSION['date'] ?></h3>
                  <table class="table table-bordered">

                    <tbody>
                      <?php
                        if($result) {
                              while($obj = $result->fetch_object()) {
 echo'                      <tr>
                              <td>'. $obj->product_name .'</td>
                              <td>'. $obj->qty.'</td>
                              <td>'. $obj->price.'</td>
                            </tr>';}}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <a href="#" class="btn btn-danger"><i class="material-icons">&#xE863;</i> <span>Cancel</span></a>
      <?php echo'<a href="admin_updatev2.php?id='.$_SESSION['id'].'" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Confirm</span></a>';
          ?>     </div>
          </div>
        </div>
      </div>
    </div>
