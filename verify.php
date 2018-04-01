<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT id,tsa_num,lname,fname,type,password from users order by id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->tsa_num === $username && $obj->password === $password) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
	  $_SESSION['lname'] = $obj->lname;

      if($_SESSION["type"]=="admin") {
        header("location:admin.php");
      }else{     header("location:index.php");}
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}


function redirect() {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 1; url=index.php");
}


?>
