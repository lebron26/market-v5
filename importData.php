

<?php
 if(!empty($_FILES["employee_file"]["name"]))
 {
      include 'config.php';

      $output = '';
      $allowed_ext = array("csv");
      $extension = end(explode(".", $_FILES["employee_file"]["name"]));
      if(in_array($extension, $allowed_ext))
      {
           $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');
           fgetcsv($file_data);
           while($row = fgetcsv($file_data))
           {

                $id = mysqli_real_escape_string($mysqli, $row[0]);
                $tsa_num = mysqli_real_escape_string($mysqli, $row[1]);
                $lname = mysqli_real_escape_string($mysqli, $row[2]);
                $fname = mysqli_real_escape_string($mysqli, $row[3]);
                $date_hired = mysqli_real_escape_string($mysqli, $row[4]);
                $emp_stat = mysqli_real_escape_string($mysqli, $row[5]);
                $designation = mysqli_real_escape_string($mysqli, $row[6]);
                $dept = mysqli_real_escape_string($mysqli, $row[7]);
                $dept_two = mysqli_real_escape_string($mysqli, $row[8]);
                $div = mysqli_real_escape_string($mysqli, $row[9]);
                $div_two = mysqli_real_escape_string($mysqli, $row[10]);
                $team = mysqli_real_escape_string($mysqli, $row[11]);
                $remarks = mysqli_real_escape_string($mysqli, $row[12]);
                $type = mysqli_real_escape_string($mysqli, $row[13]);
                $password = mysqli_real_escape_string($mysqli, $row[14]);

                $prevQuery = "SELECT id FROM users WHERE tsa_num = '".$tsa_num."'";

                $prevResult = $mysqli->query($prevQuery);
                if($prevResult->num_rows > 0)
                  $mysqli->query("UPDATE users SET id = '".$id."', lname = '".$tsa_num."', fname = '".$fname."', date_hired= '".$date_hired."', emp_stat='".$emp_stat."',designation='".$designation."',dept='".$dept."', dept_two='".$dept_two."',division='".$div."', div_two = '".$div_two."', team='".$team."',remarks='".$remarks."',type='".$type."', password='".$password."' WHERE tsa_num = '".$tsa_num."'");
                else
                  $mysqli->query("INSERT INTO users (id,tsa_num,lname,fname,date_hired,emp_stat,designation,dept,dept_two,division,div_two, team, remarks, type, password) VALUES ($id, $tsa_num,'$lname','$fname','$date_hired','$emp_stat','$designation','$dept','$dept_two','$div','$div_two','$team','$remarks','$type','$password')");
           }
           $state="w/point";
           $query = $mysqli->query("SELECT u.tsa_num as tsa_num, u.fname as fname, u.lname as lname, u.date_hired as date_hired, u.emp_stat as emp_stat, sum(points) as points FROM users u INNER JOIN cib c where u.tsa_num=c.tsa_num GROUP by u.tsa_num ORDER BY id DESC");
           $output .='<table class="table table-striped table-hover">
                 <thead>
                     <tr>
                         <th>Tsa #</th>
                         <th>Name</th>
                         <th>Date Hired</th>
                         <th>Employee</th>';
                         if($state=='All' || $state=="no point"){ } else {
                         $output .= '<th>Points</th>'; }
                  $output .=       '<th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
              <tr>';
              if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                      if($row['tsa_num']!='0'&&$row['tsa_num']!='1'){
                        $output .='
                  <td>'.$row['tsa_num'].'</td>
                  <td>'.$row['fname'].'+'.$row['lname'].'</td>
                  <td>'.$row['date_hired'].'</td>
                  <td>'.$row['emp_stat'].'</td>';
                  if($state=='All' || $state=="no point"){} else {
              echo '<td>'.$row['points'].'</td>'; }
            $output.=   '<td><a href="admin-user-searchv2.php?id='.$row['tsa_num'].'" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
              </tr>';
            }} }else{
            $output.=  '<tr><td colspan="4">No member(s) found.....</td></tr>';
              }
           $output .="

              </tbody>
           </table>";
           echo $output;
           echo "<script>alert('Data Inserted');</script>";
         }
      else
      {
           echo "<script>alert('Invalid File');</script>";
      }
 }
 else
 {
      echo "<script>alert('Please Select File');</script>";
 }


 ?>
