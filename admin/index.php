<?php 

  if (!isset($_SESSION['ID']) && !isset($_SESSION['USERNAME'])) {
    require 'dashboard.php';
  }else{
    require 'login.php';
  }

?>