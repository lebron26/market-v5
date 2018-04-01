<?php
include 'config.php';
$output='';
if(isset($_POST['state']])) {
    if(isset($_POST['state'])) {
        if($_POST['state'] == '') {
            $sql = $mysqli->query("SELECT * from products where prod_category = '".$_POST["prod_category"]."'");
        }
        else {
          $sql = $mysqli->query("SELECT * from products");
        }
        $output .='  <table class="table table-striped table-hover">
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
           <tr>';
           if($sql->num_rows > 0){
                 while($row = $query->fetch_assoc()){
                   if($row['tsa_num']!='0'&&$row['tsa_num']!='1'){
          $output .='
               <td>'.$row['tsa_num'].'</td>
               <td>'.$row['fname'].'+'.$row['lname'].'</td>
               <td>'.$row['date_hired'].'</td>
               <td>'.$row['emp_stat'].'</td>
               <td>'.$row['points'] .'</td>';
        }
        $output .="

           </tbody>
        </table>";
        echo $output;

    }
}else echo 'no send';
?>
