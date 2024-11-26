<?php 
    session_start();

    if (isset($_SESSION['ADMIN_LOGIN'])) {
        require "admin/login.php";
    }else{
        require "login.php";
    }

?>