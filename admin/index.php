<?php 

  if (!isset($_SESSION['ID']) && !isset($_SESSION['USERNAME'])) {
    require 'login.php';
  }else{
    require 'dashboard.php';
  }

?>