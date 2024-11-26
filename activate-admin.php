<?php 

session_start();

$_SESSION['ADMIN_LOGIN'] = true;

header("location: https://www.madridejosbarangayimmunization.com/");