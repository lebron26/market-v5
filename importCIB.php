<?php
//load the database configuration file
include 'config.php';

if(isset($_POST['importCIB'])){
  $mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

  if(in_array($_FILES['file']['type'],$mimes)){
    // do something
  } else {
    die("Sorry, mime type not allowed");
  }
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            //skip first line
            fgetcsv($csvFile);

            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                $prevQuery = "SELECT cib_id FROM cib WHERE cib_id = '".$line[0]."'";
                $prevResult = $mysqli->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    $mysqli->query("UPDATE cib SET proj_name= '".$line[2]."', points = '".$line[3]."' WHERE cib_id = '".$line[0]."'");
                }else{
                    //insert member data into database
                    $mysqli->query("INSERT INTO cib (cib_id, tsa_num,proj_name, points) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."')");
                }
            }

            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}


//redirect to the listing page
header("Location: admin.php".$qstring);
