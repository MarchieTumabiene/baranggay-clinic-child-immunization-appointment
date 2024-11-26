<?php 
    session_start();

    unset($_SESSION['ADMIN_LOGIN']);
    if (isset($_SESSION['ADMIN_LOGIN'])) {
        require "admin/login.php";
    }else{
        require "login.php";
    }

?>