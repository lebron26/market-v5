<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';

include 'functions.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}

?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Order Details Table with Search Filter</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/order.css">

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>

<?php
	include 'headerv2.php'
  ?>

  <?php if(!empty($statusMsg)){
      echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
  } ?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						                <h2>Order <b> List</b></h2>
                     </div>
					            <div class="col-sm-8">
                      <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
<!--
                        <a href="#" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>

                        <a href="javascript:void(0);" class="btn btn-info" onclick="$('#importFrm').slideToggle();"><i class="material-icons">&#xE24D;</i> Import Members</a>
	-->					          </div>
                </div>

            </div>

		        <div class="table-filter">
              <div class="row">
                <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm" style="display: none">
                  <div class="col-sm-6">  </div>
                  <div class="col-sm-6"> <input type="file" name="file" /><input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT"></div>
                </form>
              </div>
              <br>
				       <div class="row">
                  <div class="col-sm-3">
						          <div class="show-entries">
							             <span>Show</span>
							              <select class="form-control">
								                <option>5</option>
								                <option>10</option>
								                <option>15</option>
								                <option>20</option>
							              </select>
							              <span>entries</span>
						          </div>
					       </div>
                 <form action ="admin-user-verify.php" method = "post">
                 <div class="col-sm-9">

						          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
						          <div class="filter-group">
							                 <label>TSA #</label>
							                 <input name="tsa_num" type="search" class="form-control">
						          </div>
                    </form>
						<div class="filter-group">

							<label>List</label>
							<select class="form-control">

								<option>All</option>
								<option selected>w/Points</option>
                <option>No Points</option>
							</select>

						</div>
            <div class="filter-group">
              <?php
    if($_POST) {
        if(isset($_POST['state'])) {
            if($_POST['state'] == 'NULL') {
                echo '<p>Please select an option from the select box.</p>';
            }
            else {
                echo '<p>You have selected: <strong>', $_POST['state'], '</strong>.</p>';
            }
        }
    }
?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                  <label>List</label>
                  <select name="state" class="form-control">
                    <option value="AK">All</option>
                    <option value="AL">w/Points</option>
                    <option value="WY">No Points</option>
                  </select>
                  <input type="submit" name="submit">

              </form>
						</div>
						<div class="filter-group">
							<label>Status</label>
							<select class="form-control">
								<option>Any</option>
								<option>Confirmed</option>
								<option>Pending</option>
								<option>Cancelled</option>
							</select>
						</div>

						<span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
			</div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>TSA #</th>
                        <th>Date</th>
                        <th>Status</th>
						            <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 <?php
                      //get records from database
                      $query = $mysqli->query("SELECT o1.id as id, u.tsa_num as tsa, u.fname as fname, u.lname as lname, o1.or_date as date, o1.status as status FROM order_main o1 INNER JOIN users u on o1.tsa_num=u.tsa_num GROUP BY o1.id");
                      if($query->num_rows > 0){
                          while($row = $query->fetch_assoc()){
                            if($row['tsa']!='0'&&$row['tsa']!='1'){
								?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['tsa']; ?></td>
                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>

                        <td><?php
						  echo $row['date']; ?></td>
                          <td><?php echo $row['status']; ?></td>
						  <td><?php if($row['status']=='unpaid'){
                          echo' <td><a href="order_detail.php?id='.$row['id'].'" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
						  </tr>';} ?></td>

						  <!--    <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                        <!--<td><?php//php echo ($row['status'] == '1')?'Active':'Inactive'; ?></td>-->
                      </tr>
                    <?php }} }else{ ?>
                      <tr><td colspan="4">No member(s) found.....</td></tr>
                      <?php } ?>
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">6</a></li>
					<li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>

<script>
$("#sort").change(function(){

    alert('Selected value: ' + $(this).val());
}

);
</script>
