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
        case 'Error1':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'Error2':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
function fill_status($mysqli)
{
  $output ='';
  $sql = $mysqli->query("SELECT * from category");

  while($row = mysqli_fetch_array($sql))
  {
    $output .='<option value= "'.$row["prod_category"].'">'.$row["description"].'</option>';
  }
  return $output;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/order.css">

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>



<?php include 'headerv2.php';
$state="w/point";
$query = $mysqli->query("SELECT u.tsa_num as tsa_num, u.fname as fname, u.lname as lname, u.date_hired as date_hired, u.emp_stat as emp_stat, sum(points) as points FROM users u INNER JOIN cib c where u.tsa_num=c.tsa_num GROUP by u.tsa_num ORDER BY id DESC");
$query2 = $mysqli->query("SELECT cib_id, tsa_num, proj_name,points from cib order by cib_id asc");
?>


    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						                <h2>Employee <b> List</b></h2>
                     </div>
                     <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"
                                           enctype="multipart/form-data">
					            <div class="col-sm-8">
                        <a href="admin.php" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                      <a href="javascript:void(0);" class="btn btn-info" onclick="$('#exportFrm').slideToggle();"><i class="material-icons">&#xE24D;</i> Export Excel</a>
                        <a href="javascript:void(0);" class="btn btn-info" onclick="$('#importFrm').slideToggle();"><i class="material-icons">&#xE24D;</i> Import Members</a>
                        <a href="javascript:void(0);" class="btn btn-info" onclick="$('#importCIB').slideToggle();"><i class="material-icons">&#xE24D;</i> Import CIB</a>
						<a href="javascript:void(0);" class="btn btn-info" onclick="$('#importProd').slideToggle();"><i class="material-icons">&#xE24D;</i> Import Products</a>
                      </div>
                        </form>
                </div>

            </div>

		        <div class="table-filter">
              <div class="row">

                <form class="upload_csv" method="post" enctype="multipart/form-data" id="importFrm" style="display: none">
                  <div class="col-md-4">
                                <input type="file" name="employee_file" style="margin-top:15px;"/>
                  </div>
                  <div class="col-sm-4">
                    <input type="submit" style="margin-top:10px;" class="btn btn-primary" name="upload" id="upload" value="IMPORT Members"></div>
                      <div style="clear:both"></div>

                </form>
                <form action="importCIB.php" method="post" enctype="multipart/form-data" id="importCIB" style="display: none">

                  <div class="col-sm-4"> <input type="file" name="file" /><input type="submit" class="btn btn-primary" name="importCIB" value="IMPORT CIB"></div>


                </form>
				<form action="importProd.php" method="post" enctype="multipart/form-data" id="importProd" style="display: none">

                  <div class="col-sm-4"> <input type="file" name="file" /><input type="submit" class="btn btn-primary" name="importProd" value="IMPORT Products"></div>


                </form>
                <form action="functions.php" method="post" name="upload_excel" id="exportFrm" enctype="multipart/form-data" style="display: none">
                  <div class="col-md-4 col-md-offset-4">
                            <input type="submit" name="Export" class="btn btn-info" value="export Members.csv"/>
                            <input type="submit" name="ExportCIB" class="btn btn-info" value="export CIB.csv"/>
							<input type="submit" name="ExportProd" class="btn btn-info" value="export products.csv"/>
                    </div>

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
							                 <input name="tsa_num" type="search" class="form-control" required>
						          </div>
                    </form>

            <div class="filter-group">
              <?php
    if($_POST) {
        if(isset($_POST['state'])) {
            if($_POST['state'] == 'NULL') {
                echo '<p>Please select an option from the select box.</p>';
            }
            else if ($_POST['state'] == 'AK') {
              $query = $mysqli->query("SELECT u.tsa_num as tsa_num, u.fname as fname, u.lname as lname, u.date_hired as date_hired, u.emp_stat as emp_stat FROM users u where u.tsa_num not in (0,1) GROUP by u.tsa_num ORDER BY id DESC");
              $state = 'All';
            }
            else if ($_POST['state'] == 'AL') {
              $query = $mysqli->query("SELECT u.tsa_num as tsa_num, u.fname as fname, u.lname as lname, u.date_hired as date_hired, u.emp_stat as emp_stat, sum(points) as points FROM users u INNER JOIN cib c where u.tsa_num=c.tsa_num GROUP by u.tsa_num ORDER BY id DESC");
              $state = 'w/point';
            }
            else {
              $query = $mysqli->query("SELECT u.tsa_num as tsa_num, u.fname as fname, u.lname as lname, u.date_hired as date_hired, u.emp_stat as emp_stat FROM users u where (u.tsa_num not in (select tsa_num from cib)) and (u.tsa_num not in (0,1) )GROUP by u.tsa_num ORDER BY id DESC");
              $state = 'no point';
            }
        }
    }
?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >

                  <label>List</label>
                  <select name="state" class="form-control" onchange='this.form.submit()'>
                    <option value="AK" <?php if($state=='All') echo 'selected';?>>All</option>
                    <option value="AL" <?php if($state=='w/point') echo 'selected';?>>w/Points</option>
                    <option value="WY" <?php if($state=='no point') echo 'selected';?>>No Points</option>
                  </select>
                  <noscript><input type="submit" name="submit"></noscript>

              </form>
						</div>
						<span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
			</div>
      <?php if(!empty($statusMsg)){
          echo '<div class="alert '.$statusMsgClass.'" id="alertbox">'.$statusMsg.'</div>';
      } ?>
            <table class="table table-striped table-hover"  id="employee_table">
                <thead>
                    <tr>
                        <th>Tsa #</th>
                        <th>Name</th>
						            <th>Date Hired</th>
                        <th>Employee</th>
                        <?php if($state=='All' || $state=="no point"){ } else {
                        echo '<th>Points</th>'; }?>
						            <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                      //get records from database
                    if($query->num_rows > 0){
                          while($row = $query->fetch_assoc()){
                            if($row['tsa_num']!='0'&&$row['tsa_num']!='1'){?>
                      <tr>
                        <td><?php echo $row['tsa_num']; ?></td>
                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>

                        <td><?php echo $row['date_hired']; ?></td>
                          <td><?php echo $row['emp_stat']; ?></td>
                          <?php if($state=='All' || $state=="no point"){} else {
                          echo '<td>'.$row['points'].'</td>'; }?>
                    <td><?php echo '<a href="admin-user-searchv2.php?id='.$row['tsa_num'].'" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a>';?></td>


                        <!--<td><?//php echo ($row['status'] == '1')?'Active':'Inactive'; ?></td>-->
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
	 <div class="container">
        <div class="table-wrapper">
	<div class="table-title">
                <div class="row">
	<div class="col-sm-4">
						                <h2>CIB <b> Table</b></h2>
                     </div></div></div>
	 <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>CIB No.</th>
                        <th>TSA Number</th>
						            <th>Project Name</th>
                        <th>Points</th>
                        <?php if($state=='All' || $state=="no point"){ } else {
                        echo '<th>Go to user page</th>'; }?>
                    </tr>
                </thead>
                <tbody>
                  <?php
                      //get records from database
                    if($query2->num_rows > 0){
                          while($row = $query2->fetch_assoc()){
                            if($row['tsa_num']!='0'&&$row['tsa_num']!='1'){?>
                      <tr>
                        <td><?php echo $row['cib_id']; ?></td>
                        <td><?php echo $row['tsa_num']; ?> </td>

                        <td><?php echo $row['proj_name']; ?></td>
                          <?php if($state=='All' || $state=="no point"){} else {
                          echo '<td>'.$row['points'].'</td>'; }?>
                    <td><?php echo '<a href="admin-user-searchv2.php?id='.$row['tsa_num'].'" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a>';?></td>


                        <!--<td><?//php echo ($row['status'] == '1')?'Active':'Inactive'; ?></td>-->
                      </tr>
                    <?php }} }else{ ?>
                      <tr><td colspan="4">No member(s) found.....</td></tr>
                      <?php } ?>
                </tbody>
            </table></div></div>


</body>
</html>

<script>
$(document).ready(function(){
$("#sort").change(function(){

    alert('Selected value: ' + $(this).val());
});
$('.upload_csv').on("submit", function(e){
                e.preventDefault(); //form will not submitted
                $.ajax({
                     url:"importData.php",
                     method:"POST",
                     data:new FormData(this),
                     contentType:false,          // The content type used when sending data to the server.
                     cache:false,                // To unable request pages to be cached
                     processData:false,          // To send DOMDocument or non processed data file it is set to false
                     success: function(data){
                       if(data == "Error1")
                      {
                           alert("Invalid File");
                      }
                      else if(data == "Error2")
                      {
                           alert("Please Select File");
                      }
                      else
                      {
                           $('#employee_table').html(data);
                      }
                     }
                })
           });
         })
</script>
