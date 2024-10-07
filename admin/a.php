<?php 
require './partials/header.php';
$brgy = "Malbago";
$user = "malbagoAdmin";
$password = "$2y$10$OHExl58vgf/d7mebiBhSZuBRX6.KRjL.kXRNQtAeUco4h.gL6l5Ce";
$email = "barangaymalbago@gmail.com";

$check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

if ($check->num_rows > 0) {
    echo "exist";
}else{
    $get_tables = $conn->query("INSERT INTO admin(username,email,password,user_brgy_locate) VALUES('$user', '$email', '$password', '$brgy')");
    echo "added new user";
}