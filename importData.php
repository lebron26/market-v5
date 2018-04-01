

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
                echo $row[9];
                $query="INSERT INTO users (id, tsa_num,lname, fname,date_hired,emp_stat,designation, dept,dept_two, div, div_two, team, remarks, type, password)
                VALUES ($id,$tsa_num,'$lname','$fname','$date_hired','$emp_stat','$designation','$dept','$dept_two', '$div','$div_two','$team','$remarks','$type','$password')";
                 $result=$mysqli->query("INSERT INTO users (id,tsa_num,lname,fname,date_hired,emp_stat,designation,dept,dept_two,div) VALUES ($id, $tsa_num,'$lname','$fname','$date_hired','$emp_stat','$designation','$dept','$dept_two','$div')");
                 $result2=$mysqli->query("SELECT * FROM products");
           }
           if($result !== false )
           echo 'ok';
           else echo 'not ok';

      }
      else
      {
           echo 'Error1';
      }
 }
 else
 {
      echo "Error2";
 }
 ?>
