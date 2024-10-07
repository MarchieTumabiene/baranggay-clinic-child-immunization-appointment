<?php 
require './partials/header.php';
$brgy = "Kodia";
$user = "kodiaAdmin";
$password = "$2y$10$4mhjx3exe7wnsqJ5HXVEFOEI0qTcrEhEGutx4NX7F0B8RhmYTzeDq";
$email = "barangaykodai@gmail.com";

$check = $conn->query("SELECT * FROM admin WHERE username = '$user'");

if ($check->num_rows > 0) {
    echo "exist";
}else{
    $get_tables = $conn->query("INSERT INTO admin(username,email,password,user_brgy_locate) VALUES('$user', '$email', '$password', '$brgy')");
    echo "added new user";
}