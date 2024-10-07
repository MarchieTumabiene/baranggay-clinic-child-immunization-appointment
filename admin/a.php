<?php 
require './partials/header.php';
$brgy = "Kodia";
$user = "kodiaAdmin";
$password = "$2y$10$utU.PzUStSFbUNRFntTl2OO/MOQIj1742.dlKt31bFncqBpscgA3a";
$email = "barangaykodai@gmail.com";

$check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

if ($check->num_rows > 0) {
    echo "exist";
}else{
    $get_tables = $conn->query("INSERT INTO admin(username,email,password,user_brgy_locate) VALUES('$user', '$email', '$password', '$brgy')");
    echo "added new user";
}