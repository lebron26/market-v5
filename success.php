<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
?>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">
      
      </div>
    </div>
