<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

if(isset($_GET['id'])){
$id=$_GET['id'];
$_SESSION['id'] = $id;
}
else{
  $id=$_SESSION['tsa_num'];
  $_SESSION['id'] = $id;
}
 ?>
 <!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || TSA Group</title>
    <!--<link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>-->

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="css/account.css">
  </head>

  <body style="height:100%;">

 <?php
	include 'headerv2.php';
 ?>

 <!--users-->

 <div class="container" style="margin-top:20px;">
       <div class="row">
         <div class="col-lg-8 ">
           <div class="panel panel-default">
             <div class="panel-heading">

               <center><h3>Projects</h3></center>

             </div>
             <div class="panel-body">
               <div class="row">

               <div class=" col">
                   <table class="table table-user-information">
                     <tbody>
                       <?php


                         $point = $mysqli->query("SELECT * FROM cib WHERE tsa_num='".$_SESSION['id']."'");
                         $total = 0;
                         if($point) {
                               while($obj = $point->fetch_object()) {
                                   $total = $total + $obj->points;
echo'
                       <tr>
                          <td>'. $obj->proj_name.'</td>
                           <td>'. $obj->points.'</td>
                           <td><A href="#myModal" data-toggle="modal" ><i class="glyphicon glyphicon-edit"></i>Edit Profile</A>Edit Point</td>
                       </tr>';}}?>
                     </tbody>
                   </table>


                 </div>
               </div>
             </div>


           </div>
         </div>
         <div class="col-lg-4">
         <div class="panel panel-default">
           <div class="panel-heading">

             <center><h3>Total Points</h3></center>

           </div>
           <div class="panel-body">
             <div class="row">

             <div class=" col ">
               <center><h3><?php echo $total?></h3></center>

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
               <div class="panel panel-default">
                 <div class="panel-heading">

                     <?php

                       $result = $mysqli->query('SELECT * FROM users WHERE tsa_num='.$_SESSION['id']);

                       if($result === FALSE){
                         die(mysql_error());
                       }

                       if($result) {
                         $obj = $result->fetch_object();
                          echo '<h3 class="panel-title"> ' .$obj->lname .'&nbsp;'.$obj->fname .'</h3></p>';
                               echo ' <A href="edit.html" >Edit Profile</A>
                       </div>
                       <div class="panel-body">
                         <div class="row">';
             echo '  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="#" class="img-circle img-responsive"> </div>
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
                                 <A href="#myModal" data-toggle="modal" ><i class="glyphicon glyphicon-edit"></i>Edit Profile</A>
                             </span>
                         </div>

               </div>
             </div>
           </div>
         </div>';}?>

         <div class="container" style="margin-top:20px;">
               <div class="row">
                 <div class="col-lg-8 ">
                   <div class="panel panel-default">
                     <div class="panel-heading">

                       <center><h3>Orders</h3></center>

                     </div>
                     <div class="panel-body">
                       <div class="row">

                       <div class=" col">
                           <table class="table table-bordered">
                             <thead>
                                 <tr>
                                   <th>Order ID</th>
                                   <th>Date</th>
                                   <th>Status</th>
                                  <th></th>
                                 </tr>
                             </thead>
                             <tbody>
                               <?php


                               $result2 = $mysqli->query("SELECT o1.id as id,or_date, status FROM order_main o1 INNER JOIN order_details o2 ON o1.id = o2.id INNER JOIN products p on o2.prod_id=p.prod_id WHERE tsa_num ='".$_SESSION['id']."' GROUP BY id");

                                 if($result2) {
                                       while($obj2 = $result2->fetch_object()) {
                                         if($obj2->status=='unpaid'){
                               echo'<tr>
                                    <td>'. $obj2->id .'</td>
                                    <td>'. $obj2->or_date.'</td>
                                    <td>'. $obj2->status.'</td>

                                    <td><a href="order_detail.php?id='.$obj2->id.'" style="color:blue !important;">View Order</a></td>
                               </tr>';}}}?>
                             </tbody>
                           </table>


                         </div>
                       </div>
                     </div>




                 </div>
                 </div>
                 <div class="col-lg-4">
                 <div class="panel panel-default">
                   <div class="panel-heading">

                     <center><h3>Recent Order</h3></center>

                   </div>
                   <div class="panel-body">
                     <div class="row">
                       <table class="table table-user-information">
                         <tbody>
                          <tr>
                             <?php

                             $result = $mysqli->query("SELECT id FROM order_main   WHERE tsa_num ='".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
                             if($result) {
                               $obj = $result->fetch_object();
    echo'                         <td>Order ID</td>
                                                      <td>'.$obj->id.'</td>
                                                    </tr>';
                              $result2 = $mysqli->query("SELECT p.product_name as name, o2.qty, o2.price FROM order_main o1 INNER JOIN order_details o2 ON o1.id = o2.id INNER JOIN products p on o2.prod_id=p.prod_id WHERE o1.id ='".$obj->id."' GROUP BY o1.id");
                              if($result2)
                              {
                                while($obj2 = $result2->fetch_object()) {
                                  echo'                  <tr>
                                  <td>Product name</td>
                                  <td>'.$obj2->name.'</td>
                                  </tr>
                                  <tr>
                                  <td>Quantity</td>
                                  <td>'.$obj2->qty.'</td>
                                  </tr>
                                  <tr>
                                  <td>Price</td>
                                  <td>'.$obj2->price.'</td>
                                  </tr>
                                  <tr><td></td>
                                  <td><a href="#" style="color:blue !important;">View Order</a></td>
                                  </tr>
                         </tbody>';}}}?>
                       </table>
                     </div>
                   </div>


                 </div>
                 </div>
               </div>
             </div>



  </body>
  </html>
