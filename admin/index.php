<?php 

  if(isset($_SESSION['USER_ID'])){
    require 'dashboard.php';
  }else{
    require 'login.php';
  }
?>