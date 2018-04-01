<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$tsa_num = $_POST["tsa_num"];

$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT * from users order by id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->tsa_num === $tsa_num)
    {
      $_SESSION['tsa_num'] = $tsa_num;
      $_SESSION['firstname'] = $obj->fname;
      $_SESSION['lastname'] = $obj->lname;

      if(isset($_SESSION["tsa_num"])) {

      


        header("location:admin-user-searchv2.php");
      }
      else{     header("location:admin.php");}
    }
    else
    {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}


function redirect() {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 1; url=admin.php");
}


?>
