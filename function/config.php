<?php 
    session_start();
    date_default_timezone_set("Asia/Manila");
    $host = "localhost";
    $uname = "root";
    $pass = "";
    $db = "barangay_child_immunization_appointment";

    $conn = new mysqli($host, $uname, $pass, $db);

    if ($conn->error > 0) {
        throw new ErrorException();
    }

    