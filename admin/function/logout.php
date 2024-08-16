<?php 

    if ($_GET['action'] === 'logout') {
        session_destroy();
        header('location: login.php');
    }