<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(0);

    session_start();
    date_default_timezone_set("Asia/Manila");
    $host = "localhost";

    //OFFLINE
    // $uname = "root";
    // $pass = "";
    // $db = "barangay_child_immunization_appointment";

    //ONLINE
    $uname = "u510162695_barangay_cia";
    $pass = "1Barangay_cia";
    $db = "u510162695_barangay_cia";

    $conn = new mysqli($host, $uname, $pass, $db);

    if ($conn->error > 0) {
        throw new ErrorException();
    }    
